<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу");
if($_GET['date']&&$_GET['sum']&&$_GET['prog_id']){
    $date     = htmlentities(mysqli_real_escape_string($link, $_GET['date']));
    $sum      = htmlentities(mysqli_real_escape_string($link, $_GET['sum']));
    $prog_id  = htmlentities(mysqli_real_escape_string($link, $_GET['prog_id']));

    mysqli_select_db($link, "f0470376_glushkov") or die("Данной таблицы не существует.");
    $sql_add = "INSERT INTO f0470376_glushkov.bank_vklad
    (vklad_id, vklad_date, prog_id, vklad_sum)
    VALUES
    (NULL, '$date', '$prog_id', '$sum')";
    mysqli_query($link, $sql_add) or die("Невозможно выполнить запрос!");
    
    if(mysqli_affected_rows($link)>0){
        print "<p>Спасибо.";
        print "<p><a href=\"index.php\"> Назад</a>";}
    else{ print "Ошибка сохранения, <a href=\"index.php\"> Назад</а>";}
}
else{ echo("Введены некорректные данные");}
mysqli_close($link);
?>