<?php
session_start();
if (isset($_POST['continue'])){
  include_once("db.php");
  $login_form = $_POST['login_form'];
  $query = $pdo->prepare("SELECT * FROM users WHERE email = '$login_form'");
  $query->execute();
  $row = $query->fetch();
  if($row <= 0){
      $_SESSION['auth-error'] = "Такого пользователя не существует!";
      header("Location:../../forgot_password.php");
}else{
    $email = $row['email'];
    $hash = md5($email . time());
    $headers = "From: <egor.alemasov.2003@mail.ru>\r\n";
    $subject = "Вам письмо"; // тема письма
    $message = '
        Подтвердите Email
        Что бы восстановить пароль перейдите по ссылке http://localhost/reset_password.php?hash='.$hash.'
        ';
        $update_hash = $pdo->prepare("UPDATE users SET hash = '$hash' WHERE email='$email'");
        $update_hash->execute();
        if (mail($email, $subject, $message, $headers)) {
          // Если да, то выводит сообщение
          $_SESSION['auth-error'] = "Письмо отправлено на электронную почту!";
          header("Location:../../forgot_password.php");
      } else {
          $_SESSION['auth-error'] = "Произошла ошибка, письмо не отправлено!";
          header("Location:../../forgot_password.php");
      }
}
}
?>