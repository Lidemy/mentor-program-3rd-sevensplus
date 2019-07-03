<html>
    <head>
        <meta charset="UTF-8">
        <title>留言板</title>
        <link rel="stylesheet" href="./style.css"/>
    </head>
    <body class="register">
        <main class="reg__box">
            <form method="POST" action="./handleRegister.php">註冊
                <div>帳號：<input type="text" name="username"/></div>
                <div>密碼：<input type="password" name="passwords"></div>
                <div>暱稱：<input type="text" name="nickname"/></div>
                <div><input type="submit" value="註冊" class="reg__sub"/></div>
                <div></div>
            </form>
        </main>
    </body>
</html>