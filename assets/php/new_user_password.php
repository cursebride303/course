<?php
session_start();
include_once("db.php");
if (isset($_POST['change_password'])){
    $hash = $_REQUEST['hash'];
    $user = $pdo->prepare("SELECT id FROM users WHERE hash = '$hash'");
    $user->execute();
    $user_row = $user->fetch();
    $user_id = $user_row['id'];
    $newPassword = $_POST['newPassword'];
    $newPassword_repeat = $_POST['newPassword_repeat'];
    if ($newPassword !== $newPassword_repeat){
        $_SESSION['reset-error'] = 'Пароли не совпадают!';
        header("Location:../../reset_password.php?hash=$hash");
    }else{
        $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $new_user_password = $pdo->prepare("UPDATE users SET password = '$password_hash' WHERE id = '$user_id'");
        $new_user_password->execute();
        $_SESSION['reset-error'] = 'Ваш пароль успешно обновлен!';
        header("Location:../../reset_password.php?hash=$hash");
    }
}