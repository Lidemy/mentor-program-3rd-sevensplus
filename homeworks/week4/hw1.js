const request = require('request');

request.get('https://lidemy-book-store.herokuapp.com/books?limit=10', (error, response, body) => {
  const list = JSON.parse(body);
  for (let i = 0; i < 10; i += 1) {
    console.log(`${list[i].id} ${list[i].name}`);
  }
});
