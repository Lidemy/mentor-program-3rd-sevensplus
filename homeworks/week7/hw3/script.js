let numA = [];
let numB = [];
let calC = '';

function cal__remember(e) {
  calC = e.path[0].id;
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

let cals = document.querySelectorAll('.cal__instruction');
for (let i = 0; i < 4; i += 1) {
  document.querySelector(`#${cals[i].id}`).addEventListener('click', cal__remember);
}

for (let i = 0; i <= 9; i += 1) {
  document.querySelector(`.num${i}`).addEventListener('click', num__remember);
}

document.querySelector(`.num__dot`).addEventListener('click', num__remember);

document.querySelector('.equal').addEventListener('click', function() {
  const numA = numA.join('');
  const numB = numB.join('');

  switch (calC){
    case 'add': document.querySelector('.display').innerText = parseFloat(numA, 10) + parseFloat(numB, 10); break;
    case 'min': document.querySelector('.display').innerText = parseFloat(numA, 10) - parseFloat(numB, 10); break;
    case 'mul': document.querySelector('.display').innerText = parseFloat(numA, 10) * parseFloat(numB, 10); break;
    case 'div': document.querySelector('.display').innerText = parseFloat(numA, 10) / parseFloat(numB, 10); break;
  }
});

document.querySelector('.AC').addEventListener('click',
  function() {
    numA = [];
    numB = [];
    calC = '';
    document.querySelector('.display').innerText = 0;
  });
