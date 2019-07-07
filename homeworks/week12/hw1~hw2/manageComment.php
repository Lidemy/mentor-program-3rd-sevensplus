<?php require_once('./conn.php');?>
<?php session_start();?>
<Html>
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body class="manage__post__body">
    <nav class="manage__post__nav">
        <span class="helloName"><?php echo"哈囉，" . $_SESSION["nickname"] ?></span>
        <a href="./index.php">回到主頁面</a>
        <a href="./handleSignOut.php">登出</a>
    </nav>
    <div class="manage__title">管理留言</div>
    <main class="manage__main">
        <?php
            $userid = $_SESSION['userid'];
            $sql_result = "SELECT * FROM `sevenplus_message` WHERE `sevenplus_users_id` = $userid ORDER BY time DESC";
            $result = $conn->query($sql_result);
            $number = $result->num_rows;
            
            if($result->num_rows > 0){
                for($i=1;$i<=$number; $i++){
                    $row = $result->fetch_assoc();

                    echo "<div class='manage_comment_piece'>";
                    echo "<div class='manage_comment_content'>" . $row['message'] . "</div>";
                    echo "<div class='manage_comment_clock'>" . $row['time'] . "</div>";
                    echo "<a href='./changePost.php?mess_id=" . $row['message_id'] . "&path=manageComment'>編輯留言</a>";
                    echo "<a href='./deletePost.php?mess_id=" . $row['message_id'] . "&path=manageComment'>刪除留言</a>";
                    echo "</div>";
                }
            }
        ?>      
    </main>
</body>
</Html>