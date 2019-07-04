<?php

require_once('./conn.php');

$nickname = $_POST["newname"];
$certification = $_COOKIE["certification"];
if($nickname == ''){
    header("Location:./index.php");
    exit();
}

$sql_match = "SELECT `sevenplus_users_id` FROM `sevenplus_certificate` WHERE `certificate_word`= '$certification'";
$match_id = $conn->query($sql_match)->fetch_assoc()["sevenplus_users_id"];

$sql_update = "UPDATE sevenplus_users SET nickname = '$nickname' WHERE id = $match_id";
$result = $conn->query($sql_update);

setcookie("nickname","$nickname");
header("Location:./index.php");
?>