<?php
require_once('./conn.php');

$post = $_POST["changePost"];
$certification = $_COOKIE["certification"];
$mess_id = $_GET["mess_id"];

$sql_author = "SELECT `sevenplus_users_id` FROM `sevenplus_certificate` WHERE `certificate_word` = '$certification'";
$match_author = $conn->query($sql_author)->fetch_assoc()["sevenplus_users_id"];
$sql_certificate = "SELECT `sevenplus_users_id` FROM `sevenplus_message` WHERE `message_id` = $mess_id";
$certification = $conn->query($sql_certificate)->fetch_assoc()["sevenplus_users_id"];

if ($match_author == $certification){
    $sql_update = "UPDATE `sevenplus_message` SET `message`= '$post' WHERE `message_id` = $mess_id";
    $result = $conn->query($sql_update);
}

header("Location: ./manageComment.php");
?>