<?php
require_once('./conn.php');
session_start();
$post = $_POST["new_messager"];
$userid = $_SESSION['userid'];
$parent = $_POST["parent_id"];

if($post == ''){
    header("Location: ./index.php");
    exit();
}

$sql_insert = "INSERT INTO `sevenplus_message`(`sevenplus_users_id`,`message`,`parent`) VALUES ($userid,'$post',$parent)";
$result = $conn->query($sql_insert);
$sql_update = "UPDATE `sevenplus_message` SET `isChild`= `isChild`+ 1 WHERE `message_id` = $parent";
$result_update = $conn->query($sql_update);
header("Location: ./index.php");
?>