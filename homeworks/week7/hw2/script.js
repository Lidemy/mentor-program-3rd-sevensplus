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
    let isEmail__False = false;
    if (email__test.includes('@') === -1 || email__test.indexOf('.') === -1) {
      isEmail__False = true;
    } else if (email__test.indexOf('@') === email__test.length - 1 || email__test.indexOf('.') === email__test.length - 1) {
      isEmail__False = true;
    }

    document.querySelector('.form__col1').style.background = (isEmail__False) ? 'pink' : 'initial';
    document.querySelector('.email__error').style.visibility = (isEmail__False) ? 'visible' : 'hidden';
    detect = (isEmail__False) ? detect + 1 : detect;

    if (detect > 0) e.preventDefault();
  });
