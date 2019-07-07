<?php
require_once('./conn.php');
session_start();
$userid = $_SESSION['userid'];
$message_id = $_GET["mess_id"];
$path = $_GET["path"];

$stmt = $conn->prepare("SELECT `isChild` FROM `sevenplus_message` WHERE `message_id` = ?");
$stmt->bind_param("i",$message_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc()["isChild"];
$stmt->close();
if($result > 0){
    $sql = "DELETE FROM `sevenplus_message` WHERE `parent` = $message_id";
    $del = $conn->query($sql);
}

$stmt = $conn->prepare("DELETE FROM `sevenplus_message` WHERE `message_id` = ? AND sevenplus_users_id = ?");
$stmt->bind_param("ii",$message_id,$userid);
$stmt->execute();
$stmt->close();

if ($path == "index"){
    header("Location: ./index.php");
    exit();
}
header("Location: ./manageComment.php");
?>