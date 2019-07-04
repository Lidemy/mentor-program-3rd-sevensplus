<html>
    <head>
        <meta charset="UTF-8">
        <title>留言板</title>
        <link rel="stylesheet" href="./style.css"/>
    </head>
    <body class="change__post">
        <main class="change__post__box">
            <div class="change__post__title">更改留言</div>
            <form class="change__post__form" method="POST" action="./handleChangePost.php">
                <textarea name="changePost"><?php require_once('./conn.php');$mess_id = $_COOKIE["mess_id"];$sql = "SELECT `message` FROM `sevenplus_message` WHERE `message_id` = $mess_id";$content=$conn->query($sql)->fetch_assoc()["message"];echo $content; ?></textarea>
                <div><input type="submit" value="提交" /></div>
            </form>
        </main>
    </body>
</html>