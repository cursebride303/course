<?php
session_start();
include_once("db.php");
$user_id = $_SESSION['id'];
if (isset($_POST['request_submit'])){
    $request = $_POST['request_text'];
    $check = $pdo->prepare("SELECT * FROM unban_requests WHERE user_id = '$user_id'");
    $check->execute();
    $user = $check->fetch();
    if ($user > 0){
        $_SESSION['request'] = 'Вы уже отправляли запрос администратору!';
        header("Location:../../blocked.php");
    }else{
    $unban_request = $pdo->prepare("INSERT INTO unban_requests (user_id, request_text) VALUES ('$user_id', '$request')");
    $unban_request->execute();
    $_SESSION['request'] = 'Ваш запрос отправлен администратору!';
    header("Location:../../blocked.php");
    }
}