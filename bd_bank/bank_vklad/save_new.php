<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу");
if($_GET['name']&&$_GET['per']&&$_GET['id_bank']){
    $name     = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $per      = htmlentities(mysqli_real_escape_string($link, $_GET['per']));
    $id_bank  = htmlentities(mysqli_real_escape_string($link, $_GET['id_bank']));

    mysqli_select_db($link, "f0470376_glushkov") or die("Данной таблицы не существует.");
    $sql_add = "INSERT INTO f0470376_glushkov.bank_prog
    (prog_id, prog_name, prog_per, id_bank)
    VALUES
    (NULL, '$name', '$per', '$id_bank')";
    mysqli_query($link, $sql_add) or die("Невозможно выполнить запрос!");
    
    if(mysqli_affected_rows($link)>0){
        print "<p>Спасибо.";
        print "<p><a href=\"index.php\"> Назад</a>";}
    else{ print "Ошибка сохранения, <a href=\"index.php\"> Назад</а>";}
}
else{ echo("Введены некорректные данные");}
mysqli_close($link);
?>