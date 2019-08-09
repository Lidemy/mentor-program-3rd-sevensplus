## CSS 預處理器是什麼？我們可以不用它嗎？
`CSS 預處理器` 可以想像成一個轉譯的機器，我們用另一種規則寫（類似 CSS 的）東西，寫完後丟進預處理器，預處理器就會把我們寫的內容轉成原生 CSS。

想不用預處理器、直接寫 CSS 當然沒問題，但用預處理器的好處是：可以用比較方便、直觀的方式寫 CSS，甚至加入類似函式的東西。如果要寫重複性很高的 CSS，用預處理器會比較方便，修改時也比較容易


## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。
`Cache-Control`：用來設定 cache 機制。以下是 `client端` 的選項
- max-age：設定 cache 過期的時間
- max-stale：可以接收已經過期的 response
- min-fresh：在指定的時間內，要拿到最新的資料
- no-cache：在拿取 cache 資料時，必須先發 request 進行驗證，驗證後確認無修改才會拿取 cache 內容
- no-store：不儲存任何的 cache
- no-transform：不能對資源進行轉換
- only-if-cached：只在第一次進網站時拿資料、並存進 cache，之後就一直使用 cache 內容，不再跟 server 拿任何資料或檢查更新

`Server端` 選項：
- must-revalidate
- no-cache
- no-store
- no-transform
- public
- private
- proxy-revalidate
- max-age
- s-maxage


## Stack 跟 Queue 的差別是什麼？
這兩個種資料結構的差別是，`Stack` 是先進後出，`Queue` 是先進先出。

常用的例子就是吃飯時的點餐和整理：
- `Queue`：`點餐`，先點的人東西會先做，取餐時會先叫前面的人，先點先拿、先進先出。以此類推，當一整串東西傳進去後，拿取時會先拿到比較早傳入的資料。 
- `Stack`：吃飽後自助回收時的 `堆餐盤`，堆的時候從下往上放，但拿來清理時會從上往下拿，後進先出。所以當一串資料存進去，拿取時會拿到比較晚存進去的資料


## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的
- 計算 CSS 選取方式的權重時，可以想像成：將不同的選取方式給予數值，再將數值加總，就可以得到該種選取方式的權重。
- 如果有兩段 CSS 選到同一個物件，則
    1. 權重高的優先生效
    2. 如果權重相同，後寫的大於先寫的。
- 下表解釋
    - 權重表可看成五位數，如一個 id 代表 100，一個 class 代表 10，將用過的選取方式相加，就能得到權重

|選取方式       |說明                |舉例                        |權重數       |
|--------------|--------------------|----------------------------|------------|
|!important    |加在 CSS 後面       |`div{ color:red !important; }`| 1,0,0,0,0  |
|inline style  |寫在 Html 裡面的樣式 |`<div style="color:red">`   | 0,1,0,0,0  |
|id            |                    | `#id_name`                 | 0,0,1,0,0  |
|class         |                    | `.class_name`              | 0,0,0,1,0 |
|psuedo-class  |偽類                 | `:nth-child(), :link, :hover ...`| 0,0,0,1,0 |
|attribute     |屬性選擇器           | `[type="checkbox"], [attr] ...`| 0,0,0,1,0  |
|element       |html標籤元素         | `div, span, ul, ol, li ...` | 0,0,0,0,1  |
|psuedo-element|偽元素               | `::before, ::after, ...`    | 0,0,0,0,1  |
