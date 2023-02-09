<?php
include_once("db.php");
$user_id = $_GET['id'];
$change_status = $pdo->prepare("UPDATE users SET status = '1' WHERE id = '$user_id'");
$change_status->execute();
$delete_request = $pdo->prepare("DELETE FROM unban_requests WHERE user_id = '$user_id'");
$delete_request->execute();
header("Location:../../users_control.php");