<?php
require_once('./conn.php');

$username = $_POST["username"];
$password = $_POST["passwords"];
$nickname = $_POST["nickname"];

$sql = "INSERT INTO sevenplus_users(username,password,nickname) VALUES('$username','$password'
,'$nickname')";
$result = $conn->query($sql);

header("Location: ./index.php")

?>