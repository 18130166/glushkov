<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу");
if($_GET['name']&&$_GET['inn']&&$_GET['country']&&$_GET['class']&&$_GET['assets']){
    $name     = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $inn      = htmlentities(mysqli_real_escape_string($link, $_GET['inn']));
    $country  = htmlentities(mysqli_real_escape_string($link, $_GET['country']));
    $class    = htmlentities(mysqli_real_escape_string($link, $_GET['class']));
    $assets   = htmlentities(mysqli_real_escape_string($link, $_GET['assets']));
    mysqli_select_db($link, "f0470376_glushkov") or die("Данной таблицы не существует.");
    $sql_add = "INSERT INTO f0470376_glushkov.bank
    (id_bank, bank_name, INN, bank_country, bank_class, bank_assets)
    VALUES
    (NULL, '$name', '$inn', '$country', '$class', '$assets')";
    mysqli_query($link, $sql_add) or die("Невозможно выполнить запрос!");
    
    if(mysqli_affected_rows($link)>0){
        print "<p>Спасибо.";
        print "<p><a href=\"index.php\"> Назад</a>";}
    else{ print "Ошибка сохранения, <a href=\"index.php\"> Назад</а>";}
}
else{ echo("Введены некорректные данные");}
mysqli_close($link);
?>