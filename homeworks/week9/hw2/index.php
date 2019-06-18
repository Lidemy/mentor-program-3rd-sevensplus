<?php require_once('./conn.php')?>
<Html>

<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body class="index">
    <div class="alert">注意：本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</div>
    <nav class="index__nav">
        <span class="helloName"><?php echo"哈囉，" . $_COOKIE["nickname"]?></span>
        <span class="index_register index_button1" id="register">註冊</span>
        <span class="index_sign index_button2" id="sign">登入</span>
        <span class="index_change index_button3" id="changeName">更改暱稱</span>
        <span class="index_out index_button4" id="handleSignOut">登出</span>
    </nav>
    <div class="index__title">留言板</div>
    <main class="index__main">
        <div class="oldpost">
            <?php
            $sql = "SELECT * FROM sevenplus_message ORDER BY time DESC";
            $result = $conn->query($sql);
            $nic = "SELECT id,nickname FROM sevenplus_users";
            $nickname = $conn->query($nic);
            $number = ($result->num_rows > 50) ? 50 : $result->num_rows;
            for($i=1; $i <= $nickname->num_rows; $i++){
                $info = $nickname->fetch_assoc();
                $j = $info['id'];
                $author[$j] = $info['nickname'];
            }
            if($result->num_rows > 0){
                for($i=1;$i<=$number; $i++){
                    $row = $result->fetch_assoc();
                    $n = $row['sevenplus_users_id'];
                    echo "<div class='piece'>";
                    echo "<div class='author'>" . @$author[$n] . "</div>";
                    echo "<div class='content'>" . $row['message'] . "</div>";
                    echo "<div class='clock'>" . $row['time'] . "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
        <div class="newpost">
            <div class="index_notice">登入後才能留言喔~~</div>
            <form method="POST" action="./handleNewPost.php" class="index_postbox">
                <textarea placeholder="留言" name="new_messager"></textarea>
                <div><input type="submit" value="提交" class="index_button5" id="handleNewPost" /></div>
            </form>
        </div>
    </main>
    <script src="./script.js"></script>
</body>

</Html>