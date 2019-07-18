<?php
require_once('./conn.php');
session_start();

$post = $_POST["new_messager"];
$userid = $_SESSION['userid'];
$parent = $_POST["parent_id"];

$stmt = $conn->prepare("INSERT INTO `sevenplus_message`(`sevenplus_users_id`,`message`,`parent`) VALUES (?,?,?)");
$stmt->bind_param("isi",$userid,$post,$parent);
$stmt->execute();
$last_id = $conn->insert_id;
$stmt->close();

$stmt_update = $conn->prepare("UPDATE `sevenplus_message` SET `isChild`= `isChild`+ 1 WHERE `message_id` = ?");
$stmt_update->bind_param("i",$parent);
$stmt_update->execute();
$stmt_update->close();

$sql = "SELECT a.nickname, b.time FROM sevenplus_message AS b LEFT JOIN sevenplus_users AS a ON b.sevenplus_users_id = a.id WHERE b.message_id = $last_id";
$result = $conn->query($sql)->fetch_assoc();

$arr = array("id"=>$last_id,"time"=>$result['time'],"nickname"=>$result['nickname']);
echo json_encode($arr);
?>