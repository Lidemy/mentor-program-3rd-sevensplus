<?php
require_once('./conn.php');

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT password,id,nickname FROM sevenplus_users WHERE username = '$username'";
$result =$conn->query($sql)->fetch_assoc();

if ($password = $result["password"]){
    setcookie("member_id",$result["id"],time()+3600*24);
    setcookie("nickname",$result["nickname"],time()+3600*24);
}
header("Location: ./index.php");
?>