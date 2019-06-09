const request = new XMLHttpRequest();

document.querySelector('.lotteryTime').addEventListener('click',
  function() {
    request.open('GET', 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery', true);

    request.onload = function() {
      if (request.status >= 200 && request.status < 400) {
        const gift = JSON.parse(this.responseText).prize;
        document.querySelector('.lotteryTime').style.visibility = 'hidden';

        const pic__sel = document.querySelector('.picture');
        const background__sel = document.querySelector('body');
        const text = document.querySelector('.awards');

        switch (gift) {
          case 'FIRST':
            text.innerHTML = '恭喜你中頭獎了！<br/>日本東京來回雙人遊！！！';
            background__sel.style.background = 'skyblue';
            pic__sel.style.background = 'url("https://images.pexels.com/photos/1004584/pexels-photo-1004584.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940") no-repeat top left';
            break;

          case 'SECOND':
            text.innerHTML = '二獎！<br/>90吋電視一台';
            background__sel.style.background = 'moccasin';
            pic__sel.style.background = 'url("https://images.pexels.com/photos/987586/pexels-photo-987586.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940") no-repeat center center';
            break;

          case 'THIRD':
            text.innerHTML = '恭喜你抽中三獎！<br/>知名 Youtube 簽名握手會入場券一張，bang！';
            background__sel.style.background = 'mediumaquamarine';
            pic__sel.style.background = 'url("https://doqvf81n9htmm.cloudfront.net/data/crop_article/87021/0213-1140-1.jpg_1140x855.jpg") no-repeat center center';
            break;

          case 'NONE':
            text.innerHTML = '銘謝惠顧';
            text.style['font-size'] = '32pt';
            text.style.color = 'white';
            text.style.position = 'relative';
            text.style.top = '25%';
            background__sel.style.background = 'black';
            break;

          default:
            alert('系統不穩定，再試一次');
            break;
        }

        pic__sel.style['background-size'] = 'contain';
        document.querySelector('main').style.visibility = 'visible';

      } else {
          alert('系統不穩定，再試一次');
      }
    }
    request.send();
  }
);

document.querySelector('.end').addEventListener('click', function() {
  location.reload();
});
