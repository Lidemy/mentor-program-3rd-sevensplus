## 簡單架設 RESTful API 的方法
### JSON-Server
- 參考資料：[影片](https://www.youtube.com/watch?v=uFKa4xrc42c)、[投影片](https://www.slideshare.net/WillHuangTW/use-json-server-as-a-fake-rest-api)
- 通常是測試用，不太會拿來當成正式發布的 API
1. `npm install -g json-server` 安裝套件
2. `json-server --watch db.json` 開啟 server，就可以從 localhost:3000 連過去，資料庫會存在 db.json 當中
    - 支援 REST 操作
    - 可以用 `...?type=info&type2=info2` 等方式檢索
    - 搜尋的項目後面加 _like 表示部分相似於，_gte、_lte 是大於小於，_ne 是不等於
3. 建立 public 資料夾，可以把靜態檔案放進去，如放入預設首頁 index.html
4. 建立路由檔案，並用 `json-server db.json --routes routes.json`
```json
{
    "/api/:a1/a2" : "/post?type1=:a1&type2=:a2"
}
```