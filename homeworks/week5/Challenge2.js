// 挑戰賽二
// 剩一題
// 首領的名字


// 優惠方案
function pa(a) {
  const price = a.split(' ');
  switch (price[0] !== price[1] && price[1] !== price[2] && price[0] !== price[2]) {
    case true: return 'YES';
    case false: return 'NO';
  }
}

// 電費系統
function pc(S) {
  const s = S.split(' ');
  let fee = 0;
  for (let i = 1; i < s.length; i += 1) {
    if (s[i] > s[i - 1]) {
      fee += (s[i] - s[i - 1]) * 20;
    } else {
      fee += (s[i - 1] - s[i]) * 10;
    }
  }
  return fee;
}

// 沙之國
function pd(p) {
  if (p < 3) return p;

  let i = parseInt(p / 3, 10);
  let all = 0;
  let time = 0;
  if (i >= 9) {
    time = parseInt(i / 9, 10);
    all += time;
    i -= 9 * time;
  }
  if (i >= 3) {
    time = parseInt(i / 3, 10);
    all += time;
    i -= 3 * time;
  }
  return all + i + (p % 3);
}

// PK賽
function pe(A,B) {
  const a = [];
  a[0] = A.split('').filter(c => c === 'O').length;
  a[1] = A.split('').filter(c => c === 'X').length;
  const b = [];
  b.push(B.split('').filter(c => c === 'O').length);
  b.push(B.split('').filter(c => c === 'X').length);

  if (A.split('').length <= 5) {
    if (b[0] > a[0]) {
      const i = 5 - a[0] - a[1];
      if ((a[0] + i) < b[0]) return 'B';
      return 'NO';
    } else if (a[0] > b[0]) {
      const i = 5 - b[0] - b[1];
      if ((b[0] + i) < a[0]) return 'A';
      return 'NO';
    }
  } else if (A.split('').length === B.split('').length) {
    if (a[0] === b[0]) return 'NO';
    if (a[0] > b[0]) return 'A';
    if (a[0] < b[0]) return 'B';
  }
  return 'NO';
}

// 棒球練習
function pf(a) {
  const tri = a.split(' ');
  if ((tri[5] - tri[1]) / (tri[3] - tri[1]) === (tri[4] - tri[0]) / (tri[2] - tri[0])) return 'NO';
  return 'YES';
}
