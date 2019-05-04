### lv0
- 網址：<https://lidemy-http-challenge.herokuapp.com/start>
- 方法：直接將說明內容的`token`貼上，會得到第一關網址  


### lv1
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv1?token={GOGOGO}>
- 方法：在第一關網址後面加上 `&name=名字`，就會得到第二關的token。



### lv2
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv2?token={HellOWOrld}>
- 方法：在第二關後面加上 `&id=56`，測試55~57，答案是56。


### lv3
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv3?token={5566NO1}>  
- 方法：用 `request` 新增檔案，發現 `id = 1989`。在網址後加上 `&id=1989`，得到下一關的token
```Javascript
let request = require('request')

request.post({url:'https://lidemy-http-challenge.herokuapp.com/api/books',
form:{ISBN:9789863594475,name:"大腦喜歡這樣學"}},
function(error,response,body){
    console.log(body)
})
```
得到訊息
```
{"message":"新增成功","id":"1989"}
```


### lv4
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv4?token={LEarnHOWtoLeArn}>
- 方法：用 `request`檢視資料、篩選檔案，把 `&id=79`，貼到網址後面
```javascript
request('https://lidemy-http-challenge.herokuapp.com/api/books',
function(error,response,body){
    let books = JSON.parse(body)
    console.log(books.filter(b => b.author == "村上春樹"))
})
```
篩選結果
```
[ { id: 79, name: '世界末日與冷酷異境', author: '村上春樹', ISBN: '9571313408' } ]
```


### lv5
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv5?token={HarukiMurakami}>
- 方法：用 `request.delete` 刪除資料
```javascript
request.delete('https://lidemy-http-challenge.herokuapp.com/api/books/23',
function(error,response,body){
    console.log(body)
})
```
得到訊息
```
{"message":"\n咦...是刪掉了沒錯，但總覺得哪裡怪怪的，算了，先這樣吧！下一關的 token 為 {CHICKENCUTLET}\n"}  
```

### lv6
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv6?token={CHICKENCUTLET}>
- 方法：
1. 將帳號、密碼改成 `base64` 編碼。放在 `header` 之中回傳，取得em
```javascript
request({url:'https://lidemy-http-challenge.herokuapp.com/api/v2/me',
headers:{'Authorization': 'Basic YWRtaW46YWRtaW4xMjM='}},
function(error,response,body){
    console.log(body)
})
```
得到訊息
```
{"username":"admin","email":"lib@lidemy.com"}
```
2. 把 `&email=lib@lidemy.com` 帶到網址後面


### lv7
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv7?token={SECurityIsImPORTant}>
- 方法：跟著新的API文件走，一樣使用 `request.delete`，但多送出 `header`。
```javascript
request.delete({url:'https://lidemy-http-challenge.herokuapp.com/api/v2/books/89',
headers:{'Authorization': 'Basic YWRtaW46YWRtaW4xMjM='}},
function(error,response,body){
    console.log(body)
})
```
得到訊息
```
{"message":"\n希望下一次進這本書的時候不會再被偷走了。下一關的 token 為 {HsifnAerok}\n"}
```


### lv8
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv8?token={HsifnAerok}>
- 方法：
1. 因為弄了很久還是不會用 `q` 來查(...orz)，就用作者名、書名篩選
```javascript
request({url:'https://lidemy-http-challenge.herokuapp.com/api/v2/books',
headers:{'Authorization': 'Basic YWRtaW46YWRtaW4xMjM='}},
function(error,response,body){
    console.log(JSON.parse(body).filter(b=>b.author.length == 4).filter(b=>b.name.indexOf('我')>=0))
})
```
得到結果有《我殺的人與殺我的人》、《我的櫻花戀人》、《日日好日》，第三本的ISBN最後一碼是7
2. 更改ISBN
```Javascript
request.patch({url:'https://lidemy-http-challenge.herokuapp.com/api/v2/books/72',
form:{'ISBN':'9981835423'},
headers:{'Authorization': 'Basic YWRtaW46YWRtaW4xMjM='}},
function(error,response,body){
console.log(body)
})
```
得到結果
```
{"message":"\n希望之後他們能引進語音輸入系統，我就只要講講話就好。下一關的 token 為 {NeuN}\n"}
```


### lv9
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv9?token={NeuN}>
- 方法：將 `User-Agent` 以及編號帶上
```javascript
request.get({url:'https://lidemy-http-challenge.herokuapp.com/api/v2/sys_info',
headers:{'User-Agent':'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)',
'X-Library-Number':'20',
'Authorization': 'Basic YWRtaW46YWRtaW4xMjM='}},
function(error,response,body){
console.log(body)
})
```
得到
```
{"message":"success","version":"1A4938Jl7","owner":"lib","createdAt":"121290329301"}
```


### lv10
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv10?token={duZDsG3tvoA}>
- 方法：這題我就真的玩猜數字暴力解XD  猜數字是小時候玩電子辭典很喜歡的遊戲呢（還是應該要認真寫程式出來跑嗎）


### lv11
- 網址：<https://lidemy-http-challenge.herokuapp.com/lv11?token={IhateCORS}>
- 方法：待補休息一下QQ

