function capitalize(str) {
  if (str.charCodeAt(0) >= 97 || str.charCodeAt(0) <= 122) {
    const copy = str;
    const StrRet = copy[0].toUpperCase() + copy.slice(1, str.length);
    return StrRet;
  }
  return str;
}
console.log(capitalize(',hello'));
