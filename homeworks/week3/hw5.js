function add(a, b) {
  let numA = '';
  let numB = '';
  const numC = [];

  if (a.length >= b.length) {
    numB = '0'.repeat(a.length - b.length) + b;
  } else {
    numA = '0'.repeat(b.length - a.length) + a;
  }

  numA = numA.split('');
  numB = numB.split('');

  for (let i = 0; i < numA.length; i += 1) {
    numC[i] = parseInt(numA[i], 10) + parseInt(numB[i], 10);
  }

  for (let i = 0; i < numC.length; i += 1) {
    if (numC[i + 1] > 9) {
      numC[i] += 1;
      numC[i + 1] -= 10;
    }
  }

  return numC.join('');
}

module.exports = add;
