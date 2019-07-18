function count() {
    $('.number').text($('ul>li').length);
}

/*  新增留言  */
let piece_num = 0;
$('.new-td').keydown( (event) => {
    if(event.keyCode !== 13 || $("input[class='new-td']").val() == "") {
        return;
    }
    jQuery('<li/>', {
        id:`piece${piece_num}`,
        'class':'pieces active',
        text: $("input[class='new-td']").val()
    }).appendTo('.td-list');
    $("input[class='new-td']").val("");
    piece_num += 1;
    count();
})

/*  選取條目  */
$('ul').delegate('li', 'click', choose);
function choose(a) {
    const item = $(`#${a.target.id}`);
    if (item.hasClass('choose')) {
        item.removeClass('choose');
    } else {
        $(`#${a.target.id}`).addClass('choose');
    }
}

/*  類別監聽  */
$('.function').delegate('button', 'click', isDone);
function isDone(a){
    if (a.target.id == "active_list") {
        $('.completed').css('display', 'none');
        $('.active').css('display', 'list-item');
    } else if (a.target.id == "complete_list"){
        $('.completed').css('display', 'list-item');
        $('.active').css('display', 'none');
    } else {
        $('.completed').css('display', 'list-item');
        $('.active').css('display', 'list-item');
    }
}

/*  動作監聽  */
$('.function').delegate('img', 'click', action);
function action(a) {
    if(a.target.id == "complete") {
        $('.choose').addClass('completed');
        $('.choose').removeClass('active');
    } else{
        $('.choose').remove();
        count();
    }
    $('.choose').removeClass('choose');
}
