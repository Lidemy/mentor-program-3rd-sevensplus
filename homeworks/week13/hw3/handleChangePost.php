<?php
require_once('./conn.php');
session_start();

$post = $_POST["changePost"];
$userid = $_SESSION["userid"];
$mess_id = $_GET["mess_id"];
$path = $_GET["path"];

$stmt = $conn->prepare("UPDATE `sevenplus_message` SET `message`= ? WHERE `message_id` = ? AND `sevenplus_users_id` = ?");
$stmt->bind_param("sii",$post,$mess_id,$userid);
$stmt->execute();
$stmt->close();

if ($path == "index"){
    header("Location: ./index.php");
    exit();
}
header("Location: ./manageComment.php");
?>