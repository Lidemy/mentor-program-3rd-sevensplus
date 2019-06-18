資料庫名稱：comments

#### information
| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id     | integer     | 個人 id |
|username | varchar(16) | 帳號 |
|password | varchar(16) | 密碼 |
|nickname  | varcher(12) | 個人暱稱  |

#### messenger
| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|message_id| integer     | 留言 id   |
|user_id   |integer      | 使用者 id    |
|comment   | text        | 留言內容  |
|time      |time  | 留言時間  |

