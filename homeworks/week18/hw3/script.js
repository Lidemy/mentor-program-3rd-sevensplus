let list = [];
let type = [];
let view = "all";

//  新增留言
$('.new-td').keydown( (event) => {
  if (event.keyCode !== 13 || $("input[class='new-td']").val() == '') return;
  const text = $("input[class='new-td']").val();
  $("input[class='new-td']").val('');
  add(text);
  render();
});
function add(text) {
  list.push(text);
  type.push('active');
}

//  選取條目
$('ul').delegate('li', 'click', choose);
function choose(a) {
  const item = $(`#${a.target.id}`);
  if (item.hasClass('choose')) {
    item.removeClass('choose');
  } else {
    item.addClass('choose');
  }
}

//  類別監聽
$('.function').delegate('button', 'click', isDone);
function isDone(a) {
  view = a.target.id;
  render();
}

//  動作監聽
$('.function').delegate('img', 'click', action);
function action(a) {
  const item = $('.choose');
  for (let i = 0; i < item.length; i += 1 ) {
    const num = parseInt(item[i].id,10);
    if (a.target.id == 'delete'){
      list.splice(num, 1);
      type.splice(num, 1);
    } else if (type[num] == 'active') {
      type[num] = 'completed';
    } else {
      type[num] = 'active';
    }
  }
  $('.choose').removeClass('choose');
  render();
}

// 重新渲染
function render() {
  $('ul').empty();
  for (let i = 0; i < list.length; i += 1){
    jQuery('<li/>', {
      id: i,
      'class': `pieces ${type[i]}`,
      text: list[i]
    }).appendTo('.td-list');
  }
  count();
  viewer();
}
function count() {
  $('.number').text($('ul>li').length);
}
function viewer() {
  if (view == "active") {
    visibility('active');
  } else if (view == 'completed') {
    visibility('completed');
  } else {
    $('li').removeClass('first');
    $('li').removeClass('last');
  }
}
function visibility(a) {
  $('li').css('display', 'none');
  $(`.${a}`).css('display', 'list-item');
  const fir = type.indexOf(a);
  const last = type.lastIndexOf(a);
  $(`#${fir}`).addClass('first');
  $(`#${last}`).addClass('last');
}
