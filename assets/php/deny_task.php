<?php
session_start();
include_once("db.php");
$task_id = $_GET['id'];
$delete_task = $pdo->prepare("DELETE FROM requests WHERE request_id = '$task_id'");
$delete_task->execute();
header("Location:../../admin.php");