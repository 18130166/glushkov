<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
if(isset($_GET['id'])&&isset($_GET['name'])&&isset($_GET['inn'])&&isset($_GET['country'])&&isset($_GET['class'])&&isset($_GET['assets'])){
    $name    = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $inn     = htmlentities(mysqli_real_escape_string($link, $_GET['inn']));
    $country = htmlentities(mysqli_real_escape_string($link, $_GET['country']));
    $class   = htmlentities(mysqli_real_escape_string($link, $_GET['class']));
    $assets  = htmlentities(mysqli_real_escape_string($link, $_GET['assets']));
    $id      = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $zapros="UPDATE
    f0470376_glushkov.bank
    SET bank_name='$name',
    INN='$inn',
    bank_country='$country',
    bank_class='$class',
    bank_assets='$assets'
    WHERE id_bank='$id'";
    mysqli_query($link, $zapros) or die("Запрос");
    if(mysqli_affected_rows($link)>0) {
        echo 'Все сохранено. <a href="index.php"> Назад </a>';
    } 
    else {echo 'Ошибка сохранения. <a href="index.php"> Назад</a> ';}
} 
else {echo("Введены некорректные данные");}
?>
</html>