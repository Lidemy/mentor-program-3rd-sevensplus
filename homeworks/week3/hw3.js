function isPrime(n) {
  let num = 0;
  for (let i = 1; i <= n; i += 1) {
    if (n % i === 0) {
      num += 1;
    }
  }
  if (num === 2) {
    return (true);
  }
  return (false);
}

module.exports = isPrime;
