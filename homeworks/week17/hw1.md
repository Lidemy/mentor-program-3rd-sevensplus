```javascript
//  範例
console.log(1)
setTimeout(() => {
  console.log(2)
}, 0)
console.log(3)
setTimeout(() => {
  console.log(4)
}, 0)
console.log(5)

/*
預期結果
1
3
5
2
4
*/
```

---

### 運行過程
1. global 編譯 => 無 => global 執行

```javascript
console.log(1); // 輸出 1

setTimeout(() => {
  console.log(2)
}, 0)
// 放入 web api 計時

console.log(3); // 輸出 3

setTimeout(() => {
  console.log(4)
}, 0)
// 放入 web api 計時

console.log(5); // 輸出 5
```

|call stack    |call queue |web api      |
|--------------|-----------|-------------|
|main()        |           |             |

|call stack    |call queue |web api      |
|--------------|-----------|-------------|
|console.log(1)|           |             |
|main()        |           |             |

|call stack     |call queue |web api     |
|---------------|-----------|------------|
|setTimeOut(2,0)|           |            |
|main()         |           |            |
p.s. 這邊將`setTimeout(() => { console.log(2)}, 0) `簡寫為 setTimeOut(2,0)

|call stack    |call queue |web api        |
|--------------|-----------|---------------|
|main()        |           |setTimeOut(2,0)|

|call stack    |call queue    |web api   |
|--------------|--------------|----------|
|main()        |console.log(2)|          |


|call stack    |call queue    |web api    |
|--------------|--------------|-----------|
|console.log(3)|console.log(2)|           |
|main()        |              |           |

|call stack     |call queue    |web api   |
|---------------|--------------|----------|
|setTimeOut(4,0)|console.log(2)|          |
|main()         |              |          |

|call stack     |call queue    |web api        |
|---------------|--------------|---------------|
|main()         |console.log(2)|setTimeOut(4,0)|

|call stack     |call queue    |web api   |
|---------------|--------------|----------|
|main()         |console.log(2)|          |
|               |console.log(4)|          |

|call stack    |call queue    |web api    |
|--------------|--------------|-----------|
|console.log(5)|console.log(2)|           |
|main()        |console.log(4)|           |

|call stack    |call queue    |web api    |
|--------------|--------------|-----------|
|main()        |console.log(2)|           |
|              |console.log(4)|           |


2. main() 執行完，開始將 call queue 放入 call stack，執行完後 pop 掉。注意一次只能放一個程序，等 call stack 執行完、清空後才能繼續放入下一個

|call stack    |call queue    |web api    |
|--------------|--------------|-----------|
|              |console.log(2)|           |
|              |console.log(4)|           |

|call stack    |call queue    |
|--------------|--------------|
|console.log(2)|console.log(4)|

|call stack   |call queue    |
|-------------|--------------|
|             |console.log(4)|

|call stack    |call queue   |
|--------------|-------------|
|console.log(4)|             |

|call stack   |call queue   |
|-------------|-------------|
|             |             |

```javascript
setTimeout(() => {
  console.log(2)
}, 0)
// 輸出 2

setTimeout(() => {
  console.log(4)
}, 0)
// 輸出 4
```
