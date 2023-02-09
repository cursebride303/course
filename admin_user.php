<!-- Страница задачи для администратора -->
<?php
session_start();
    include_once("header.php");  //Подключенние шапки сайта
    include_once("assets/php/db.php");  //Подключение файла конфигурации базы данных
    $id = $_GET['id']; //Получаем идентификатор задачи
    ?>
<!-- Вывод задачи из базы данных -->
<div class="onetest">
    <?php
    $query=$pdo->prepare("SELECT * FROM users INNER JOIN unban_requests ON users.id = unban_requests.user_id WHERE id = '$id'");
    $query->execute();
    $row = $query->fetch();
    ?>
     <p><?php
     echo "Логин пользователя: ";
     echo $row['login'];
      ?></p><br>
         <p><?php
     echo "Почта пользователя: ";
     echo $row['email'];
      ?></p><br>
    <div id="solution">
    <?php echo "Запрос на разблокировку: ";
     echo $row['request_text'] ?>
    </div>
    <?php
    if ($row['status'] == 1){
        echo "<a class='btn btn-warning form-control' href='assets/php/block_user.php?id=".$row["id"]."'>Заблокировать пользователя";
        }else{
            echo "<a class='btn btn-warning form-control' href='assets/php/unblock_user.php?id=".$row["id"]."'>Разблокировать пользователя";
        }
    echo '</a>';
    echo "<a class='btn btn-warning form-control' style='margin-top:2%;' href='users_control.php'>Назад";
    echo '</a>';
     ?>
</div>