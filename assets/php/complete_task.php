<?php
session_start();
include_once("db.php");
$task_id = $_GET['id'];
$user_id = $_SESSION['id'];
if (isset($_POST['submit'])){
    $answer = $_POST['user_answer'];
    if (empty($answer)){
        $_SESSION['task-error'] = "Вы не ввели ответ!";
        header("Location:../../task.php?id=$task_id");
    }else{
        $check = $pdo->prepare("SELECT * FROM completed_tasks WHERE task_id = '$task_id' AND user_id = '$user_id'");
        $check->execute();
        $row = $check->fetch();
        if ($row > 0){
            $_SESSION['task-error'] = "Вы уже решили данное задание!";
            header("Location:../../task.php?id=$task_id");
        }else{
       $query = $pdo->prepare("SELECT * FROM tasks WHERE id = '$task_id'");
       $query->execute();
       $row = $query->fetch();
       if ($answer !== $row['answer']){
        $_SESSION['task-error'] = "Задание решено неверно!";
        header("Location:../../task.php?id=$task_id");
        }else{
        $complete_task = $pdo->prepare("INSERT INTO completed_tasks(task_id, user_id) VALUES ('$task_id', '$user_id')");
        $complete_task->execute();
        $_SESSION['task-success'] = "Задание решено верно!";
        header("Location:../../task.php?id=$task_id");
       }
    }
    }
}