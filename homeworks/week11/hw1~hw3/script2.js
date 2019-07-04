for (let i = 1; i <= comment_num; i += 1) {
  document.querySelector(`.edit_button${i}`).onclick = (a) => {
    document.cookie = `mess_id = ${a.target.id}`;
    window.location.href = 'changePost.php';
  }
  document.querySelector(`.del_button${i}`).onclick = (a) => {
    document.cookie = `mess_id = ${a.target.id}`;
    window.location.href = 'deletePost.php';
  }
}
