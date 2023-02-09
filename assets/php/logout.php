<?php
session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['id']);
    unset($_SESSION['login']);
    unset($_SESSION['email']);
    unset($_SESSION['cookie']);
    unset($_SESSION['user_is_loggedin']);
    session_destroy();
    setcookie("user","",time(), "/");
header("Location:../../");