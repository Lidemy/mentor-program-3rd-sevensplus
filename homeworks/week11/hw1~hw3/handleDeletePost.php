<?php
require_once('./conn.php');

$certification = $_COOKIE["certification"];
$mess_id = $_COOKIE["mess_id"];

$sql_author = "SELECT `sevenplus_users_id` FROM `sevenplus_certificate` WHERE `certificate_word` = '$certification'";
$match_author = $conn->query($sql_author)->fetch_assoc()["sevenplus_users_id"];
$sql_certificate = "SELECT `sevenplus_users_id` FROM `sevenplus_message` WHERE `message_id` = $mess_id";
$certification = $conn->query($sql_certificate)->fetch_assoc()["sevenplus_users_id"];

if ($match_author == $certification){
    $sql_update = "DELETE FROM `sevenplus_message` WHERE `message_id` = $mess_id";
    $result = $conn->query($sql_update);
}

setcookie('mess_id','',time()-3600);
header("Location: ./manageComment.php");
?>