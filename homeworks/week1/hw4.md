## 跟你朋友介紹 Git
Git的概念基本上是：幫你把所有版本都記錄下來，這樣就不用擔心之後想回顧的時候找不到。另一個用途是，假設菜哥想到一個笑話，但這個笑話可以往兩個不同的方向發展，就能用git把兩個方向都記下來，看場合選擇要抓哪個出來用，不用捨棄任何一邊，如果之後發現可以融合的話，也可以合成一個新版本。
### 基礎運用
首先，先打開cmd或是terminal，然後將路徑移到笑話的資料夾中，例如 `cd C:\Users\asus\Desktop\joke_collect` 。接著，用 `git init` 來初始化，git就會開始幫你紀錄。  
假設今天菜哥改了joke1.txt，在存檔後，可以用 `git status` 來看版本狀況，這邊就會看到有檔案更動，且還沒有被記錄；所以，菜哥要先用 `git add joke1.txt` 把檔案加入版本控制中，然後用 `git command -m "version_2"` ，就可以紀錄新版本了。比較快速的指令是 `git commit -am 'version_2'` ，但這個指令只有在改舊檔案時才能用，有新檔案沒辦法被記錄下去。  
之後，菜哥可以繼續改檔案、新增version_3、version_4......等，當菜哥想要回顧時，用 `git log` 就能看到更動過的所有版本資料。如果想要看某一版的話，要先把版本的版本碼記下來（在git log中，很長那串），用 `git checkout 版本碼` ，就能回到那一版，最後用 `vim、less、cat` 等方式觀看檔案內容，看完後用 `git checkout master` 回來最新版。
### 進階運用
假如菜哥今天面對一個問題：他想嘗試新的笑話風格，但不確定是否適合自己，那該怎麼辦呢？這時候，我們可以用分支處理。菜哥可以用 `git branch joke_type2` 蓋一個新風格專區，然後用 `git checkout joke_type2` 切換過去。這個分支會包含菜哥之前紀錄的所有笑話，菜哥可以在這邊將以前的笑話改成新風格，或增加一些新笑話。如果覺得不太適合，再用 `git checkout joke_collect` 切回去就好了，這邊的東西就保留待用。  
另一方面，如果這個風格大受好評，菜哥決定往這條路發展，可以用 `git merge joke_collect` 將兩個風格整合起來，由於裡面檔案不同會發生衝突，這時候用 `git status` 查看檔案狀況，對有問題的檔案手動修正就行了。
### Github運用
如果菜哥想把笑話放到網路上和大家分享，或者做個備份，有沒有什麼好地方呢？Github就是個好選擇。菜哥可以在Github上開啟新專案，並用 `git remote add origin 專案SSH網址` 將電腦與Github連結，然後用 `git push origin joke_collection` ，把東西放到網站上的branch。如果菜哥臨時出差、筆電又沒在身邊，可以直接在Github上修改內容並儲存，回家後再用 `git pull origin joke_collection` 把修正的內容抓下來即可。