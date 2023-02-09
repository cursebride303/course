<?php
session_start();
include_once("db.php");
$task_id = $_GET['id'];
if (isset($_POST['submit'])){
    if (isset($_POST['the_task'])){
        $text = $_POST['the_task'];
    }
    $additional_text = $_POST['additional_task'];
    $title = $_POST['the_task_name'];
    $answer = $_POST['task_answer'];
    $class = $_POST['task_class'];
    $subject = $_POST['task_subject'];
    $image_name = $_FILES["img"]["name"]; // Получаем имя фотографии
$image_path_tmp = $_FILES ["img"]["tmp_name"]; // Временное имя фотографии
$image_path = '../../assets/images'; 
if ($image_name!=""){
    move_uploaded_file($image_path_tmp, "$image_path/$image_name"); //Помещаем картинку по указанному пути 
    $img = $image_path . "/" . $image_name; //Полный путь фотографии
}else{
        $img = $_POST['old_file'];
    }
        if(isset($text) && !isset($image_name)){
            if (!isset($title) || !isset($answer) || !isset($class)|| !isset($subject)){
                $_SESSION['admin_task_message'] = "Заполните все данные!";
                header("Location:../../change_task.php?id=$task_id");
            }else{
            $suggest_task = $pdo->prepare("UPDATE tasks SET title = '$title', subject_id = '$subject', class_id = '$class', text = '$text', answer = '$answer' WHERE id = '$task_id'");
            $suggest_task->execute();
            $_SESSION['admin_task_message'] = "Задача успешно обновлена!";
            header("Location:../../change_task.php?id=$task_id");
            }
            }elseif(isset($image_name) && !isset($text)){
            if (!isset($title) || !isset($answer) || !isset($class)|| !isset($subject)){
                $_SESSION['admin_task_message'] = "Заполните все данные!";
                header("Location:../../change_task.php?id=$task_id");
            }elseif(!isset($additional_text)){
            $suggest_task = $pdo->prepare("UPDATE tasks SET title = '$title', subject_id = '$subject', class_id = '$class', text = '$img', answer = '$answer' WHERE id = '$task_id'");
            $suggest_task->execute();
            $_SESSION['admin_task_message'] = "Задача успешно обновлена!";
            header("Location:../../change_task.php?id=$task_id");
        }else{
            $suggest_task = $pdo->prepare("UPDATE tasks SET title = '$title', subject_id = '$subject', class_id = '$class', text = '$img', additional_text = '$additional_text', answer = '$answer' WHERE id = '$task_id'");
            $suggest_task->execute();
            $_SESSION['admin_task_message'] = "Задача успешно обновлена!";
            header("Location:../../change_task.php?id=$task_id");
        }
    }
}