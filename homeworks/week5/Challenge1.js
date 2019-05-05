// 挑戰賽一
// 黑澀會美眉
function pa(a) {
  let relation = a.map(b => b.split(' '));
  let sort = parseInt(relation[0][2], 10);
  for (let i = 1; i < relation.length; i += 1) {
    if (parseInt(relation[i][2], 10) < sort) {
      sort = parseInt(relation[i][2], 10);
    }
  }

  relation = relation.filter(b => b[2] === sort)[0];
  if (sort >= 0) {
    return ('Are you kidding me?');
  }
  return (`${relation[0]} ${relation[1]}`);

}

// 不公平的人
function pb(M, N) {
  let m = M;
  let n = N;
  if (M.length >= N.length) {
    n = '0'.repeat(M.length - N.length) + n;
  } else {
    m = '0'.repeat(N.length - M.length) + m;
  }

  for (let i = 0; i < m.length; i += 1) {
    if (m[i] > n[i]) {
      return 'Unfair';
    }
    return 'Fair';
  }
}

// 打不倒的空氣人
function pc(a, b) {
  const d = [];
  for (let i = 0; i < b.length; i += 1) {
    d.push(a.join('')[b[i] - 1]);
    console.log(d);
  }
  return d.join('');
}

// 白飯
function pd(a) {
  const average = a.reduce((acc, cur) => acc + cur) / a.length;
  return a.filter(a => a < average).length;
}

// 友好數
function pe(a) {
  let b = [];
  let c = [];
  for (let i = 1; i < a; i += 1) {
    if (a % i === 0) {
      b.push(i);
    }
  }

  if (b.length === 1) return '0';
  b = b.reduce((acc, cur) => acc + cur);
  if (b === a) return `=${a}`;

  for (let i = 1; i < b; i += 1) {
    if (b % i === 0) {
      c.push(i);
    }
  }

  if (c.reduce((acc, cur) => acc + cur) === a) {
    return (`${b}`);
  }

  return '0';
}
