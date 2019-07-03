<?php
require_once('./conn.php');

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT password,id,nickname FROM sevenplus_users WHERE username = '$username'";
$verify_info =$conn->query($sql)->fetch_assoc();
$userid = $verify_info["id"];

if (password_verify($password,$verify_info["password"])){
    $certificate = md5(uniqid());
    $sql_verify = "INSERT INTO `sevenplus_certificate`(`sevenplus_users_id`,`certificate_word`) VALUES ($userid,'$certificate')";
    $storage = $conn->query($sql_verify);
    setcookie("certification",$certificate,time()+3600*24);
    setcookie("nickname",$verify_info["nickname"],time()+3600*24);
    header("Location: ./index.php");
} else {
    header("Location: ./index.php");
}
?>