<?php
require_once('./conn.php');

$username = $_POST["username"];
$password = $_POST["passwords"];
$encrypt_password = password_hash($password,PASSWORD_DEFAULT);
$nickname = $_POST["nickname"];

if (empty($_POST["username"]) || empty($_POST["passwords"])) {
    header("Location: ./index.php");
    exit();
} else if (empty($_POST["nickname"])){
    header("Location: ./index.php");
    exit();
}

$sql = "INSERT INTO sevenplus_users(username,password,nickname) VALUES('$username','$encrypt_password','$nickname')";
$result = $conn->query($sql);

header("Location: ./index.php")
?>