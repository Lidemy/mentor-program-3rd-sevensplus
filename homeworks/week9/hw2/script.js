function hidden_obj(a, b, c) {
  document.querySelector(`.${a}`).style.display = 'none';
  document.querySelector(`.${b}`).style.display = 'none';
  document.querySelector(`.${c}`).style.display = 'none';
}
if (document.cookie !== '') {
  hidden_obj('index_register', 'index_sign', 'index_notice');
  console.log(document.cookie);
} else {
  hidden_obj('index_change', 'index_out', 'index_postbox');
  document.querySelector('.helloName').style.display = 'none';
}
for (let i = 1; i <= 4; i += 1) {
  document.querySelector(`.index_button${i}`).onclick = (a) => {
    window.location.href = `${a.target.id}.php`;
  }
}
