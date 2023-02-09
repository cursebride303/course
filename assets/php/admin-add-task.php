<?php
session_start();
include_once("db.php");
include_once("process-request.php");
if (isset($_POST['submit'])){
    $title = $_POST['the_task_name'];
    $text = $_POST['the_task'];
    $additional_text = $_POST['additional_task'];
    $answer = $_POST['task_answer'];
    $class = $_POST['task_class'];
    $subject = $_POST['task_subject'];
    $image_name = $_FILES["img"]["name"]; // Получаем имя фотографии
$image_path_tmp = $_FILES ["img"]["tmp_name"]; // Временное имя фотографии
$image_path = '../../assets/images'; 
$img = $image_path . "/" . $image_name; //Полный путь фотографии
move_uploaded_file($image_path_tmp, "$image_path/$image_name"); //Помещаем картинку по указанному пути 
        if (!empty($text) && !empty($image_name)){
            $_SESSION['suggest_task_message'] = "Условие задачи может быть только в одном варианте!";
        header("Location:../../add-task.php");
        }elseif(empty($title) || empty($answer) || empty($class)|| empty($subject) || empty($img)){
            $_SESSION['suggest_task_message'] = "Заполните все данные!";
                header("Location:../../add-task.php");
        }else{
        if(!empty($text) && empty($image_name)){
            if (empty($title) || empty($answer) || empty($class)|| empty($subject)){
                $_SESSION['suggest_task_message'] = "Заполните все данные!";
                header("Location:../../add-task.php");
            }elseif(!empty($additional_text)){
                $_SESSION['suggest_task_message'] = "При отсутствии картинки дополнительное условие не нужно!";
            header("Location:../../add-task.php");
            }else{
            $suggest_task = $pdo->prepare("INSERT INTO tasks(title, subject_id, class_id, text, answer) VALUES ('$title', '$subject', '$class', '$text', '$answer')");
            $suggest_task->execute();
            $_SESSION['suggest_task_message'] = "Задача успешно добавлена!";
            header("Location:../../add-task.php");
            }
        }elseif(!empty($image_name) && empty($text)){
            if (empty($title) || empty($answer) || empty($class)|| empty($subject)){
                $_SESSION['suggest_task_message'] = "Заполните все данные!";
                header("Location:../../add-task.php");
            }elseif(!empty($additional_text)){
            $suggest_task = $pdo->prepare("INSERT INTO tasks(title, subject_id, class_id, text, additional_text, answer) VALUES ('$title', '$subject', '$class', '$img', '$additional_text', '$answer')");
            $suggest_task->execute();
            $_SESSION['suggest_task_message'] = "Задача успешно добавлена!";
            header("Location:../../add-task.php");
        }else{
            $suggest_task = $pdo->prepare("INSERT INTO tasks(title, subject_id, class_id, text, answer) VALUES ('$title', '$subject', '$class', '$img', '$answer')");
            $suggest_task->execute();
            $_SESSION['suggest_task_message'] = "Задача успешно добавлена!";
            header("Location:../../add-task.php");
        }
    }
}
}