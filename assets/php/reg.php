<?php
session_start();
include_once("db.php");
if(isset($_POST['register'])){
    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $email_check = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
    $email_check->execute();
    $row_email = $email_check->fetch();
    $login_check = $pdo->prepare("SELECT * FROM users WHERE login = '$login'");
    $login_check->execute();
    $row_login = $login_check->fetch();
    if ($row_email > 0){
        $_SESSION['reg-error'] = "Такая электронная почта уже зарегистрирована!";
        header("Location:../../signup.php");
    }elseif($row_login > 0){
        $_SESSION['reg-error'] = "Такой логин уже зарегистрирован!";
        header("Location:../../signup.php");
    }elseif ($password !== $password_repeat){
        $_SESSION['reg-error'] = "Пароли не совпадают!";
        header("Location:../../signup.php");
    }else{
       $password_hash = password_hash($password, PASSWORD_DEFAULT);
       $user = $pdo->prepare("INSERT INTO users (fio, login, email, number, password) VALUES ('$fio', '$login', '$email', '$number', '$password_hash')");
       $user->execute();
       header("Location:../../signup.php");
    }
}