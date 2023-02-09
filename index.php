<!-- Главная страница сайта -->
<?php
include_once("header.php");  //Подключение шапки сайта
include_once("assets/php/db.php"); //Подключение файла конфигурации базы данных
?>
<div class="image">
    <!-- Счетчик задач -->
<h2 id="task">Бесплатные онлайн задачи<br>Всего задач: <?php $query=$pdo->prepare("SELECT COUNT(*) FROM tasks"); $query->execute(); $count_tasks = $query->fetch()[0]; echo $count_tasks; ?></h2>
</div>
<!-- Список всех классов и задач -->
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
        <h2>1 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=1">Литература</a></li>
        <li><a href="?subject=2&level=1">Математика</a></li>
        <li><a href="?subject=3&level=1">Окружающий мир</a></li>
        <li><a href="?subject=4&level=1">Русский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>2 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=2">Литература</a></li>
        <li><a href="?subject=2&level=2">Математика</a></li>
        <li><a href="?subject=3&level=2">Окружающий мир</a></li>
        <li><a href="?subject=4&level=2">Русский язык</a></li>
        <li><a href="?subject=5&level=2">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>3 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=3">Литература</a></li>
        <li><a href="?subject=2&level=3">Математика</a></li>
        <li><a href="?subject=3&level=3">Окружающий мир</a></li>
        <li><a href="?subject=4&level=3">Русский язык</a></li>
        <li><a href="?subject=5&level=3">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>4 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=4">Литература</a></li>
        <li><a href="?subject=2&level=4">Математика</a></li>
        <li><a href="?subject=3&level=4">Окружающий мир</a></li>
        <li><a href="?subject=4&level=4">Русский язык</a></li>
        <li><a href="?subject=5&level=4">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>5 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=5">Литература</a></li>
        <li><a href="?subject=2&level=5">Математика</a></li>
        <li><a href="?subject=4&level=5">Русский язык</a></li>
        <li><a href="?subject=6&level=5">История</a></li>
        <li><a href="?subject=7&level=5">Обществознание</a></li>
        <li><a href="?subject=8&level=5">География</a></li>
        <li><a href="?subject=9&level=5">Биология</a></li>
        <li><a href="?subject=5&level=5">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>6 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=6">Литература</a></li>
        <li><a href="?subject=2&level=6">Математика</a></li>
        <li><a href="?subject=4&level=6">Русский язык</a></li>
        <li><a href="?subject=6&level=6">История</a></li>
        <li><a href="?subject=7&level=6">Обществознание</a></li>
        <li><a href="?subject=8&level=6">География</a></li>
        <li><a href="?subject=9&level=6">Биология</a></li>
        <li><a href="?subject=5&level=6">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>7 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=7">Литература</a></li>
        <li><a href="?subject=2&level=7">Математика</a></li>
        <li><a href="?subject=4&level=7">Русский язык</a></li>
        <li><a href="?subject=6&level=7">История</a></li>
        <li><a href="?subject=7&level=7">Обществознание</a></li>
        <li><a href="?subject=8&level=7">География</a></li>
        <li><a href="?subject=9&level=7">Биология</a></li>
        <li><a href="?subject=10&level=7">Физика</a></li>
        <li><a href="?subject=5&level=7">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>8 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=8">Литература</a></li>
        <li><a href="?subject=2&level=8">Математика</a></li>
        <li><a href="?subject=4&level=8">Русский язык</a></li>
        <li><a href="?subject=6&level=8">История</a></li>
        <li><a href="?subject=7&level=8">Обществознание</a></li>
        <li><a href="?subject=8&level=8">География</a></li>
        <li><a href="?subject=9&level=8">Биология</a></li>
        <li><a href="?subject=10&level=8">Физика</a></li>
        <li><a href="?subject=11&level=8">Информатика</a></li>
        <li><a href="?subject=12&level=8">Химия</a></li>
        <li><a href="?subject=5&level=8">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>9 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=9">Литература</a></li>
        <li><a href="?subject=2&level=9">Математика</a></li>
        <li><a href="?subject=4&level=9">Русский язык</a></li>
        <li><a href="?subject=6&level=9">История</a></li>
        <li><a href="?subject=7&level=9">Обществознание</a></li>
        <li><a href="?subject=8&level=9">География</a></li>
        <li><a href="?subject=9&level=9">Биология</a></li>
        <li><a href="?subject=10&level=9">Физика</a></li>
        <li><a href="?subject=11&level=9">Информатика</a></li>
        <li><a href="?subject=12&level=9">Химия</a></li>
        <li><a href="?subject=5&level=9">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>10 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=10">Литература</a></li>
        <li><a href="?subject=2&level=10">Математика</a></li>
        <li><a href="?subject=4&level=10">Русский язык</a></li>
        <li><a href="?subject=6&level=10">История</a></li>
        <li><a href="?subject=7&level=10">Обществознание</a></li>
        <li><a href="?subject=8&level=10">География</a></li>
        <li><a href="?subject=9&level=10">Биология</a></li>
        <li><a href="?subject=10&level=10">Физика</a></li>
        <li><a href="?subject=11&level=10">Информатика</a></li>
        <li><a href="?subject=12&level=10">Химия</a></li>
        <li><a href="?subject=5&level=10">Английский язык</a></li>
        </ul>
        </div>
        <div class="col-md-3 col-sm-6">
        <h2>11 класс</h2>
        <hr class="hidden-xs">
        <ul class="list-unstyled">
        <li><a href="?subject=1&level=11">Литература</a></li>
        <li><a href="?subject=2&level=11">Математика</a></li>
        <li><a href="?subject=4&level=11">Русский язык</a></li>
        <li><a href="?subject=6&level=11">История</a></li>
        <li><a href="?subject=7&level=11">Обществознание</a></li>
        <li><a href="?subject=8&level=11">География</a></li>
        <li><a href="?subject=9&level=11">Биология</a></li>
        <li><a href="?subject=10&level=11">Физика</a></li>
        <li><a href="?subject=11&level=11">Информатика</a></li>
        <li><a href="?subject=12&level=11">Химия</a></li>
        <li><a href="?subject=5&level=11">Английский язык</a></li>
        </ul>
        </div>
    </div>
