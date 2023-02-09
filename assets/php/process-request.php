<?php
include_once("db.php");
if(isset($_POST['id'])){
$classArr = $pdo->prepare("SELECT * FROM classes");
$classArr->execute();
$row = $classArr->fetchAll();
if ($row > 0){
    echo "<select>";
    echo '<option value="" selected disabled>Выберите класс</option>'; 
    foreach($row as $value){    
        echo '<option value="'.$value['id_of_class'].'">'.$value['id_of_class'].'</option>'; 
    }
    echo "</select>";
}
}