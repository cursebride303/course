<!-- Страница управления пользователями -->
<?php 
session_start();
if (!isset($_SESSION['login']) || empty($_SESSION['login']) || $_SESSION['login'] !== 'admin') { //Проверка на администратора
    header("Location:/");
}else{
include_once("header.php"); //Подключение шапки сайта
include_once("assets/php/db.php"); //Подключение файла конфигурации базы данных
}
?>
<!-- Список зарегистрированных пользователей -->
<div class="container" id="tasks">
    <div class="row">
        <div class="col-xs-12">
            <div class="row col-xs-12">
            <div id="suggested_tasks">
                <h2 class="text-left" style="position: relative;">Список пользователей</h2>
                </div>
                <div id="tasks_control">
                <a class='btn btn-warning' href='admin.php'>Управление предложенными задачами</a>
                </div>
            </div>
                <div class="row">
                    <?php  // Вывод списка пользователей с данными для пагинации
                    if (isset($_GET['page_num'])){             
                        $page_num = $_GET['page_num'];
                    }else{
                        $page_num = 1;
                    }
                    $size_page = 3;
                    $offset = ($page_num-1) * $size_page;
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `users` WHERE login != 'admin'"); 
                        $count->execute();
                    $total_rows = $count->fetch()[0];
                    $total_pages = ceil($total_rows / $size_page);
                    $query = $pdo->prepare("SELECT * FROM `users` LEFT JOIN unban_requests on users.id = unban_requests.user_id WHERE login != 'admin' LIMIT $offset, $size_page");
                    $query->execute();
                    $row = $query->fetchAll();
                    foreach ($row as $item){  //Цикл вывода пользователей из базы данных
                       echo '<div class="col-sm-12 test-item">';
                       echo '<div class="row">';
                        echo '<div class="col-sm-12" id="one_user">';
                        echo '<div" class="task_info">';
                        echo '<div class="admin-task-info">';
                        echo 'Логин пользователя: ';
                        echo $item['login'];?><br>
                        <?php
                        echo 'Почта пользователя: ';
                        echo $item['email'];?><br>
                        <?php
                        echo '</div>';
                        echo '<div class="control-users-link">';
                        if ($item['status'] == 1){
                        echo "<a class='btn btn-warning start-task' href='assets/php/block_user.php?id=".$item["id"]."'>Заблокировать пользователя";
                        }else{
                            echo "<a class='btn btn-warning start-task' href='assets/php/unblock_user.php?id=".$item["id"]."'>Разблокировать пользователя";
                        }
                        if ($item['request_text'] !== NULL){
                            echo "<a class='btn btn-warning user-unban' href='admin_user.php?id=".$item["id"]."'>Запрос на разблокировку";
                        }
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
?>