</div>
<!-- Список всех задач -->
<div class="container" id="tasks">
    <div class="row">
        <div class="col-xs-12">
            <div class="row col-xs-12">
                <h2 class="text-left" style="position: relative;">Список задач</h2>
            </div>
            <div>
            <div style="width:50%;">
                <h3>Выберите сложность задач:</h3>
            </div>
            <div style="width:50%;">
                <a class="btn btn-warning" href="<?php if (isset($_GET['subject']) && isset($_GET['level'])){echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&difficulty=1";}elseif(isset($_GET['subject'])){echo "?subject=".$_GET['subject']."&difficulty=1";}elseif(isset($_GET['level'])){echo "?level=".$_GET['level']."&difficulty=1";}else{echo "?difficulty=1";} ?>">Простая</a>
                <a class="btn btn-warning" href="<?php if (isset($_GET['subject']) && isset($_GET['level'])){echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&difficulty=2";}elseif(isset($_GET['subject'])){echo "?subject=".$_GET['subject']."&difficulty=2";}elseif(isset($_GET['level'])){echo "?level=".$_GET['level']."&difficulty=2";}else{echo "?difficulty=2";} ?>">Средняя</a>
                <a class="btn btn-warning" href="<?php if (isset($_GET['subject']) && isset($_GET['level'])){echo "?subject=".$_GET['subject']."&level=".$_GET['level']."&difficulty=3";}elseif(isset($_GET['subject'])){echo "?subject=".$_GET['subject']."&difficulty=3";}elseif(isset($_GET['level'])){echo "?level=".$_GET['level']."&difficulty=3";}else{echo "?difficulty=3";} ?>">Сложная</a>
                <a class="btn btn-warning" href="/">Все</a>
                </div>
            </div>
                <div class="row">
                    <?php  //Скрипт вывода задач с данными для пагинации
                    if (isset($_GET['page_num'])){
                        $page_num = $_GET['page_num'];
                    }else{
                        $page_num = 1;
                    }
                    $size_page = 5;
                    $offset = ($page_num-1) * $size_page;
                    if (!empty($_GET['subject']) && !empty($_GET['level'])){  //Счет задач если выбраны класс и предмет
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE subject_id =".$_GET['subject']." AND class_id = ".$_GET['level']."");
                        $count->execute();
                    }elseif (!empty($_GET['subject'])){ //Счет задач если выбран предмет
                    $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE subject_id =".$_GET['subject']."");
                    $count->execute();
                    }elseif (!empty($_GET['level'])){  //Счет задач если выбран класс 
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE class_id = ".$_GET['level']."");
                        $count->execute();
                    }elseif(!empty($_GET['subject']) && !empty($_GET['level']) && !empty($_GET['difficulty'])){
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE subject_id = ".$_GET['subject']." AND class_id = ".$_GET['level']." AND difficult_id = ".$_GET['difficult']."");
                        $count->execute();
                    }elseif(!empty($_GET['subject']) && !empty($_GET['difficulty'])){
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE subject_id = ".$_GET['subject']." AND difficult_id = ".$_GET['difficulty']."");
                        $count->execute();
                    }elseif(!empty($_GET['level']) && !empty($_GET['difficulty'])){
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE class_id = ".$_GET['level']." AND difficult_id = ".$_GET['difficulty']."");
                        $count->execute();
                    }elseif(!empty($_GET['difficulty'])){
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks` WHERE difficult_id = ".$_GET['difficulty']."");
                        $count->execute();
                    }else{
                        $count = $pdo->prepare("SELECT COUNT(*) FROM `tasks`");
                        $count->execute();
                    }
                    $total_rows = $count->fetch()[0];
                    $total_pages = ceil($total_rows / $size_page);
                    if (!empty($_GET['subject']) && !empty($_GET['level'])){ //Выборка всех задач если выбраны класс и предмет
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE subject_id = ".$_GET['subject']." AND class_id = ".$_GET['level']." LIMIT $offset, $size_page");
                        $query->execute();
                    }elseif (!empty($_GET['subject'])){  //Выборка всех задач если выбран предмет
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE subject_id = ".$_GET['subject']." LIMIT $offset, $size_page");
                        $query->execute();
                    }elseif (!empty($_GET['level'])){ //Выборка всех задач если выбран класс
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE class_id = ".$_GET['level']." LIMIT $offset, $size_page");
                        $query->execute();
                    }elseif(!empty($_GET['subject']) && !empty($_GET['level']) && !empty($_GET['difficulty'])){
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE subject_id = ".$_GET['subject']." AND class_id = ".$_GET['level']." AND difficult_id = ".$_GET['difficult']." LIMIT $offset, $size_page");
                        $query->execute();
                    }elseif(!empty($_GET['subject']) && !empty($_GET['difficulty'])){
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE subject_id = ".$_GET['subject']." AND difficult_id = ".$_GET['difficult']." LIMIT $offset, $size_page");
                        $query->execute();
                    }elseif(!empty($_GET['level']) && !empty($_GET['difficulty'])){
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE class_id = ".$_GET['level']." AND difficult_id = ".$_GET['difficulty']." LIMIT $offset, $size_page");
                        $query->execute();
                    }elseif(!empty($_GET['difficulty'])){
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject WHERE difficult_id = ".$_GET['difficulty']." LIMIT $offset, $size_page");
                        $query->execute();
                    }else{
                        $query=$pdo->prepare("SELECT * FROM tasks INNER JOIN subjects ON tasks.subject_id = subjects.id_of_subject LIMIT $offset, $size_page");
                        $query->execute();
                    }
                    $row = $query->fetchAll();
                    foreach ($row as $item){  //Цикл вывода задач из базы данных
                       echo '<div class="col-sm-12 test-item">';
                       echo '<div class="row">';
                        echo '<div class="col-sm-12" id="one_task">';
                        echo '<div class="task-label">';
                        echo '<img src="assets/images/task.svg" alt="" style="float:left; width:30px; height:30px; margin-right:5px;">';
                        echo "<a href='task.php?id=".$item["id"]."' class='title_task'>";
                        echo $item["title"];
                        echo "</a>";
                        echo '</div>';
                        echo '<div" class="task_info">';
                        echo '<div class="info">';
                        echo 'Класс: ';
                        echo $item['class_id'];?><br>
                        <?php
                        echo 'Предмет: ';
                        echo $item['subject_title'];?><br>
                        <?php
                        echo '</div>';
                        echo '<div class="start_link">';
                        echo "<a class='btn btn-warning start-task' href='task.php?id=".$item["id"]."'>Пройти";
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
    <?php  
     if ($row > 0){  //Подключение пагинации при наличии записей в базе данных
         include_once("pagination.php");
     }
     ?>
<footer>
    <!-- Уведомление об использовании куки -->
<div id="cookie_notification">
        <p>Для улучшения работы сайта и его взаимодействия с пользователями мы используем файлы cookie. Продолжая работу с сайтом, Вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</p>
        <button class="btn btn-warning cookie_accept">Принять</button>
</div>
</footer>
<script src="assets/javascript/main.js"></script>