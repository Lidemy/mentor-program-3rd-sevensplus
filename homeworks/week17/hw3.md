```javascript
//  範例
var a = 1
function fn(){
  console.log(a)
  var a = 5
  console.log(a)
  a++
  var a
  fn2()
  console.log(a)
  function fn2(){
    console.log(a)
    a = 20
    b = 100
  }
}
fn()
console.log(a)
a = 10
console.log(a)
console.log(b)

//  預期結果
fn(); // 1,5,6,6，實際上是 undefined,5,6,20
console.log(a); // 1
console.log(a); // 10
console.log(b); // undefined，實際上是 100
```

-----

### 運行過程

1. global 編譯
```javascript
globalEC: {
  VO: {
    a: undefined,
    fn: 0x11,  // 記憶體位置
  }
  scopeChian:[globalEC.VO]
}
```

【Call Stack】  
globalEC


2. global 執行
```javascript
globalEC => VO => a:1
```

【Call Stack】  
globalEC


3. fn 編譯
```javascript
fnEC: {
  VO:{
    a: undefined;
    fn2: 0x12;
  }
  scopeChain:[fnEC.VO,globalEC.VO]
}
```

【Call Stack】
fnEC
globalEC


4. fn 執行
```javascript
console.log(a); // fnEC 裡面找 => undefined

var a = 5; // fnEC => VO => a:5

console.log(a); // 5

a++; // fnEC => VO => a:6

var a; // 已宣告過，無動作
```

【Call Stack】
fnEC
globalEC


5. fn2 編譯
```javascript
fn2EC:{
  VO:{}
  scopeChain:[fn2EC.VO,fnEC.VO,globalEC.VO]
}
```

【Call Stack】
fn2
fnEC
globalEC


6. fn2 執行
```javascript
console.log(a); // 6
// fn2EC 找不到 => 往 fn 找 => 找到了

a = 20;
// fn2 找不到 => fn 找到了 => fnEC => VO => a:20

b = 100;
// globalEC.VO => b = 100
```

【Call Stack】
fnEC
globalEC


7. 繼續執行 fn
```javascript
console.log(a); // 20
```

【Call Stack】
globalEC


8. 繼續執行 global
```javascript
console.log(a); // 1，globalEC.VO 的 a = 1

a = 10; // globalEC => VO => a:10

console.log(a); // 10

console.log(b); //100
```