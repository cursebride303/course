<?php
session_start();
if (!isset($_SESSION['auth'])){  //Проверка на авторизацию
    header("Location:/");
}else{
include_once("header.php");  //Подключенние шапки сайта
include_once("assets/php/db.php"); //Подключение файла конфигурации базы данных
$user_id = $_SESSION['id'];  //Получаем идентификатор пользователя из сессии
}
?>
<!-- Список решенных задач пользователя -->
<div class="container" id="tasks">
    <div class="row">
        <div class="col-xs-12">
            <div class="row col-xs-12" id="cabinet_tasks">
                <div id="completed_tasks">
                <h2 class="text-left" style="position: relative;">Решенные задачи:</h2>
                </div>
                <div id="suggest">
                <a class='btn btn-warning' href='suggest_task.php'>Предложить задачу</a>
                </div>
            </div>
            <div class="col-sm-12 test-item">
                    <?php
                    if (isset($_GET['page_num'])){  //Скрипт вывода решенных задач с данными для пагинации
                        $page_num = $_GET['page_num'];
                    }else{
                        $page_num = 1;
                    }
                    $size_page = 3;
                    $offset = ($page_num-1) * $size_page;
                    $count = $pdo->prepare("SELECT COUNT(*) FROM `completed_tasks` INNER JOIN `tasks` ON completed_tasks.task_id = tasks.id INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE user_id = '$user_id'");  //Счет решенных задач
                    $count->execute();
                    $total_rows = $count->fetch()[0];
                    $total_pages = ceil($total_rows / $size_page);
                    $query = $pdo->prepare("SELECT * FROM `completed_tasks` INNER JOIN `tasks` ON completed_tasks.task_id = tasks.id INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE user_id = '$user_id' LIMIT $offset, $size_page");  //Выборка решенных задач
                    $query->execute();
                    $row = $query->fetchAll();
                    foreach ($row as $item){  //Цикл вывода решенных задач из базы данных
                        echo '<div class="row">';
                        echo '<div class="col-sm-12" id="one_task_complete">';
                        echo '<div class="task-label">';
                        echo '<img src="assets/images/task.svg" alt="" style="float:left; width:30px; height:30px; margin-right:5px;">';
                        echo $item['title'];
                        echo '</div>';
                        echo '<div">';
                        echo 'Класс: ';
                        echo $item['class_id'];?><br>
                        <?php
                        echo 'Предмет: ';
                        echo $item['subject_title'];?><br>
                        <?php
                        echo 'Условие задачи: ';
                        echo $item['text'];?><br>
                        <?php
                        echo 'Ответ на задачу: ';
                        echo $item['answer'];
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
            </div>
        </div>
    </div> 
</div>
<?php
if ($total_rows > 0){ //Подключение пагинации при наличии записей в базе данных
    include_once("small_pagination.php");
}
?>