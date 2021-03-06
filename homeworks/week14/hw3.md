## 什麼是 DNS？Google 有提供的公開的 DNS，對 Google 的好處以及對一般大眾的好處是什麼？
DNS 全名為 Domain Name System，是將網域名稱與 ip 位置相互對應的一套系統，就像電話簿一樣，我們提供名字（網址、域名），DNS 就能找到電話號碼（ip 位置），並協助我們撥號過去（將網址轉到 ip 位置）。
對大眾來說，Google DNS 可以改進頁面載入的速度，Google DNS 有 cache，如果要拜訪的網址很熱門，Google 會先存起來，因此讀取時會比較迅速。另一方面，如果像我們的 DNS Server (像中華電信)壞了，可以改用 Google DNS，依舊可以上網。而對Google 來說，當使用 DNS 的人數眾多，這些將成為寶貴資料，有助於 Google 做進一步的分析、操作等等。


## 什麼是資料庫的 lock？為什麼我們需要 lock？
在執行 transaction 時會將資料庫加上 lock，避免其他人存取、修改。這麼做的目的是預防錯誤，由於修改後資料庫會產生變動，當 A 在修改資料庫時，若 B 進行存取，就會拿到 A 修改前的數據，如果 B 以此為依據決定動作，可能會與 A 修改後的結果導致矛盾或衝突。


## NoSQL 跟 SQL 的差別在哪裡？
SQL 指的是關聯式資料庫，這種資料庫有固定結構，每筆資料具有的項目、資料形式都是相同的，不同資料表間也可能有對應欄位，因此可以做整合查詢。而 NoSQL 則沒有特定結構，因此資料儲存時較有彈性，擴充資料庫大小也比較方便，直接增加伺服器節點、機器數量就行，儲存大量資料時較容易用到。


## 資料庫的 ACID 是什麼？
ACID 分別代表了四項特質，以此確保 transaction 的正確性（transaction 指的是不可分割的 query 動作，例如轉帳，必須是一進一出、一多一少）。

1. atomicity 原子性：這項監控的是程式執行的最小運作單位。如轉帳(A)這個動作下又分為兩項：一個轉出(A1)與一個轉入(A2)。由於 A 是最小運作單位，因此下面的 A1、A2 會被綁在一起，只能一起成功或一起失敗，一旦 A1 或 A2 其中一個出了問題，另一個也會被強制停止。

2. consistency 一致性：資料必須一致，例如轉帳，個人的帳戶金額會有所變化，但整體的金額必須是相同的，不能因此改變。

3. isolation 隔離性：不同 transcation 間無法同時動作，避免混亂。例如進行兩次轉帳，必須等待第一次完成後，才能進行第二次動作，同時處理可能造成錯誤，如轉出金額過多、帳戶餘額為負的狀況。

4. durability 持久性：在處理完成後，會造成永久性的變動，不會恢復原狀
