function isPalindromes(str) {
  const rev = str.split('').reverse().join('');
  return rev === str;
}

module.exports = isPalindromes;

/* other version
function isPalindromes(str) {
  const final = str.length - 1;
  for (let i = 0; i <= str.length / 2 ; i += 1) {
    if (str[i] !== str[final - i]) {
      return false;
    }
  }
  return true;
}
*/
