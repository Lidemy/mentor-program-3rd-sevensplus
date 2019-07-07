<?php require_once('./conn.php')?>
<?php require_once('./utils.php')?>
<Html>
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="./style.css" />
</head>
<body class="index">
    <div class="alert">注意：本站為練習用，註冊時請勿使用任何真實資訊</div>
    <nav class="index__nav">
        <?php 
        if(login_verify()) {
            echo "<span class='helloName'>哈囉，" . turnchars($_SESSION['nickname']) . "</span>";
            echo "<a class='index_manage_comment' href='./manageComment.php'>管理留言</a>";
            echo "<a class='index_change_name' href='./changeName.php'>更改暱稱</a>";
            echo "<a class='index_out' href='./handleSignOut.php'>登出</a>";
        } else {
            echo "<a class='index_register' href='./register.php'>註冊</a>";
            echo "<a class='index_sign' href='./sign.php'>登入</a>";
        }
        ?>
    </nav>
    <div class="index__title">留言板</div>
    <main class="index__main">
        <div class="oldpost">
            <?php
                $sql_page_count = "SELECT count(*) AS count FROM sevenplus_message WHERE `parent` = 0";
                $page_count = $conn->query($sql_page_count)->fetch_assoc()['count'];
                if ($page_count > 0){
                    $size = 20;
                    $num_page = ceil($page_count / $size);
                    echo "<div class='page_list'>";
                    for($i = 1;$i <=$num_page;$i++){
                        echo "<a href='./index.php?page=$i'>$i</a>";
                    }
                    echo "</div>";
                }

                @$page = $_GET['page'];
                if ($page){
                    $showing_page = ($page-1)*20;
                    $sql_now_page = " SELECT a.nickname, a.id, b.message, b.time,b.sevenplus_users_id, b.parent, b.message_id, b.isChild
                    FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id
                    WHERE b.parent = 0 ORDER BY b.time DESC LIMIT $showing_page,$size";
                    $post_result = $conn->query($sql_now_page);

                    $num_post = post_numbers($post_result);
                    for($i=1;$i <= $num_post;$i++){
                        $info = $post_result->fetch_assoc();
                        $mess_id = $info["message_id"];
                        echo "<div class='pieces'>";
                        parent_post($info);
                        if ($info["isChild"] > 0){
                            $sql_sub_post = " SELECT a.nickname, a.id, b.message, b.time,b.sevenplus_users_id, b.message_id, b.parent
                            FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id
                            WHERE b.parent = $mess_id ORDER BY b.time";
                            $sub_post_result = $conn->query($sql_sub_post);
                            for($j=1; $j<=$sub_post_result->num_rows; $j++){
                                $sub_info = $sub_post_result->fetch_assoc();
                                child_post($sub_info,$info["parent"],$sub_info["sevenplus_users_id"]);
                            }
                        }
                        if (login_verify()) post_box($mess_id,"reply_box","post_reply_input");
                        echo "</div>";
                    }
                } else {
                    $sql_origin = " SELECT a.nickname, a.id, b.message, b.time,b.sevenplus_users_id,b.message_id, b.parent, b.isChild
                    FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id
                    WHERE b.parent = 0 ORDER BY b.time DESC LIMIT 0,$size";
                    $result_origin = $conn->query($sql_origin);
                    $num_post = post_numbers($result_origin);
                    for($i=1;$i <= $num_post;$i++){
                        $info = $result_origin->fetch_assoc();
                        $mess_id = $info['message_id'];
                        echo "<div class='pieces'>";
                        parent_post($info);
                        if ($info["isChild"] > 0){
                            $sql_sub_post = " SELECT a.nickname, a.id, b.message, b.time,b.sevenplus_users_id, b.message_id, b.parent
                            FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id
                            WHERE b.parent = $mess_id ORDER BY b.time";
                            $sub_post_result = $conn->query($sql_sub_post);
                            for($j=1; $j<=$sub_post_result->num_rows; $j++){
                                $sub_info = $sub_post_result->fetch_assoc();
                                child_post($sub_info,$info["sevenplus_users_id"],$sub_info["sevenplus_users_id"]);
                            }
                        }         
                        if (login_verify()) post_box($mess_id,"reply_box","post_reply_input");
                        echo "</div>";
                    }
                }
                if ($page_count > 0){
                    $size = 20;
                    $num_page = ceil($page_count / $size);
                    echo "<div class='page_list'>";
                    for($i = 1;$i <=$num_page;$i++){
                        echo "<a href='./index.php?page=$i'>$i</a>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
        <div class="newpost">
            <?php
            if (login_verify()){
                post_box(0,"new_post_box","newpost_button");
            } else {
                echo "<div class='index_notice'>登入後才能留言喔~~</div>";
            }
            ?>   
        </div>
    </main>
</body>
</Html>