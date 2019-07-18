/* 建立element */
function create(html_type, class_name, content,path) {
    jQuery(`<${html_type}/>`, { class: class_name, text: content }).appendTo(path);
}

/* 新增留言 */
function add_post(a) {
    if ($(`.reply_content_${a.target.id}`).val() == "") {
        return;
    }
    let url = "./handleNewPost.php";
    let formData = new FormData();
    formData.append("new_messager", $(`textarea[class='reply_content_${a.target.id}']`).val());
    formData.append("parent_id", a.target.id);
    fetch(url, {
        method: 'POST',
        body: formData,
    }).then((res) => {
        return res.json();
    }).then((res) => {
        let insert_id = res.id;
        if (a.target.id == 0) {  // 判斷是不是主留言
            let new_piece = `pie_${insert_id}`
            $('.list_top').after(jQuery(`<div/>`, { class: `pieces ${new_piece}`, text: ''}));
            $(`.${new_piece}`).css('display','none');
            create('div', 'author', res.nickname,`.${new_piece}`);
            create('div', 'content', $(`textarea[class='reply_content_${a.target.id}']`).val(),`.${new_piece}`);
            create('div', 'time', res.time,`.${new_piece}`);
            jQuery(`<a/>`, { href: `./changePost.php?mess_id=${insert_id}&path=index`, text: "編輯留言" }).appendTo(`.${new_piece}`);
            jQuery(`<a/>`, { id: `del_${insert_id}`, class: 'del_button', text: '刪除留言' }).appendTo(`.${new_piece}`);

            create('div', 'reply_box', '',`.${new_piece}`);
            jQuery(`<textarea/>`, { name: 'new_messager', class: `reply_content_${insert_id}` }).appendTo(`.${new_piece} > .reply_box`);
            jQuery(`<input/>`, { type: 'submit', class: `post_button`, id: `${insert_id}` }).appendTo(`.${new_piece} > .reply_box`);
            $(`.${new_piece}`).show(500);
        } else {
            let new_piece = `sub_pie_${insert_id}`;
            $(`.pie_${a.target.id} > .reply_box`).before(jQuery(`<div/>`, { class: `sub_pieces ${new_piece}`, text: ''}));
            $(`.${new_piece}`).css('display','none');
            if ($(`.pie_${a.target.id} > a`).length > 0) {
                $(`.${new_piece}`).addClass('author_reply');
            }
            create('div', 'sub_author', res.nickname,`.${new_piece}`);
            create('div', 'sub_content', $(`textarea[class='reply_content_${a.target.id}']`).val(),`.${new_piece}`);
            create('div', 'sub_time', res.time,`.${new_piece}`);
            jQuery(`<a/>`, { href: `./changePost.php?mess_id=${insert_id}&path=index`, text: '編輯留言' }).appendTo(`.${new_piece}`);
            jQuery(`<a/>`, { class: 'del_button', id: `del_${insert_id}`, text: '刪除留言' }).appendTo(`.${new_piece}`);
            $(`.${new_piece}`).show(500);
        }
        $(`textarea[class='reply_content_${a.target.id}']`).val("");
    }).catch((err) => {
        alert('新增留言失敗，請稍後再試');
    })
}
$('.index__main').on('click', '.post_button', add_post);

/* 刪除留言 */
function del_post(a) {
    let conf = confirm('是否刪除留言');
    if (conf == true) {
        let mess_id = a.target.id.split('_')[1];
        let url = `./handleDeletePost.php?mess_id=${mess_id}`;
        event.preventDefault();
        fetch(url)
            .then((res) => {
                $(`#${a.target.id}`).parent().hide(500);
            }).catch((err) => {
                alert('刪除失敗，請稍後再試');
            })
    }
}
$('.oldpost').on('click', '.del_button', del_post);
$('.manage__main').on('click', '.del_button', del_post);
