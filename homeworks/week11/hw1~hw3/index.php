<?php require_once('./conn.php')?>
<Html>
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body class="index">
    <div class="alert">注意：本站為練習用，註冊時請勿使用任何真實資訊</div>
    <nav class="index__nav">
        <?php if (isset($_COOKIE["certification"])) echo "<span class='helloName'>哈囉，" . $_COOKIE['nickname'] . "</span>";?>
        <a class="index_register" href="./register.php">註冊</a>
        <a class="index_sign" href="./sign.php">登入</a>
        <a class="index_manage_comment" href="./manageComment.php">管理留言</a>
        <a class="index_change_name" href="./changeName.php">更改暱稱</a>
        <a class="index_out" href="./handleSignOut.php">登出</a>
    </nav>
    <div class="index__title">留言板</div>
    <main class="index__main">
        <div class="oldpost">
            <?php
                $sql_page_count = "SELECT count(*) AS count FROM sevenplus_message";
                $result = $conn->query($sql_page_count);

                if ($result && $result->num_rows >0){
                    $num_post = $result->fetch_assoc()['count'];
                    $size = 20;
                    $num_page = ceil($num_post / $size);
                    echo "<div class='page_list'>";
                    for($i = 1;$i <=$num_page;$i++){
                        echo "<a href='./index.php?page=$i'>$i</a>";
                    }
                    echo "</div>";
                }

                @$page = $_GET['page'];
                if ($page){
                    $showing_page = ($page-1)*20;
                    $sql_page = " SELECT a.nickname, a.id, b.message, b.time,b.sevenplus_users_id 
                    FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id
                    ORDER BY b.time DESC LIMIT $showing_page,$size";
                    $result_page = $conn->query($sql_page);
                    $num_post = 20;
                    if ($result_page->num_rows < 20) $num_post = $result_page->num_rows;
                    for($i=1;$i <= $num_post;$i++){
                        $info = $result_page->fetch_assoc();
                        echo "<div class='pieces'>";
                        echo "<div class='author'>".$info['nickname'] ."</div>";
                        echo "<div class='content'>" . $info['message'] . "</div>";
                        echo "<div class='time'>" . $info['time'] . "</div>";
                        echo "</div>";
                    }
                } else {
                    $sql_origin = " SELECT a.nickname, a.id, b.message, b.time,b.sevenplus_users_id 
                    FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id
                    ORDER BY b.time DESC LIMIT 0,$size";
                    $result_origin = $conn->query($sql_origin);
                    $num_post = 20;
                    if ($result_origin->num_rows < 20) $num_post = $result_origin->num_rows;
                    for($i=1;$i <= $num_post;$i++){
                        $info = $result_origin->fetch_assoc();
                        echo "<div class='pieces'>";
                        echo "<div class='author'>".$info['nickname'] ."</div>";
                        echo "<div class='content'>" . $info['message'] . "</div>";
                        echo "<div class='time'>" . $info['time'] . "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
        <div class="newpost">
            <?php
            if ($_COOKIE){
                echo "<form method='POST' action='./handleNewPost.php' class='index_postbox'>";
                echo "<textarea placeholder='留言' name='new_messager'></textarea>";
                echo "<div><input type='submit' value='提交' class='index_button5' id='handleNewPost'/></div>";
                echo "</form>";
            } else {
                echo "<div class='index_notice'>登入後才能留言喔~~</div>";
            }
            ?>   
        </div>
    </main>
    <script src="./script.js"></script>
</body>
</Html>