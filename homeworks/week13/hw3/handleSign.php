<?php
require_once('./conn.php');
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if ($username == '' or $password == ''){
    header("Location: ./index.php");
    exit();
}

$stmt = $conn->prepare("SELECT password,id,nickname FROM sevenplus_users WHERE username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (password_verify($password,$result["password"])){
    $_SESSION["userid"] = $result["id"];
    $_SESSION["nickname"] = $result["nickname"];
}

header("Location: ./index.php");
?>