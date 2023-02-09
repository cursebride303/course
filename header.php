<!-- Страница шапки сайта -->
<?php
   session_start(); 
   include_once("assets/php/logged_check.php");  //Подключение файла для проверки входа по куки
  
if (isset($_SESSION['id'])){  //Проверка на блокировку пользователя
$user_id = $_SESSION['id'];
$user_check = $pdo->prepare("SELECT * FROM users WHERE id = '$user_id'");
$user_check->execute();
$user = $user_check->fetch();
if ($user['status'] == 0){
    header("Location:blocked.php");
}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="icon" href="assets/images/рисунок.ico" type="image/x-icon">
    <title>Сборник задач ExpMind</title>
</head>
<body>
  <!-- Блок выбора классов или предмета -->
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="navbar-brand"><img src="assets/images/рисунок2.svg" alt="" width="230px" height="150px"></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbarPadding">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Главная</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Классы
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php $url = $_SERVER["REQUEST_URI"]; if (preg_match('?', $url)){echo "$url&level=1";}else{echo "$url/?level=1";}?>">1 класс</a></li>
            <li><a class="dropdown-item" href="/?level=2">2 класс</a></li>
            <li><a class="dropdown-item" href="/?level=3">3 класс</a></li>
            <li><a class="dropdown-item" href="/?level=4">4 класс</a></li>
            <li><a class="dropdown-item" href="/?level=5">5 класс</a></li>
            <li><a class="dropdown-item" href="/?level=6">6 класс</a></li>
            <li><a class="dropdown-item" href="/?level=7">7 класс</a></li>
            <li><a class="dropdown-item" href="/?level=8">8 класс</a></li>
            <li><a class="dropdown-item" href="/?level=9">9 класс</a></li>
            <li><a class="dropdown-item" href="/?level=10">10 класс</a></li>
            <li><a class="dropdown-item" href="/?level=11">11 класс</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Предметы
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/?subject=4">Русский язык</a></li>
            <li><a class="dropdown-item" href="/?subject=1">Литература</a></li>
            <li><a class="dropdown-item" href="/?subject=5">Английский язык</a></li>
            <li><a class="dropdown-item" href="/?subject=2">Математика</a></li>
            <li><a class="dropdown-item" href="/?subject=11">Информатика</a></li>
            <li><a class="dropdown-item" href="/?subject=6">История</a></li>
            <li><a class="dropdown-item" href="/?subject=7">Обществознание</a></li>
            <li><a class="dropdown-item" href="/?subject=3">Окружающий мир</a></li>
            <li><a class="dropdown-item" href="/?subject=8">География</a></li>
            <li><a class="dropdown-item" href="/?subject=10">Физика</a></li>
            <li><a class="dropdown-item" href="/?subject=9">Биология</a></li>
            <li><a class="dropdown-item" href="/?subject=12">Химия</a></li>
          </ul>
        </li>
      </ul>
      <!-- Пользовательский блок -->
      <div class="sign">
      <?php
      if(isset($_SESSION['auth'])){
      if ($_SESSION['auth'] == true){
        if ($_SESSION['login'] == 'admin'){ //Проверка на вход администратора
          echo "<div class='admin'>";
          echo "<a href='admin.php' class='btn btn-warning'>Админ-панель</a>";
          echo "</div>";
          echo "<div class='cabinet'>";
          echo "<a href='cabinet.php' class='btn btn-warning'>Кабинет</a>";
          echo "</div>";
          echo "<div class='logout'>";
          echo "<a href='assets/php/logout.php' class='btn btn-warning'>Выход</a>";
          echo "</div>";
        }else{
        echo "<div class='cabinet'>";
        echo "<a href='cabinet.php' class='btn btn-warning'>Кабинет</a>";
        echo "</div>";
        echo "<div class='logout'>";
        echo "<a href='assets/php/logout.php' class='btn btn-warning'>Выход</a>";
        echo "</div>";
      }
    }
    }else{
        echo "<div class='log'>";
        echo '<a href="signin.php" class="btn btn-warning">Вход</a>';
        echo "</div>";
        echo "<div class='reg'>";
        echo "<a href='signup.php' class='btn btn-warning' >Регистрация</a>";
        echo "</div>";
    }
?>
    </div>
    </div>
  </div>
</nav>
<script src="assets/javascript/jquery-3.6.3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>