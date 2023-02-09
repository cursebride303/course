<?php
session_start();
if (!isset($_SESSION['auth'])){  //Проверка на авторизацию при решении задач
    $_SESSION['auth-error'] = "Для решения задач необходимо авторизоваться!";
        header("Location:signin.php");
}else{
    include_once("header.php"); //Подключение шапки сайта
    include_once("assets/php/db.php"); //Подключение файла конфигурации базы данных
    $id = $_GET['id']; //Получаем идентификатор задачи 
}
    ?>
<!-- Вывод задачи из базы данных -->
<div class="onetest">
    <?php
    $query=$pdo->prepare("SELECT * FROM tasks WHERE id = '$id'");
    $query->execute();
    $row = $query->fetch();
    ?>
    <b class="Title"><?php echo $row['title'] ?></b>
    <!-- Проверка на правильность решения задачи -->
    <span><?php if (isset($_SESSION['task-error'])){
        echo "<div class='task-error'>";
        echo $_SESSION['task-error']; 
        echo "</div>";
        unset($_SESSION['task-error']);
    }elseif(isset($_SESSION['task-success'])){
        echo "<div class='task-success'>";
        echo $_SESSION['task-success'];
        echo "</div>";
        unset($_SESSION['task-success']);
    } ?></span><br>
    <p class="Condition"><?php
     if (preg_match('(.png|.jpg|.jpeg)', $row['text']) === 1){  //Проверка на изображение в условии задачи
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
    <span class="Answer">Введите ответ:</span><br>
    <form action="assets/php/complete_task.php?id=<?php echo $id;?>" method="POST">
    <div class="check_answer">
    <input type="text" class="onetest_input form-control" name="user_answer">
    <input type="submit" name="submit" value="Проверить ответ" class="task_button btn btn-warning">
    </div>
    </form>
    <div class="answer_button">
        <button class="btn btn-warning" onclick="showAnswer()">Решение</button>
    </div>
    <div id="solution" style="display:none;">
    <?php echo $row['answer'] ?>
    </div>
</div>
<script src="assets/javascript/main.js"></script>
