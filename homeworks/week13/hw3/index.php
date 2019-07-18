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
                $size = 10;
                page_index($page_count,$size);

                @$page = $_GET['page'];
                if ($page){
                    $showing_page = ($page-1)*$size;
                    $sql_now_page = " SELECT u.nickname, m.message, m.time,m.sevenplus_users_id, m.parent, m.message_id, m.isChild
                    FROM sevenplus_message AS m LEFT JOIN sevenplus_users AS u ON m.sevenplus_users_id = u.id
                    WHERE m.parent = 0 ORDER BY m.time DESC LIMIT $showing_page,$size";
                    $post_result = $conn->query($sql_now_page);

                    $num_post = post_numbers($post_result);
                    for($i = 1;$i <= $num_post; $i += 1){
                        $info = $post_result->fetch_assoc();
                        $mess_id = $info["message_id"];
                        parent_post($info);
                        if ($info["isChild"] > 0){
                            $sql_sub_post = " SELECT u.nickname, m.message, m.time,m.sevenplus_users_id, m.message_id, m.parent
                            FROM sevenplus_message AS m LEFT JOIN sevenplus_users AS u ON m.sevenplus_users_id = u.id
                            WHERE m.parent = $mess_id ORDER BY m.time";
                            $sub_post_result = $conn->query($sql_sub_post);
                            for($j = 1; $j <= $sub_post_result->num_rows; $j += 1){
                                $sub_info = $sub_post_result->fetch_assoc();
                                child_post($sub_info,$info["sevenplus_users_id"],$sub_info["sevenplus_users_id"]);
                            }
                        }
                        if (login_verify()) post_box($mess_id,"reply_box");
                        echo "</div>";
                    }
                } else {
                    $sql_origin = " SELECT u.nickname, m.message, m.time,m.sevenplus_users_id,m.message_id, m.parent, m.isChild
                    FROM sevenplus_message AS m LEFT JOIN sevenplus_users AS u ON m.sevenplus_users_id = u.id
                    WHERE m.parent = 0 ORDER BY m.time DESC LIMIT 0,$size";
                    $result_origin = $conn->query($sql_origin);
                    $num_post = post_numbers($result_origin);
                    for($i = 1;$i <= $num_post; $i += 1){
                        $info = $result_origin->fetch_assoc();
                        $mess_id = $info['message_id'];
                        parent_post($info);
                        if ($info["isChild"] > 0){
                            $sql_sub_post = " SELECT u.nickname, m.message, m.time,m.sevenplus_users_id, m.message_id, m.parent
                            FROM sevenplus_message AS m LEFT JOIN sevenplus_users AS u ON m.sevenplus_users_id = u.id
                            WHERE m.parent = $mess_id ORDER BY m.time";
                            $sub_post_result = $conn->query($sql_sub_post);
                            for($j = 1; $j <= $sub_post_result->num_rows; $j += 1){
                                $sub_info = $sub_post_result->fetch_assoc();
                                child_post($sub_info,$info["sevenplus_users_id"],$sub_info["sevenplus_users_id"]);
                            }
                        }         
                        if (login_verify()) post_box($mess_id,"reply_box");
                        echo "</div>";
                    }
                }
                page_index($page_count,$size);
            ?>
        </div>
        <div class="newpost">
            <?php
            if (login_verify()){
                post_box(0,"new_post_box",0);
            } else {
                echo "<div class='index_notice'>登入後才能留言喔~~</div>";
            }
            ?>   
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="./script.js"></script>
</Html>