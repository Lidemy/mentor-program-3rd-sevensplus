## 請說明 SQL Injection 的攻擊原理以及防範方法
- SQL Injection：讓輸入內容變成程式碼的一部份，藉此操控程式碼的運行，達成特殊目的
    - 假設原本的程式碼如下
    ```sql
    SELECT * FROM users WHERE username = '$username' AND password = '$password'
    ```
    當 `$username = "  '1 or 1=1 ——  "`，輸入後會變成
    ```sql
    SELECT * FROM users WHERE username = '' or 1=1 —— AND password = 
    ```
    在這串文字當中，第一個括號將帳號輸入框關閉，然後利用 `or` 使條件無論如何都是`true`，`——`則將最後面的文字變成備註。透過這個，便可以操控程式碼調出所有資料
- 防範方式：用內建的 `stmt` 方式，將輸入的東西限定為字串

## 請說明 XSS 的攻擊原理以及防範方法
- XSS 的操作原理和 SQL Injection 是差不多的，主要的差別在於，SQL Injection 操控的是 SQL 程式碼，XSS 則是在輸入中寫 Html標籤、javascript 內容，讓網頁運作時多出預期外的動作
    ```html
    <h1>hi</h1>
    <script>...</script>
    ```
- XSS 分成兩種
    - 儲存型(將攻擊內容存在資料庫結構)
    - 反射型(將東西放在網址上)
- 解法：限制符號的輸入，將輸入內容限定為純文字，避免符號產生作用

## 請說明 CSRF 的攻擊原理以及防範方法
- CSRF 是偽造他人權限執行操作。例如製作假網頁，讓使用者點擊後連到目標網頁，偽裝成使用者進行操作。例如，讓使用者點擊連結後向特定網頁發出 POST、DELETE 等等請求，若沒有進一步驗證，可能就會執行動作
- 解法：
    - 檢查 request 當中的 referer，確定發送的 domain
    - 執行前需要輸入驗證碼(電腦上的圖片驗證、簡訊認證等)，或是帶進網頁中隨機產生的 token 進行再次確認

參考資料
- [讓我們來談談CSRF  by huli](https://blog.techbridge.cc/2017/02/25/csrf-introduction/)
