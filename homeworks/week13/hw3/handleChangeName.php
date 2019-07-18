<?php
require_once('./conn.php');
session_start();
$nickname = $_POST["newname"];
$userid = $_SESSION['userid'];
if($nickname == ''){
    header("Location:./index.php");
    exit();
}

$stmt = $conn->prepare("UPDATE sevenplus_users SET `nickname` = ? WHERE id = ?");
$stmt->bind_param("si",$nickname,$userid);
$stmt->execute();
$stmt->close();

$_SESSION["nickname"] = $nickname;
header("Location:./index.php");
?>