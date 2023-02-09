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
    $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE id = '$id'");
    $query->execute();
    $row = $query->fetch();
    ?>
    <b class="Title"><?php echo "Название: ";
    echo $row['title']; ?></b><br>
    Условие:
    <p class="Condition"><?php
     if (preg_match('(.png|.jpg|.jpeg)', $row['text']) === 1){  //Проверка на изображение в условии задачи
        if ($row['additional_text'] !== ''){
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
    <?php
    echo "<a class='btn btn-warning form-control' style='margin-bottom:2%;' href='assets/php/delete_task.php?id=".$row["id"]."'>Удалить задачу";
    echo '</a>';
    echo "<a class='btn btn-warning form-control' href='change_task.php?id=".$row["id"]."'>Изменить задачу";
    echo '</a>';
     ?>
</div>