function alphaSwap(str) {
  const StrCopy = '';
  for (let i = 0; i < str.length; i += 1) {
    if (str[i] >= 'a' && str[i] <= 'z') {
      StrCopy[i] = StrCopy[i].toUpperCase();
    } else if (str[i] >= 'A' && str[i] <= 'Z') {
      StrCopy[i] = StrCopy[i].toLowercase();
    } else {
      StrCopy[i] = str[i];
    }
  }
  return (StrCopy);
}

alphaSwap('HellO');
module.exports = alphaSwap;
