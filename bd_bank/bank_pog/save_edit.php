<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
if(isset($_GET['id'])&&isset($_GET['name'])&&isset($_GET['per'])&&isset($_GET['id_bank'])){
    $name    = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $per     = htmlentities(mysqli_real_escape_string($link, $_GET['per']));
    $id_bank = htmlentities(mysqli_real_escape_string($link, $_GET['id_bank']));
    $id      = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $zapros="UPDATE
    f0470376_glushkov.bank_prog
    SET prog_name='$name',
    prog_per='$per',
    id_bank='$id_bank'
    WHERE prog_id='$id'";
    mysqli_query($link, $zapros) or die("Запрос");
    if(mysqli_affected_rows($link)>0) {
        echo 'Все сохранено. <a href="index.php"> Назад </a>';
    } 
    else {echo 'Ошибка сохранения. <a href="index.php"> Назад</a> ';}
} 
else {echo("Введены некорректные данные");}
?>
</html>