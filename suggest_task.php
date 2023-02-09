<!-- Страница предложения задачи пользователем -->
<?php
session_start();
if (!isset($_SESSION['auth'])){  //Проверка на авторизацию
    header("Location:/");
}else{
include_once("header.php");   //Подключение шапки сайта
include_once("assets/php/db.php");  //Подключение файла конфигурации базы данных
}
?>
<!-- Форма предложения задачи -->
<div class="onetest_suggest">
    <span class="Answer">Введите данные задачи:</span><br>
    <form action="assets/php/task_to_admin.php" enctype="multipart/form-data" method="POST">
    <div class="suggestion">
    <input type="text" class="form-control" name="the_task_name" placeholder="Название задачи" maxlength="100"><br>
    <input type="text" class="form-control" name="the_task" placeholder="Условие задачи" maxlength="1024"><br>
    <span>Или фото условия задачи одном из форматов (jpg, jpeg, png):<input type="file" name="img" class="form-control"><br></span>
    <input type="text" name="additional_task" class="form-control" placeholder="Дополнительное условие задачи к картинке" maxlength="1024" style="line-height: 8px;"><br>
    <input type="text" class="form-control" name="task_answer" placeholder="Ответ на задачу" maxlength="300"><br>
    <div class="suggest_select">
        <select name="task_subject" class="task_subject form-control">
        <?php //Вывод списка предметов из базы данных
            $query=$pdo->prepare("SELECT * FROM `subjects`");
            $query->execute();
            $row = $query->fetchAll();
            echo "<option selected='true' disabled>Выберите предмет</option>";
            foreach ($row as $item) {
                echo "<option value='{$item['id_of_subject']}'>{$item['subject_title']}</option>";
            }
            ?>
        </select><br>
        <!-- Вывод списка классов по предмету из базы данных -->
        <select id="class" name="task_class" class="form-control"> 
            <option value="">Сначала выберите предмет</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Отправить задачу" class="task_button btn btn-warning form-control">
    </div>
    </form>
    <!-- Блок вывода ошибок -->
    <div class="suggest_task_error">
        <?php
          if (isset($_SESSION['suggest_task_message'])){
            if ($_SESSION['suggest_task_message'] == "Заполните все данные!" ||  $_SESSION['suggest_task_message'] == "Условие задачи может быть только в одном варианте!" || $_SESSION['suggest_task_message'] == "При отсутствии картинки дополнительное условие не нужно!"){
              echo "<div class='error'>";
              echo $_SESSION['suggest_task_message'];
              unset($_SESSION['suggest_task_message']);
              echo "</div>";
            }else{
              echo "<div class='success'>";
              echo $_SESSION['suggest_task_message'];
              unset($_SESSION['suggest_task_message']);
              echo "</div>";
          }
        }
        ?>
    </div>
</div>
<script src="assets/javascript/main.js"></script>
