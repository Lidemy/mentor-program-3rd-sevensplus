fetch('http://mentor-program.co/group6/sevenplus/todoList/lists', {
  method: 'GET',
  headers: {
    'Accept': 'application/json',
    'Content-Type':'application/json',
  }
}).then((res) => {
  return res.json();
}).then((res) => {
  for (let i = 0; i < res.length; i += 1) {
    const item = res[i];
    jQuery('<li/>', {
      id: item.id,
      'class': `pieces ${item.type}`,
      text: item.text
    }).appendTo('.td-list');
  }
  count();
}).catch((err) => {
  console.log(err);
});

//  新增留言
$('.new-td').keydown((event) => {
  if (event.keyCode !== 13 || $("input[class='new-td']").val() == '') return;
  const text = $("input[class='new-td']").val();
  $("input[class='new-td']").val('');
  fetch('http://mentor-program.co/group6/sevenplus/todoList/lists', {
    method: 'POST',
    body: JSON.stringify({ 'text': text })
  }).then((res) => {
    return res.json();
  }).then((res) => {
    if (res.mode == 'successful') {
      jQuery('<li/>', {
        id: res.id,
        'class': 'pieces active',
        'text': text
      }).appendTo('.td-list');
    }
    count();
  }).catch((err) => {
    console.log(err);
  })
});

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
  viewer(a.target.id);
}

//  動作監聽
$('.function').delegate('img', 'click', action);
function action(a) {
  const item = $('.choose');
  for (let i = 0; i < item.length; i += 1 ) {
    const num = parseInt(item[i].id, 10);
    if (a.target.id == 'delete') {
      deleted(num);
    } else if ($(`#${num}`).hasClass('completed')) {
      changeType(num, 'active', 'completed');
    } else {
      changeType(num, 'completed', 'active');
    }
  }
  $('.choose').removeClass('choose');
  count();
}
function deleted(a) {
  fetch(`http://mentor-program.co/group6/sevenplus/todoList/lists/${a}`, {
    method: 'DELETE',
  }).then((res) => {
    return res.json();
  }).then((res) => {
    if (res.mode == 'successful') {
      $(`#${a}`).remove();
      count();
    }
  }).catch((err) => {
    console.log(err)
  })
};
function changeType(a, b, c) {
  fetch(`http://mentor-program.co/group6/sevenplus/todoList/lists/${a}`, {
    method: 'PATCH',
    body: JSON.stringify({ 'type': b })
  }).then((res) => {
    return res.json();
  }).then((res) => {
    if (res.mode == 'successful') {
      $(`#${a}`).removeClass(c);
      $(`#${a}`).addClass(b);
    }
  }).catch((err) => {
    console.log(err)
  })
};
//  畫面顯示相關
function count() {
  $('.number').text($('ul>li').length);
};
function countType(a) {
  $('.number').text($(`.${a}`).length);
};
function viewer(view) {
  if (view == "active") {
    visibility('active');
    countType('active');
  } else if (view == 'completed') {
    visibility('completed');
    countType('completed');
  } else {
    $('li').css('display', 'list-item');
    $('li').removeClass('first');
    $('li').removeClass('last');
    count();
  }
}
function visibility(a) {
  $('li').css('display', 'none');
  $(`.${a}`).css('display', 'list-item');
  const num = $(`.${a}`);
  const fir = num[0].id;
  const last = num[num.length - 1].id;
  $(`#${fir}`).addClass('first');
  $(`#${last}`).addClass('last');
}
