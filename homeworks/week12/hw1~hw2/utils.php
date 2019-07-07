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
function parent_post($info){   
    echo "<div class='author'>".turnchars($info['nickname']) ."</div>";
    echo "<div class='content'>" . turnchars($info['message']) . "</div>";
    echo "<div class='time'>" . $info['time'] . "</div>";
    if ($info["sevenplus_users_id"] == @$_SESSION["userid"]){
        $message_id = $info["message_id"];
        echo "<div class='post_func'><a href='./changePost.php?mess_id=$message_id&path=index'>編輯留言</a><a href='./deletePost.php?mess_id=$message_id&path=index' >刪除留言</a></div>";
    }
}
function child_post($sub_info,$parent_id,$child_id){
    if ($parent_id == $child_id) {
        echo "<div class='sub_pieces author_reply'>";
    } else {
        echo "<div class='sub_pieces'>";
    }
    echo "<div class='sub_author'>" . turnchars($sub_info['nickname']) . "</div>";
    echo "<div class='sub_content'>" . turnchars($sub_info['message']) . "</div>";
    echo "<div class='sub_time'>" . $sub_info['time'] . "</div>";
    if ($sub_info["sevenplus_users_id"] == @$_SESSION["userid"]){
        $message_id = $sub_info["message_id"];
        echo "<a href='./changePost.php?mess_id=$message_id&path=index'>編輯留言</a><a href='./deletePost.php?mess_id=$message_id&path=index'>刪除留言</a>";
    }
    echo "</div>";
}
function post_box($mess_id,$mess_box_name,$submit_name){
    echo "<div class='$mess_box_name'><form method='POST' action='./handleNewPost.php'>";
    echo "<textarea name='new_messager'></textarea>";
    echo "<input value='$mess_id' type='hidden' name='parent_id'/>";
    echo "<input type='submit' class='$submit_name'/>";
    echo "</form></div>";
}
?>