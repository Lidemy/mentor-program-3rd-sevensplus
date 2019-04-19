function join(str, concatStr) {
  let paste = str[0];
  for (let i = 1; i < str.length; i += 1) {
    paste = paste + concatStr + str[i];
  }
  return paste;
}
function repeat(str, times) {
  let StrRep = '';
  for (let i = 1; i <= times; i += 1) {
    StrRep += str;
  }
  return StrRep;
}
console.log(join('a', '!'));
console.log(repeat('a', 5));
