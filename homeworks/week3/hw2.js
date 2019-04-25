function alphaSwap(str) {
  let strCopy = '';
  for (let i = 0; i < str.length; i += 1) {
    if (str[i] >= 'a' && str[i] <= 'z') {
      strCopy += str[i].toUpperCase();
    } else if (str[i] >= 'A' && str[i] <= 'Z') {
      strCopy += str[i].toLowerCase();
    } else {
      strCopy += str[i];
    }
  }
  return strCopy;
}

module.exports = alphaSwap;
