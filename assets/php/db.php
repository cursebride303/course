<?php //Подключение к базе данных
$dsn = 'mysql:dbname=task_collection;host=localhost;charset=utf8'; //Переменная с информацией о базе данных: название, адрес, кодировка
$user = 'root'; // Логин для входа в базу данных
$password = ''; // Пароль для входа в базу данных
$pdo = new PDO($dsn, $user, $password); // Переменная подключения к базе данных