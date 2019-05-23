let numA = [];
let numB = [];
let calC = '';

function cal__remember(e) {
  calC = e.path[0].id;
  console.log(calC);
}

function num__remember(e) {
  if (calC === '') {
    numA.push(e.path[0].id);
    document.querySelector('.display').innerText = numA.join('');
  } else {
    numB.push(e.path[0].id);
    document.querySelector('.display').innerText = numB.join('');
  }
}

let cals = ['add', 'min', 'mul', 'div'];
for (let i = 0; i < 4; i += 1) {
  document.querySelector(`.cal__${cals[i]}`).addEventListener('click', cal__remember);
}

for (let i = 0; i <= 9; i += 1) {
  document.querySelector(`.num${i}`).addEventListener('click', num__remember);
}

document.querySelector('.equal').addEventListener('click', function() {
  numA.reverse();
  numB.reverse();
  let ans = [];

  if (calC === 'add') {

    let add = 0;
    for (let i = 0, j = 0; numA.length - i > 0 || numB.length - j > 0; i += 1, j += 1) {
      const temp = add + parseInt(numA[i] || 0, 10) + parseInt(numB[i] || 0, 10);
      if (temp >= 10) {
        ans.push(temp - 10);
        add = 1;
      } else {
        ans.push(temp);
        add = 0;
      }
    }
    if (add > 0) ans.push(add);
    document.querySelector('.display').innerText = ans.reverse().join('');
  }

  else if (calC === 'min') {
    let lend = 0;
    for (let i = 0, j = 0; numA.length - i > 0 || numB.length - j > 0; i += 1, j += 1) {
      if (numA[i] < numB[j]) {
        ans.push(lend + parseInt(numA[i], 10) + 10 - parseInt(numB[j], 10));
        lend = -1;
      } else if (numA[i] == numB[j]) {
        if (lend === -1) {
          ans.push(lend + parseInt(numA[i], 10) + 10 - parseInt(numB[j], 10));
          lend = -1;
        }
      } else if (numA[i] == '0') {
        if (lend === -1) {
          ans.push(9);
          lend = -1;
        }
      } else if (numB[j] == undefined) {
        ans.push(lend + parseInt(numA[i], 10));
        lend = 0;
      } else {
        ans.push(lend + parseInt(numA[i], 10) - parseInt(numB[j], 10));
        lend = 0;
      }
    }
    document.querySelector('.display').innerText = ans.reverse().slice(ans.findIndex(n => n > 0)).join('');
  }
});

document.querySelector('.AC').addEventListener('click',
  function() {
    numA = [];
    numB = [];
    calC = '';
    document.querySelector('.display').innerText = 0;
  });
