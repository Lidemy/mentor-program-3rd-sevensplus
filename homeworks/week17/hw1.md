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
// 放入待執行序列

console.log(3); // 輸出 3

setTimeout(() => {
  console.log(4)
}, 0)
// 放入待執行序列

console.log(5); // 輸出 5
```
|call stack    |call queue |待執行序列    |
|--------------|-----------|-------------|
|console.log(1)|           |             |

|call stack    |call queue |待執行序列    |
|--------------|-----------|-------------|
|setTimeOut(2) |           |             |


|call stack    |call queue |待執行序列    |
|--------------|-----------|-------------|
|              |           |setTimeOut(2)|


|call stack    |call queue |待執行序列    |
|--------------|-----------|-------------|
|console.log(3)|           |setTimeOut(2)|

|call stack   |call queue |待執行序列    |
|-------------|-----------|-------------|
|setTimeOut(4)|           |setTimeOut(2)|

|call stack |call queue |待執行序列    |
|-----------|-----------|-------------|
|           |           |setTimeOut(2)|
|           |           |setTimeOut(4)|

|call stack    |call queue |待執行序列    |
|--------------|-----------|-------------|
|console.log(5)|           |setTimeOut(2)|
|              |           |setTimeOut(4)|

|call stack    |call queue |待執行序列    |
|--------------|-----------|-------------|
|              |           |setTimeOut(2)|
|              |           |setTimeOut(4)|



2. setTimeOut 到期

|call stack |call queue   |待執行序列 |
|-----------|-------------|----------|
|           |setTimeOut(2)|          |
|           |setTimeOut(4)|          |



3. call queue 放入 call stack 中執行，執行完後 pop 掉。要注意一次只能放一個程序，等 call stack 執行完、清空後才能繼續放入下一個

|call stack   |call queue   |
|-------------|-------------|
|setTimeOut(2)|setTimeOut(4)|

|call stack   |call queue   |
|-------------|-------------|
|             |setTimeOut(4)|

|call stack   |call queue   |
|-------------|-------------|
|setTimeOut(4)|             |

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
