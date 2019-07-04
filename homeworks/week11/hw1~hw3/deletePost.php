<html>
    <head>
        <meta charset="UTF-8">
        <title>留言板</title>
        <link rel="stylesheet" href="./style.css"/>
    </head>
    <body class="del__post">
        <main class="del__box">
            <div class="del__title">刪除留言</div>
            <div class="del__content">
                <?php                        
                    require_once('./conn.php');
                    $mess_id = $_GET["mess_id"];
                    $sql = "SELECT `message` FROM `sevenplus_message` WHERE `message_id` = $mess_id";
                    $content=$conn->query($sql)->fetch_assoc()["message"];
                    echo $content;
                ?>
            </div>
            <?php
            echo "<a href='./handleDeletePost.php?mess_id=$mess_id'>確認刪除</a>";
            echo "<a href='./manageComment.php'>取消返回</a>";
            ?>
        </main>
    </body>
</html>