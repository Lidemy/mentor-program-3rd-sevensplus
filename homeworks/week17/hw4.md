```javascript
//  範例
const obj = {
  value: 1,
  hello: function() {
    console.log(this.value)
  },
  inner: {
    value: 2,
    hello: function() {
      console.log(this.value)
    }
  }
}
const obj2 = obj.inner
const hello = obj.inner.hello
obj.inner.hello()
obj2.hello()
hello()

//  預期結果
obj.inner.hello() // 2
obj2.hello() // 2
hello() // undefine
```

---

### 運作過程
`obj.inner.hello()` 等價於 `obj.inner.hello.call(obj.inner)`，意味著 obj.inner 被指派為 this 的值。因此，`this.value = obj.inner.value = 2`。

`obj2.hello()` 等價於 `obj2.hello.call(obj2)` 又等同於 `obj2.hello.call(obj.inner)` ，this 的值和上題相等，所以兩個都是 2。

`hello` 等價於 `hello.call()`，並沒有指派的 this，於是往上一層(global)找，發現全域變數當中沒有 `value`，所以 `this.value = undefine`

主要參考自[這篇文章](https://zhuanlan.zhihu.com/p/23804247)