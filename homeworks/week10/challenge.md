## 綜合能力測驗
卡住了QQ

---

## 闖關遊戲
### lv0
```
https://r30challenge.herokuapp.com/lv0.php
```

- 直接將給定 token 代入，將關卡換成下一關

### lv1
```
https://r30challenge.herokuapp.com/lv1.php?token=r30:start
```
寫了一點但好像不太對
``` javascript
console.log(parseInt(100101001001100001110,2).toString(18))
// 得到 bad0c，但是不對，後來找提示時跑到第二關就從下面開始跑了(......)
```


### lv2
待補中



### lv3
```
https://r30challenge.herokuapp.com/lv3.php?token=divsurprise
```
開啟檔案，找到 html裡面的註解


### lv4
```
https://r30challenge.herokuapp.com/lv4.php?token=commentfaker
```
一樣開後台原始碼看，會發現 css 裡頭有一個檔案設定 special::after，回到這個下面找到token


### lv5
```
https://r30challenge.herokuapp.com/lv5.php?token=csspersona!
```
卡了很久發現下方有排字，然後就得到token了，不過這方法感覺太簡略不太正規


### lv6
```
https://r30challenge.herokuapp.com/lv6.php?token=windowhack
```
將落落長的文字用 `aaencode` 解碼器翻譯，得到 `window.__IamToken = "emojicute"`


### lv7
```
https://r30challenge.herokuapp.com/lv7.php?token=emojicute
```
進入 `cookie` 中找到 value


### lv8
```
https://r30challenge.herokuapp.com/lv8.php?token=cookieyumyum
```
在 `network` → `lv8.php?token=cookieyumyum` → `response header` 當中找出 token


### lv9
```
https://r30challenge.herokuapp.com/lv9.php?token=headshot
```
待解中，和綜合能力測試一樣的問題
```php
<?php
function isTokenValid($token) {
    if (strlen($token) !== 8) return false;
        for($i = 1; $i <= 7; $i+=2) {
            if ((ord($token[$i]) * ord($token[$i - 1])) % $i !== 0) {
                return false;
            }
        }
        return true;
    }
?>
```


### lv10




