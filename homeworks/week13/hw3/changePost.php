<html>
<?php require_once('./conn.php'); ?>
    <head>
        <meta charset="UTF-8">
        <title>留言板</title>
        <link rel="stylesheet" href="./style.css"/>
    </head>
    <body class="change__post">
        <main class="change__post__box">
            <div class="change__post__title">更改留言</div>
            <?php
                if(isset($_GET['content'])){
                    $content = $_GET['content'];
                    $path = "index";
                    $stmt = $conn->prepare('SELECT `message_id` FROM `sevenplus_message` WHERE `message` = ?');
                    $stmt->bind_param('s',$_GET['content']);
                    $stmt->execute();
                    $mess_id = $stmt->get_result()->fetch_assoc()['message_id'];
                } else {
                    $path = $_GET["path"];
                    $mess_id = $_GET['mess_id'];
                    $sql = "SELECT `message` FROM `sevenplus_message` WHERE `message_id` = $mess_id";
                    $content=$conn->query($sql)->fetch_assoc()["message"];
                };
            ?>
            <form class='change__post__form' method='POST' action='./handleChangePost.php?mess_id=<?php echo $mess_id;?>&path=<?php echo $path;?>'>
            <textarea name='changePost'><?php echo $content?></textarea>
            <div><input type="submit" value="提交" /></div>
            </form>
        </main>
    </body>
</html>