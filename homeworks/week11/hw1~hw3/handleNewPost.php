<?php
require_once('./conn.php');

$post = $_POST["new_messager"];
$certification = $_COOKIE["certification"];

$sql_match = "SELECT `sevenplus_users_id` FROM `sevenplus_certificate` WHERE `certificate_word` = '$certification'";
$match_id = $conn->query($sql_match)->fetch_assoc()['sevenplus_users_id'];
$sql_insert = "INSERT INTO `sevenplus_message`(`sevenplus_users_id`,`message`) VALUES ($match_id,'$post')";
$result = $conn->query($sql_insert);

header("Location: ./index.php");
?>