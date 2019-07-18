<?php
require_once('./conn.php');
session_start();

$message =  $_POST["messager"];
$type =  $_POST["type"];

$stmt = $conn->prepare("SELECT `message_id` FROM `sevenplus_message` WHERE `message` = ? ");
$stmt->bind_param('s',$message);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
echo $result;

$stmt->close();

/*
if ($type == "edit") {
    header("Location: ./changePost.php?mess_id=$result");
    exit();    
} else {
    header("Location: ./handleDeletePost.php?mess_id=$result");
}

*/
?>