<?php
include_once("db.php");
$user_id = $_GET['id'];
$change_status = $pdo->prepare("UPDATE users SET status = '0' WHERE id = '$user_id'");
$change_status->execute();
header("Location:../../users_control.php");