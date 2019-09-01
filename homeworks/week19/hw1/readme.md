Base URL: http://mentor-program.co/group6/sevenplus/todoList

| 說明            | Method | path           | 參數                         | 範例             |
|---------------- |--------|---------------|------------------------------|------------------|
| 獲取所有代辦事項 | GET    | /lists        | 無                            |                 |
| 獲取單一事項     | GET    | /lists/:id    | 無                            | /lists/10       |
| 新增事項        | POST    | /lists        | text: 待辦事項                | 無              |
| 刪除事項        | DELETE  | /lists/:id    | 無                           | 無               |
| 修改狀態        | PATCH   | /lists/:id    | type：完成狀態                | 無               |