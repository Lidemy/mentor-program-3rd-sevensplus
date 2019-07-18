<?php
require_once('./conn.php');

$username = $_POST["username"];
$password = $_POST["passwords"];
$encrypt_password = password_hash($password,PASSWORD_DEFAULT);
$nickname = $_POST["nickname"];

if (empty($_POST["username"]) || empty($_POST["passwords"]) || empty($_POST["nickname"])) {
    header("Location: ./index.php");
    exit();
}

$stmt = $conn->prepare("INSERT INTO sevenplus_users(username,password,nickname) VALUES(?,?,?)");
$stmt->bind_param("sss",$username,$encrypt_password,$nickname);
$stmt->execute();
$stmt->close();
header("Location: ./index.php")
?>