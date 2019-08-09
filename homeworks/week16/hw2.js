// Stack：後進先出
function Stack() {
  const arr = [];
  this.push = (a) => {
    arr[arr.length] = a;
    return arr;
  };
  this.pop = () => {
    const b = arr[arr.length - 1];
    arr.splice(arr.length - 1, 1);
    return b;
  };
}

// Queue：先進先出
function Queue() {
  const arr = [];
  this.push = (a) => {
    arr[arr.length] = a;
    return arr;
  };
  this.pop = () => {
    const b = arr[0];
    arr.splice(0, 1);
    return b;
  };
}
