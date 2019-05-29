const request = new XMLHttpRequest();

request.open('GET',
  `https://api.twitch.tv/kraken/streams/?client_id=09k7nrsz85w8k6xmjvv3tdf37k1z3v&game=League%20of%20Legends&limit=20`, true);

request.onload = function() {
  const info = JSON.parse(this.responseText).streams;

  for (let i = 0; i < 20; i += 1) {
    const block = document.createElement('div');
    block.setAttribute('class', 'block');
    block.innerHTML = `<div class='video bg${i}'></div><div class='head${i} info logo'></div><div class ='info word'><div class='title${i}'></div><div class='name${i}'></div></div>`;
    document.querySelector('.videoList').appendChild(block);

    document.querySelector(`.bg${i}`).style.background = `url("${info[i].preview.medium}")`;
    document.querySelector(`.bg${i}`).style['background-size'] = 'contain';
    document.querySelector(`.head${i}`).style.background = `url("${info[i].channel.logo}") no-repeat center center`;
    document.querySelector(`.head${i}`).style['background-size'] = 'contain';
    document.querySelector(`.title${i}`).innerText = info[i].channel.status;
    document.querySelector(`.name${i}`).innerText = info[i]['channel']['display_name'];
  }
};

request.send();
