function reverse(str) {
  let StrRev = '';
  for (let i = str.length - 1; i >= 0; i -= 1) {
    StrRev += str[i];
  }
  console.log(StrRev);
}
reverse('hello');
