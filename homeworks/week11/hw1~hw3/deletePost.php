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
                        $mess_id = $_COOKIE["mess_id"];
                        $sql = "SELECT `message` FROM `sevenplus_message` WHERE `message_id` = $mess_id";
                        $content=$conn->query($sql)->fetch_assoc()["message"];
                        echo $content;
                    ?>
                </div>
                <span class="delete_sure">確認刪除</span>
                <span class="delete_cancel">取消返回</span>
            </div>
            </main>
            <script type="text/javascript">
                document.querySelector('.delete_sure').onclick = (a) => {
                    window.location.href = `handleDeletePost.php`;  
                }
                document.querySelector('.delete_cancel').onclick = (a) => {
                    window.location.href = `manageComment.php`;  
                }
            </script>
    </body>
</html>