<?php

require_once('./conn.php');

$nickname = $_POST["newname"];
$id = $_COOKIE["member_id"];

$sql = "UPDATE sevenplus_users SET nickname = '$nickname' WHERE id = $id";
$result = $conn->query($sql);

setcookie("nickname","$nickname");

header("Location: ./index.php");
?>