<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
if(isset($_GET['id'])&&isset($_GET['date'])&&isset($_GET['sum'])&&isset($_GET['prog_id'])){
    $date    = htmlentities(mysqli_real_escape_string($link, $_GET['date']));
    $sum     = htmlentities(mysqli_real_escape_string($link, $_GET['sum']));
    $prog_id = htmlentities(mysqli_real_escape_string($link, $_GET['prog_id']));
    $id      = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $zapros="UPDATE
    f0470376_glushkov.bank_vklad
    SET vklad_date='$date',
    vklad_sum='$sum',
    prog_id='$prog_id'
    WHERE vklad_id='$id'";
    mysqli_query($link, $zapros) or die("Запрос");
    if(mysqli_affected_rows($link)>0) {
        echo 'Все сохранено. <a href="index.php"> Назад </a>';
    } 
    else {echo 'Ошибка сохранения. <a href="index.php"> Назад</a> ';}
} 
else {echo("Введены некорректные данные");}
?>
</html>