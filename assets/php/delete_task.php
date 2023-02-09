<?php
session_start();
include_once("db.php");
$task_id = $_GET['id'];
$query = $pdo->prepare("DELETE FROM tasks WHERE id = '$task_id'");
$query->execute();
header("Location:../../tasks_control.php");