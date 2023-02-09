<?php
session_start();
include_once("db.php");
$task_id = $_GET['id'];
if (isset($_POST['allow'])){
$query = $pdo->prepare("SELECT * FROM requests WHERE id = '$task_id'");
$query->execute();
$row = $query->fetch();
$title = $row['title'];
$subject = $row['subject_id'];
$class = $row['class_id'];
$text = $row['text'];
$additional_text = $row['additional_text'];
$answer = $row['answer'];
$task = $pdo->prepare("INSERT INTO tasks (title, subject_id, class_id, text, additional_text, answer) VALUES ('$title', '$subject', '$class', '$text', '$additional_text', '$answer')");
$task->execute();
$delete_task = $pdo->prepare("DELETE FROM requests WHERE id = '$task_id'");
$delete_task->execute();
header("Location:../../admin.php");
}elseif(isset($_POST['deny'])){
$delete_task = $pdo->prepare("DELETE FROM requests WHERE id = '$task_id'");
$delete_task->execute();
header("Location:../../admin.php");
}