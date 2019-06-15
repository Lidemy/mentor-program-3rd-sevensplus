const request = new XMLHttpRequest();

request.open('GET', 'https://lidemy-book-store.herokuapp.com/posts?_limit=20&_sort=id&_order=desc', true);

request.onload = function() {
  const info = JSON.parse(this.responseText);

  for (let i = 0; i < 20; i += 1) {
    const text = document.createElement('div');
    text.setAttribute('class', `id__${i + 1}`);
    text.innerText = info[i].content || '';
    document.querySelector('.oldPost').appendChild(text);
  }
};

request.send();

document.querySelector('.submits').onclick = () => {
  const postText = document.querySelector("input[class='words']").value;

  request.open('POST', 'https://lidemy-book-store.herokuapp.com/posts', true);
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  request.send(`content=${postText}`);

  request.onload = () => {
    if (request.status >= 200 && request.status < 400) {
      const text = document.createElement('div');
      text.innerText = postText;
      document.querySelector('.oldPost').prepend(text);
      document.querySelector("input[class='words']").value = '';
    }
  };
};
