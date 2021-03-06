## 請以自己的話解釋 API 是什麼
API（Application programming interface）中文翻做應用程式介面。簡單來說，它為使用者與伺服器提供了一個框架，讓雙方可以在這個規矩下互動、交換資料。有時候，使用者想要向某網站的伺服器拿資料，可是伺服器不可能開放完整的資料庫，一方面有資安問題，另一方面資料太多會很複雜。於是雙方使用API，伺服器開放一部份權限，使用者在這個規則下，輸入特定的指令和伺服器溝通，拿到自己想要的東西。

舉例來說，比價網站就透過API，傳送使用者提供的條件給各大網站，然後獲得資訊，整理所有的結果給使用者，這個過程就是透過API。  
[例子來源](https://www.youtube.com/watch?v=zvKadd9Cflc)


## 請找出三個課程沒教的 HTTP status code 並簡單介紹
- 1xx ：要進行一些處理。

- 2xx ：成功。  
200：請求成功，東西會隨著這個回應返回。201：請求被實現。202：請求成功，但還沒被處理，也可能不會被處理。204：成功但沒有回傳任何東西。205：同樣是請求成功、沒回傳內容，這個要求使用者重設文件視圖。

- 3xx ：重新導向。  
301：永久改變。302：暫時改變

- 4xx ：失敗（client）   
401：未認證，或被拒絕存取。404：失敗，請求未被實現，但允許後續請求。408；請求超時。409：請求存在衝突無法處理。410：請求的資源不再可用。

- 5xx ：伺服器錯誤，不支援某功能。
503：伺服器過載

參考資料：  
[MDN](https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Status)  
[維基](https://zh.wikipedia.org/wiki/HTTP%E7%8A%B6%E6%80%81%E7%A0%81)


## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

### 我家餐廳 API 

URL：https://api.privateKitchen.com

| 說明     | Method | path       | 參數                   | 範例             |
|--------|--------|------------|----------------------|----------------|
| 檢視餐廳列表 | GET    | /lists     | limit: 餐廳數           | /lists?limit=5 |
| 檢視某家餐廳 | GET    | /lists/:id | 無                    | /lists/10      |
| 新增餐廳   | POST   | /lists     | name: 餐廳名 , address: 地址 , tel: 電話 | 無              |
| 刪除餐廳   | DELETE   | /lists/:id     | 無 | 無              |
| 更改餐廳資訊   | PATCH   | /lists/:id     | name: 餐廳名 , address: 地址 , tel: 電話 | 無              |

