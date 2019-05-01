const request = require('request');

request.get('https://api.twitch.tv/kraken/games/top/?client_id=09k7nrsz85w8k6xmjvv3tdf37k1z3v&limit=10',
  (error, process, body) => {
    const list = JSON.parse(body).top;
    for (let i = 0; i < list.length; i += 1) {
      console.log(`${list[i].game._id} ${list[i].game.name}`);
    }
  });
