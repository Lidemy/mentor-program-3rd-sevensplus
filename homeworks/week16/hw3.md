## Cache
### `cache` 是什麼
- cache 翻作快取或緩存，以瀏覽器來說，當我們造訪網站後，會將一些網站資料（如圖檔）存到 cache 中，第二次造訪網頁時，就可以直接從 cache （電腦硬碟）中拿資料，不用再發一次 request，減少等待時間，而且也節約流量
### `cache` 的 `Header` 簡介
- `Expire`：cache 的到期時間，在時間內，瀏覽器會直接抓取 cache，不會發送任何的 request
- `Cache-Control`：expire 給的是絕對時間（2020/8/7），cache-control 標示的是相對時間、`max-age`（31536000 sec = 1 year），cache-control 會蓋過 expire
    - `no-store`：不使用 cache
    - `no-cache`：每次都發 request 確認有沒有新東西
- `Last-Modified`：當時間過期，會確認檔案上一次的修改時間，來判斷 cache 裡面的資料是不是最新的，修改過就會重新拿一次資料，沒有就不必
- `If-Modified-Since`：同上，這條會發給網站，兩個一起使用
- `Etag`：Server 有可能打開檔案但沒修改，這樣的話，如果只用修改時間判斷就會不準確。因此會依照檔案內容產生類似 `hash值` 的東西，用這個來判斷檔案是否變動
- `If-None-Match`：和 Etag 搭配使用，確任是否變動
### 其他
- 不用發任何 request 的方式：更動檔案時直接改檔名，類似於把 `hash值` 直接放在名稱中，名稱一變化瀏覽器就會自動去抓新檔案


參考資料：[循序漸進理解 HTTP Cache 機制 by Huli](https://blog.techbridge.cc/2017/06/17/cache-introduction/)


---

## Redis


參考資料：[資料庫的好夥伴：Redis](https://blog.techbridge.cc/2016/06/18/redis-introduction/)