function alphaSwap(str) {
  const StrCopy = '';
  for (let i = 0; i < str.length; i += 1) {
    if (str[i] >= 'a' && str[i] <= 'z') {
      StrCopy[i] = str[i].toUpperCase();
    } else if (str[i] >= 'A' && str[i] <= 'Z') {
      StrCopy[i] = str[i].toLowercase();
    } else {
      StrCopy[i] = str[i];
    }
  }
  return (StrCopy);
}


console.log(alphaSwap('helLo'))
/*
alphaSwap('HellO');
module.exports = alphaSwap;
*/