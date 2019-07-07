<html>
    <head>
        <meta charset="UTF-8">
        <title>留言板</title>
        <link rel="stylesheet" href="./style.css"/>
    </head>
    <body class="change__name">
        <main class="change__box">
            <div>修改暱稱
                <div class="old__nickname">原本暱稱：<span class="oldname">
                    <?php 
                    session_start();
                    echo $_SESSION["nickname"]; ?>
                </span></div>
                <form method="POST" action="./handleChangeName.php">
                    <div>新的暱稱：<input type="text" name="newname"></div>
                    <div><input type="submit" value="提交" class="change__name__sub"/></div>
                </form>
            </div>
            </main>
    </body>
</html>