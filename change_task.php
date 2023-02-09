<!-- Страница редактирования задачи -->
<?php
include_once("header.php");  //Подключенние шапки сайта
include_once("assets/php/db.php");  //Подключение файла конфигурации базы данных
$task_id = $_GET['id'];  //Получаем идентификатор задачи
$query = $pdo->prepare("SELECT * FROM tasks WHERE id = '$task_id'");
$query->execute();
$row = $query->fetch();
?>
<!-- Форма редактирования задачи -->
<div class="onetest_suggest">
    <span class="Answer">Редактирование задачи</span><br>
    <form action="assets/php/admin_change_task.php?id=<?php echo $task_id;?>" enctype="multipart/form-data" method="POST">
    <div class="suggestion">
    <input type="text" name="the_task_name" class="form-control" placeholder="Название задачи" maxlength="100" value="<?php echo $row['title']; ?>"><br>
    <?php
    if (preg_match('(.png|.jpg|.jpeg)', $row['text']) === 1){ //Проверка на изображение в условии задачи
      if ($row['additional_text'] !== NULL){
        echo "<input type='file' name='img' class='form-control'>";?><br>
       <? echo "<input type='hidden' name='old_file' value=".$row["text"].">";?>
        <?php
        echo "<input type='text' name='additional_task' class='form-control' placeholder='Дополнительное условие задачи' maxlength='1024' value='".$row["additional_text"]."'><br>";
    }else{
      echo "<input type='file' name='img' class='form-control'>";?><br>
      <? echo "<input type='hidden' name='old_file' value=".$row["text"].">";
    }  
     }else{
       echo "<input type='text' name='the_task' class='form-control' placeholder='Условие задачи' maxlength='1024' value='".$row["text"]."'><br>";
     } 
     ?>
    <input type="text" name="task_answer" class="form-control" placeholder="Ответ на задачу" maxlength="300" value="<?php echo $row['answer']; ?>"><br>
    <div class="suggest_select">
        <select name="task_subject" class="task_subject form-control"> 
        <?php  //Вывод списка предметов из базы данных
            $class=$pdo->prepare("SELECT * FROM `subjects`");
            $class->execute();
            $row_class = $class->fetchAll();
            echo "<option selected='true' disabled>Выберите предмет</option>";
            foreach ($row_class as $item) {
                echo "<option value='{$item['id_of_subject']}'>{$item['subject_title']}</option>";
            }
            ?>
        </select><br>
             <!-- Вывод списка классов по предмету из базы данных -->
        <select id="class" name="task_class" class="form-control">
            <option value="">Сначала выберите предмет</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Изменить задачу" class="task_button btn btn-warning form-control">
    </div>
    </form>
    <!-- Блок вывода ошибок при изменении задачи -->
        <?php
        if (isset($_SESSION['admin_task_message'])){
          if ($_SESSION['admin_task_message'] == "Заполните все данные!"){
            echo "<div class='error'>";
            echo $_SESSION['admin_task_message'];
            unset($_SESSION['admin_task_message']);
            echo "</div>";
          }else{
            echo "<div class='success'>";
            echo $_SESSION['admin_task_message'];
            unset($_SESSION['admin_task_message']);
            echo "</div>";
        }
    }
        ?>
</div>
<script src="assets/javascript/main.js"></script>
