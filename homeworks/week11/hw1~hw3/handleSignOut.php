<?php
require_once('./conn.php');

$certification = $_COOKIE["certification"];
$sql = "DELETE FROM `sevenplus_certificate` WHERE `certificate_word` = '$certification'";
$result = $conn->query($sql);

setcookie("certification","",time()-3600);
setcookie("nickname","",time()-3600);
header("Location: ./index.php");
?>