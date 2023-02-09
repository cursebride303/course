<?php
session_start();
include_once("db.php");
if(isset($_POST['login'])){
    $login_form = $_POST['login_form'];
    $password_form = $_POST['password_form'];
    $query = $pdo->prepare("SELECT * FROM users WHERE (login = '$login_form' OR email = '$login_form')");
    $query->execute();
    $row = $query->fetch();
    if($row <= 0){
        $_SESSION['auth-error'] = "Такого пользователя не существует!";
        header("Location:../../signin.php");
    }else{
        $id = $row['id'];
        $login = $row['login'];
        $email = $row['email'];
        $pass_word = $row['password'];
    $password = password_verify($password_form, $pass_word);
    if (($login_form == $login || $login_form == $email) && $password_form == $password){
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['login'] = $login;
        $_SESSION['email'] = $email;
        $delete_hash = $pdo->prepare("UPDATE users SET hash = '' WHERE id = '$id'");
        $delete_hash->execute();
        if (isset($_POST['remember'])){
            $_SESSION['user_is_loggedin'] = 1;
            $cookie_hash = md5(sha1($id, $login));
            setcookie("user", $cookie_hash, time()+60*60*24*365*10, "/");
            $query=$pdo->prepare("UPDATE users SET cookie = '$cookie_hash', hash = '' WHERE id='$id'");
            $query->execute();
        }
        header("Location:/");
    }else{
        $_SESSION['auth-error'] = "Неверные данные!";
        header("Location:../../signin.php");
    }
}
}