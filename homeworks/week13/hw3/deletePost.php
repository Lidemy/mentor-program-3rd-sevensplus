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
                    require_once('./utils.php');
                    $mess_id = $_GET["mess_id"];
                    $stmt = $conn->prepare("SELECT `message` FROM `sevenplus_message` WHERE `message_id` = ?");
                    $stmt->bind_param("i",$mess_id);
                    $stmt->execute();
                    $content = $stmt->get_result();
                    echo turnchars($content->fetch_assoc()["message"]);
                ?>
            </div>
            <?php
            @$path = $_GET["path"];
            echo "<a href='./handleDeletePost.php?mess_id=$mess_id&path=$path'>確認刪除</a>";
            echo "<a href='./$path.php'>取消返回</a>";
            ?>
        </main>
    </body>
</html>