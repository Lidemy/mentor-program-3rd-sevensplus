const grade = [];
let start = 0;
let end = 0;
let time = 0;

function color() {
  const a = Math.round(Math.random() * 255);
  const b = Math.round(Math.random() * 255);
  const c = Math.round(Math.random() * 255);
  return `rgb(${a},${b},${c})`;
}

function gameStart() {
  time = Math.round(Math.random() * 2000) + 1000;
  document.querySelector('.again').style.visibility = 'hidden';
  document.querySelector('.list').style.visibility = 'hidden';

  games = setTimeout(function() {
    document.querySelector('body').style.background = color();
    start = Date.now();
  }, time);
}

gameStart();

window.addEventListener('click',
  function(e) {
    end = Date.now();
    if (start === 0) {
      alert('按太快了！！還沒開始~~');
      clearTimeout(games);
      gameStart();
    } else if (start > 100) {
      alert(`遊戲成績：${(end - start) / 1000}秒`);
      grade.push((end - start) / 1000);
      grade.sort();
      document.querySelector('body').style.background = 'initial';
      document.querySelector('.again').style.visibility = 'visible';
      document.querySelector('.list').style.visibility = 'visible';
      start = 10;
    } else if (e.target.name === 'again') {
      start = 0;
      gameStart();
    } else if (e.target.name === 'list') {
      alert (`
      《排行榜》
      第一名：${grade[0]}
      第二名：${grade[1] || '從缺'}
      第三名：${grade[2] || '從缺'}`);
    } else {
      alert ('按再試一次重新開始~~');
    }
  });
