document.querySelector('.tosubmit').addEventListener('click',
  function(e) {
    let detect = 0;
    for (let i = 1; i <= 5; i += 1) {
      if (document.querySelector(`input[name="det${i}"]`).value === '') {
        detect += 1;
        document.querySelector(`.form__col${i}`).style.background = 'pink';
        document.querySelector(`.form__col${i} > .must__write`).style.visibility = 'visible';
        document.querySelector(`.form__col${i} > div > input`).style['border-bottom'] = '1px red solid';
      } else {
        document.querySelector(`.form__col${i}`).style.background = 'initial';
        document.querySelector(`.form__col${i} > .must__write`).style.visibility = 'hidden';
        document.querySelector(`.form__col${i} > div > input`).style['border-bottom'] = '1px gray solid';
      }
    }


    const box1 = document.querySelector('input[name="beginner"]');
    const box2 = document.querySelector('input[name="advanced"]');
    const radio__box = (box1.checked || box2.checked);
    if (radio__box !== true) detect += 1;
    document.querySelector('.form__col__choose').style.background = (radio__box) ? 'initial' : 'pink';
    document.querySelector('.form__col__choose > .must__write').style.visibility = (radio__box) ? 'hidden' : 'visible';

    const email__test = document.querySelector('input[type="email"]').value;
    let email__detect = 0;
    if (email__test.includes('@') === -1 || email__test.indexOf('.') === -1) {
      email__detect += 1;
    } else if (email__test.indexOf('@') === email__test.length - 1 || email__test.indexOf('.') === email__test.length - 1) {
      email__detect += 1;
    }

    document.querySelector('.form__col1').style.background = (email__detect > 0) ? 'pink' : 'initial';
    document.querySelector('.email__error').style.visibility = (email__detect > 0) ? 'visible' : 'hidden';
    detect = (email__detect > 0) ? detect + 1 : detect;

    if (detect > 0) e.preventDefault();
  });
