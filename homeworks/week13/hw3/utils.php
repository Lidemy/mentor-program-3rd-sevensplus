<?php
session_start();

function login_verify(){
    if($_SESSION) return true;
    return '';
}
function post_numbers($a){
    if ($a->num_rows < 20) return $a->num_rows;
    return 20;
}
function turnchars($a){
    return htmlspecialchars($a,ENT_QUOTES,'utf-8');
}
function page_index($count, $size) {
    if ($count > 0){
        $num_page = ceil($count / $size);
        echo "<div class='page_list list_top'>";
        for($i = 1;$i <= $num_page; $i += 1){
            echo "<a href='./index.php?page=$i'>$i</a>";
        }
        echo "</div>";
    }
}
function parent_post($info){
    $message_id = $info["message_id"];
    echo "<div class='pieces pie_$message_id'>";
    echo "<div class='author'>".turnchars($info['nickname']) ."</div>";
    echo "<div class='content'>" . turnchars($info['message']) . "</div>";
    echo "<div class='time'>" . $info['time'] . "</div>";
    if ($info["sevenplus_users_id"] == @$_SESSION["userid"]){
        echo "<a href='./changePost.php?mess_id=$message_id&path=index'>編輯留言</a><a class='del_button' id='del_${message_id}'>刪除留言</a>";
    }
}
function child_post($sub_info, $parent_id, $child_id) {
    $message_id = $sub_info["message_id"];
    if ($parent_id == $child_id) {
        echo "<div class='sub_pieces author_reply'>";
    } else {
        echo "<div class='sub_pieces'>";
    }
    echo "<div class='sub_author'>" . turnchars($sub_info['nickname']) . "</div>";
    echo "<div class='sub_content'>" . turnchars($sub_info['message']) . "</div>";
    echo "<div class='sub_time'>" . $sub_info['time'] . "</div>";
    if ($sub_info["sevenplus_users_id"] == @$_SESSION["userid"]){
        echo "<a href='./changePost.php?mess_id=$message_id&path=index'>編輯留言</a><a class='del_button' id='del_${message_id}'>刪除留言</a>";
    }
    echo "</div>";
}
function post_box($mess_id, $mess_box_name) {
    echo "<div class='$mess_box_name'>";
    echo "<textarea name='new_messager' class='reply_content_$mess_id'></textarea>";
    echo "<input type='submit' class='post_button' id='$mess_id'/>";
    echo "</div>";
}
?>