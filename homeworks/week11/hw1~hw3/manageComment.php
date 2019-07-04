<?php require_once('./conn.php')?>
<Html>
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body class="manage__post__body">
    <nav class="manage__post__nav">
        <span class="helloName"><?php echo"哈囉，" . $_COOKIE["nickname"]?></span>
        <a href="./index.php">回到主頁面</a>
        <a href="./handleSignOut.php">登出</a>
    </nav>
    <div class="manage__title">管理留言</div>
    <main class="manage__main">
        <?php
            $certification = $_COOKIE["certification"];
            $sql_match = "SELECT `sevenplus_users_id` FROM `sevenplus_certificate` WHERE `certificate_word` = '$certification'";
            $match_id = $conn->query($sql_match)->fetch_assoc()["sevenplus_users_id"];
            $sql_result = "SELECT * FROM `sevenplus_message` WHERE `sevenplus_users_id` = $match_id ORDER BY time DESC";
            $result = $conn->query($sql_result);
            $nic = $_COOKIE['nickname'];
            $number = $result->num_rows;
            
            if($result->num_rows > 0){
                for($i=1;$i<=$number; $i++){
                    $row = $result->fetch_assoc();
                    $com_id=$row['message_id'];

                    echo "<div class='manage_comment_piece'>";
                    echo "<div class='manage_comment_content'>" . $row['message'] . "</div>";
                    echo "<div class='manage_comment_clock'>" . $row['time'] . "</div>";
                    echo "<a href='./changePost.php?mess_id=$com_id'>編輯留言</a><a href='./deletePost.php?mess_id=$com_id'>刪除留言</a>";
                    echo "</div>";
                }
            }
        ?>      
    </main>
    <script type="text/javascript">let comment_num = <?php echo $number?>;</script>
    <script src="./script2.js"></script>
</body>
</Html>