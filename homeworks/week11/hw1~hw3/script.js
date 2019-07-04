function hidden_obj(a, b) {
  document.querySelector(`.${a}`).style.display = 'none';
  document.querySelector(`.${b}`).style.display = 'none';
}

if (document.cookie !== '') {
  hidden_obj('index_register', 'index_sign');
} else {
  hidden_obj('index_change_name', 'index_out');
  document.querySelector('.index_manage_comment').style.display = 'none';
}
