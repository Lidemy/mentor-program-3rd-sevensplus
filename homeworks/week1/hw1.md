## 交作業流程
1. 新開一個branch: `git branch hw1`  
2. 切換到那裡: `git checkout hw1`  
3. 打開檔案，寫完存檔後commit: `git commit -am "version_1"`  
4. 上傳到github上: `git push origin hw1`  
5. 發出請求合併 compare & pull request，然後到交作業區發issue  
6. 通過之後回到原本的branch: `git checkout master`  
7. 把github上更新完的作業載回來: `git pull origin master`  
8. 和網站上同步，刪掉寫作業用暫存branch: `git branch -d hw1`
