<!-- Страница панели администратора -->
<?php 
session_start();
if (!isset($_SESSION['login']) || empty($_SESSION['login']) || $_SESSION['login'] !== 'admin') { //Проверка на администратора
    header("Location:/");
}else{
include_once("header.php");  //Подключенние шапки сайта
include_once("assets/php/db.php");  //Подключение файла конфигурации базы данных
}
?>
<!-- Список предложенных задач -->
<div class="container" id="tasks">
    <div class="row">
        <div class="col-xs-12">
            <div class="row col-xs-12" id="admin-tasks">
            <div id="suggested_tasks">
                <h2 class="text-left" style="position: relative;">Список предложенных задач</h2>
                </div>
                <div id="tasks_control">
                <a class='btn btn-warning' href='tasks_control.php'>Управление задачами</a>
                <a class='btn btn-warning' href='users_control.php'>Управление пользователями</a>
                </div>
            </div>
                <div class="row">
                    <?php  //Скрипт вывода предложенных задач с данными для пагинации
                    if (isset($_GET['page_num'])){
                        $page_num = $_GET['page_num'];
                    }else{
                        $page_num = 1;
                    }
                    $size_page = 3;
                    $offset = ($page_num-1) * $size_page;
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `requests`");  //Счет предложенных задач 
                        $count->execute();
                    $total_rows = $count->fetch()[0];
                    $total_pages = ceil($total_rows / $size_page);
                    $query = $pdo->prepare("SELECT * FROM `requests` INNER JOIN subjects ON requests.subject_id = subjects.id_of_subject INNER JOIN users ON requests.user_id = users.id LIMIT $offset, $size_page");  //Выборка предложенных задач
                    $query->execute();
                    $row = $query->fetchAll();
                    foreach ($row as $item){  //Цикл вывода предложенных задач из базы данных
                       echo '<div class="col-sm-12 test-item">';
                       echo '<div class="row">';
                        echo '<div class="col-sm-12" id="one_task">';
                        echo '<div class="task-label">';
                        echo '<img src="assets/images/task.svg" alt="" style="float:left; width:30px; height:30px; margin-right:5px;">';
                        echo "<div class='title_task'>";
                        echo "<a href='show_suggest_task.php?id=".$item["request_id"]."' class='title_task'>";
                        echo $item["title"];
                        echo "</a>";
                        echo "</div>";
                        echo '</div>';
                        echo '<div" class="task_info">';
                        echo '<div class="admin-task-info">';
                        echo 'Класс: ';
                        echo $item['class_id'];?><br>
                        <?php
                        echo 'Предмет: ';
                        echo $item['subject_title'];?><br>
                        <?php
                        echo 'Условие задачи: ';
                        if (preg_match('(.png|.jpg|.jpeg)', $item['text']) === 1){
                            echo 'смотрите в задаче';
                         }else{
                         echo $item['text'];
                         }?><br>
                        <?php
                        echo 'Ответ: ';
                        echo $item['answer'];?><br>
                         <?php
                        echo 'Пользователь, предложивший задачу: ';
                        echo $item['login'];?><br>
                        <?php
                        echo '</div>';
                        echo '<div class="admin-task-link">';
                        echo "<a class='btn btn-warning start-task' href='assets/php/allow_task.php?id=".$item["request_id"]."'>Принять";
                        echo '</a>';
                        echo "<a class='btn btn-warning start-task' href='assets/php/deny_task.php?id=".$item["request_id"]."'>Отклонить";
                        echo '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
        </div>
    </div> 
    </div>
<?php  //Подключение пагинации при наличии записей в базе данных
 if ($total_rows > 0){
    include_once("small_pagination.php");
}