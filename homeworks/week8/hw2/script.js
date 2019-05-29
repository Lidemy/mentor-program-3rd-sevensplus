const request = new XMLHttpRequest();

request.open('GET', 'https://lidemy-book-store.herokuapp.com/posts?_limit=20&_sort=id&_order=desc',true);

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

document.querySelector('.submits').addEventListener('click',
  function() {
    const postText = document.querySelector("input[class='words']").value;
    request.open('POST', `https://lidemy-book-store.herokuapp.com/posts?content=${postText}`, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(`content=${postText}`);
    location.reload();
  });
