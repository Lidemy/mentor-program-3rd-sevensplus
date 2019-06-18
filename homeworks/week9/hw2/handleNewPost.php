<?php
require_once('./conn.php');

$post = $_POST["new_messager"];
$id = $_COOKIE["member_id"];

$sql = "INSERT INTO `sevenplus_message`(`sevenplus_users_id`,`message`) VALUES ($id,'$post')";
$result = $conn->query($sql);

header("Location: ./index.php");
?>