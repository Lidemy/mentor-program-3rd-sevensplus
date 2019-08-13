```javascript
//  範例
for(var i=0; i<5; i++) {
  console.log('i: ' + i)
  setTimeout(() => {
    console.log(i)
  }, i * 1000)
}
/*  
預期結果
i: 0
0
i: 1
i: 2
i: 3
i: 4
1
2
3
4

實際結果
i: 0
i: 1
i: 2
i: 3
i: 4
5
5
5
5
5
*/
```

---
### 運行過程

1. global 編譯 => 無內容 => global 執行

2. for 迴圈第一圈執行
```javascript
// i = 0
console.log('i: ' + i); // 輸出 i:0
setTimeOut(() => {
    console.log(i)
  }, 0); // 放入 web api 計時
```
|call stack          |call queue |web api        |
|--------------------|-----------|---------------|
|main()              |           |               |


|call stack          |call queue |web api        |
|--------------------|-----------|---------------|
|console.log('i: ',i)|           |               |
|main()              |           |               |

|call stack     |call queue |web api        |
|---------------|-----------|---------------|
|setTimeOut(i,0)|           |               |
|main()         |           |               |

|call stack    |call queue |web api        |
|--------------|-----------|---------------|
|main()        |           |setTimeOut(i,0)|

|call stack    |call queue     |web api        |
|--------------|---------------|---------------|
|main()        |setTimeOut(i,0)|               |


3. for 迴圈第二圈執行
```javascript
// i = 1
console.log('i: ' + i); // 輸出 i:1
setTimeOut(() => {
    console.log(i)
  }, 1000); // 放入 web api 計時
```

|call stack          |call queue     |web api        |
|--------------------|---------------|---------------|
|console.log('i: ',i)|setTimeOut(i,0)|               |
|main()              |               |               |


|call stack        |call queue     |web api        |
|------------------|---------------|---------------|
|setTimeOut(i,1000)|setTimeOut(i,0)|               |
|main()            |               |               |


|call stack    |call queue     |web api           |
|--------------|---------------|------------------|
|main()        |setTimeOut(i,0)|setTimeOut(i,1000)|



4. for 迴圈第三圈執行
```javascript
// i = 2
console.log('i: ' + i); // 輸出 i:2
setTimeOut(() => {
    console.log(i)
  }, 2000); // 放入 web api 計時
```

|call stack          |call queue     |web api           |
|--------------------|---------------|------------------|
|console.log('i: ',i)|setTimeOut(i,0)|setTimeOut(i,1000)|
|main()              |               |                  |

|call stack        |call queue     |web api           |
|------------------|---------------|------------------|
|setTimeOut(i,2000)|setTimeOut(i,0)|setTimeOut(i,1000)|
|main()            |               |                  |

|call stack    |call queue     |web api           |
|--------------|---------------|------------------|
|main()        |setTimeOut(i,0)|setTimeOut(i,1000)|
|              |               |setTimeOut(i,2000)|



5. for 迴圈第四圈執行
```javascript
// i = 3
console.log('i: ' + i); // 輸出 i:3
setTimeOut(() => {
    console.log(i)
  }, 3000); // 放入 web api 計時
```

|call stack          |call queue     |web api           |
|--------------------|---------------|------------------|
|console.log('i: ',i)|setTimeOut(i,0)|setTimeOut(i,1000)|
|main()              |               |setTimeOut(i,2000)|

|call stack        |call queue     |web api           |
|------------------|---------------|------------------|
|setTimeOut(i,3000)|setTimeOut(i,0)|setTimeOut(i,1000)|
|main()            |               |setTimeOut(i,2000)|

|call stack    |call queue     |web api           |
|--------------|---------------|------------------|
|main()        |setTimeOut(i,0)|setTimeOut(i,1000)|
|              |               |setTimeOut(i,2000)|
|              |               |setTimeOut(i,3000)|



6. for 迴圈第五圈執行
```javascript
// i = 4
console.log('i: ' + i); // 輸出 i:4
setTimeOut(() => {
    console.log(i)
  }, 4000); // 放入 web api 計時
```


|call stack          |call queue     |web api           |
|--------------------|---------------|------------------|
|console.log('i: ',i)|setTimeOut(i,0)|setTimeOut(i,1000)|
|main()              |               |setTimeOut(i,2000)|
|                    |               |setTimeOut(i,3000)|


|call stack        |call queue     |web api           |
|------------------|---------------|------------------|
|setTimeOut(i,4000)|setTimeOut(i,0)|setTimeOut(i,1000)|
|main()            |               |setTimeOut(i,2000)|
|                  |               |setTimeOut(i,3000)|

|call stack    |call queue     |web api           |
|--------------|---------------|------------------|
|main()        |setTimeOut(i,0)|setTimeOut(i,1000)|
|              |               |setTimeOut(i,2000)|
|              |               |setTimeOut(i,3000)|
|              |               |setTimeOut(i,4000)|



7. for 迴圈第六圈執行
```javascript
// i = 5 ，跳出迴圈
```


8. setTimeOut 計時到期後執行
```javascript
// i = 5
setTimeOut(i,0)  
setTimeOut(i,1000)  
setTimeOut(i,2000)  
setTimeOut(i,3000)  
setTimeOut(i,4000)  
```


|call stack    |call queue     |web api           |
|--------------|---------------|------------------|
|              |setTimeOut(i,0)|setTimeOut(i,1000)|
|              |               |setTimeOut(i,2000)|
|              |               |setTimeOut(i,3000)|
|              |               |setTimeOut(i,4000)|

|call stack     |call queue     |web api           |
|---------------|---------------|------------------|
|setTimeOut(i,0)|               |setTimeOut(i,1000)|
|               |               |setTimeOut(i,2000)|
|               |               |setTimeOut(i,3000)|
|               |               |setTimeOut(i,4000)|

|call stack     |call queue     |web api           |
|---------------|---------------|------------------|
|               |               |setTimeOut(i,1000)|
|               |               |setTimeOut(i,2000)|
|               |               |setTimeOut(i,3000)|
|               |               |setTimeOut(i,4000)|


|call stack    |call queue        |web api           |
|--------------|------------------|------------------|
|              |setTimeOut(i,1000)|setTimeOut(i,2000)|
|              |                  |setTimeOut(i,3000)|
|              |                  |setTimeOut(i,4000)|

|call stack        |call queue     |web api           |
|------------------|---------------|------------------|
|setTimeOut(i,1000)|               |setTimeOut(i,2000)|
|                  |               |setTimeOut(i,3000)|
|                  |               |setTimeOut(i,4000)|

|call stack        |call queue     |web api           |
|------------------|---------------|------------------|
|                  |               |setTimeOut(i,2000)|
|                  |               |setTimeOut(i,3000)|
|                  |               |setTimeOut(i,4000)|

...... 下面依此類推彈出執行
