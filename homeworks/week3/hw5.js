function add(a, b) {
  let numA = '';
  let numB = '';
  const numC = [];

  if (a.length >= b.length) {
    numB = '0'.repeat(a.length - b.length) + b;
    numA = a;
  } else {
    numA = '0'.repeat(b.length - a.length) + a;
    numB = b;
  }

  numA = numA.split('');
  numB = numB.split('');

  for (let i = 0; i < numA.length; i += 1) {
    numC[i] = parseInt(numA[i], 10) + parseInt(numB[i], 10);
  }

  for (let i = numC.length - 1; i > 0; i -= 1) {
    if (numC[i] > 9) {
      numC[i - 1] += 1;
      numC[i] -= 10;
    }
  }

  return numC.join('');
}

module.exports = add;
