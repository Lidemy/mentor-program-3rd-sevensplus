function stars(n) {
  const arr = [];
  for (let i = 1; i <= n; i += 1) {
    arr[i - 1] = '*'.repeat(i);
  }
  return arr;
}

module.exports = stars;
