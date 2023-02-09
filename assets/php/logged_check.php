<?php 
include_once("auth.php");
include_once("db.php");
if (empty($_SESSION['auth']) || ($_SESSION['auth'] == false)){
    if (isset($_COOKIE['user'])){
        $cookie = $_COOKIE['user'];
        $query=$pdo->prepare("SELECT * FROM users WHERE cookie = '$cookie'");
        $query->execute();
        $result = $query->fetch();
        if (!empty($result)){
            session_start();
            $_SESSION['auth'] = true; 
            $_SESSION['id'] = $result['id'];
            $_SESSION['login'] = $result['login'];
        }
    }
}