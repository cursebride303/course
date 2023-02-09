<?php
session_start();
    include_once("header.php"); //Подключение шапки сайта
    include_once("assets/php/db.php"); //Подключение файла конфигурации базы данных
    $id = $_GET['id']; //Получаем идентификатор задачи 
    ?>
    <!-- Вывод задачи из базы данных -->
<div class="onetest">
    <?php
    $query=$pdo->prepare("SELECT * FROM requests INNER JOIN subjects ON requests.subject_id = subjects.id_of_subject INNER JOIN users ON requests.user_id = users.id WHERE request_id = '$id'");
    $query->execute();
    $row = $query->fetch();
    ?>
    <b class="Title"><?php echo "Название: ";
    echo $row['title']; ?></b><br>
    Условие:
    <p class="Condition"><?php
     if (preg_match('(.png|.jpg|.jpeg)', $row['text']) === 1){ //Проверка на изображение в условии задачи
      if ($row['additional_text'] !== NULL){
        echo '<img src='.$row['text'].'>';?><br>
        <?php
        echo $row['additional_text'];
    }else{
    echo '<img src='.$row['text'].'>';
    }
     }else{
     echo $row['text'];
     } ?></p>
     <p><?php
     echo "Предмет: ";
     echo $row['subject_title'];
      ?></p><br>
         <p><?php
     echo "Класс: ";
     echo $row['class_id'];
      ?></p><br>
    <div id="solution">
    <?php echo "Ответ: ";
     echo $row['answer'] ?>
    </div>
    <p><?php
     echo "Пользователь, предложивший задачу: ";
     echo $row['login'];
      ?></p><br>
    <?php
    echo "<a class='btn btn-warning form-control' style='margin-bottom:2%;' href='assets/php/allow_task.php?id=".$row["request_id"]."'>Принять";
    echo '</a>';
    echo "<a class='btn btn-warning form-control' href='assets/php/deny_task.php?id=".$row["request_id"]."'>Отклонить";
    echo '</a>';
     ?>
</div>