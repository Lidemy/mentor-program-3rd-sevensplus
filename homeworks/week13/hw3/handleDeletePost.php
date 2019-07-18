<?php
require_once('./conn.php');
session_start();

if(isset($_GET['content'])){
    $stmt = $conn->prepare("SELECT `message_id` FROM `sevenplus_message` WHERE `message` = ?");
    $stmt->bind_param("s",$_GET['content']);
    $stmt->execute();
    $message_id = $stmt->get_result()->fetch_assoc()["message_id"];
    $stmt->close();    
} else {
    $message_id = $_GET["mess_id"];
}

$userid = $_SESSION['userid'];
// $message_id = $_GET["mess_id"];

$stmt = $conn->prepare("SELECT `isChild` FROM `sevenplus_message` WHERE `message_id` = ?");
$stmt->bind_param("i",$message_id);
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