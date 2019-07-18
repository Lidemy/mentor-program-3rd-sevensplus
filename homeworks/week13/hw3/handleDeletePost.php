<?php
require_once('./conn.php');
session_start();

$message_id = $_GET["mess_id"];
$userid = $_SESSION['userid'];

$stmt = $conn->prepare("SELECT `isChild` FROM `sevenplus_message` WHERE `message_id` = ? AND `sevenplus_users_id` = ?");
$stmt->bind_param("ii",$message_id,$userid);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc()["isChild"];
$stmt->close();

if($result > 0){
    $stmt = $conn->prepare("DELETE FROM `sevenplus_message` WHERE `parent` = ?");
    $stmt->bind_param("i",$message_id);
    $stmt->execute();
    $stmt->close();
}

$stmt = $conn->prepare("DELETE FROM `sevenplus_message` WHERE `message_id` = ? AND sevenplus_users_id = ?");
$stmt->bind_param("ii",$message_id,$userid);
$stmt->execute();
$stmt->close();
?>