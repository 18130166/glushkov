
<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query = "SELECT * FROM bank_vklad WHERE vklad_id=".$_GET['vklad_id'];
$rows = mysqli_query($link, $query) or die ("Ошибка в запросе");
while ($st = mysqli_fetch_array($rows)) {
$id = $_GET['vklad_id'];
$date = $st['vklad_date'];
$sum = $st['vklad_sum'];
$id_bank = $st['id_bank'];
}
print "<H2>Изменить:</H2>";
print "<form action='save_edit.php' metod='GET'><p style='margin-left: 50px;'><table style='font-size: 20'>";

print "<tr><td> Дата создания вклада:    <td><input name='date'      maxlength='20' type='date' value='".$date."'></tr>";
print "<tr><td> Стартовая сумма вклада:   <td><input name='sum'       maxlength='10' type='text' value='".$sum."'></tr>";

$query_1 = "SELECT * FROM f0470376_glushkov.bank_prog";
$rows_1 = mysqli_query($link, $query_1) or die ("Ошибка в запросе");
   echo("<tr><td>id программы депозита:<td><select id='prog_id' name='prog_id' >");
    echo("<option disabled>Выберите</option>");
     while($row = mysqli_fetch_array($rows_1)){
        echo("<option value='$row[0]'> $row[0] - $row[1]</option>");
     }
     echo "</tr>";
print " </select></p>";
print "</tr></table></p>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Назад </a>";

mysqli_close($link);
?>
<style>
    input[type='text'] {
    
    width: 300px;
    height: 30px;
    font-size: 16
   } 
</style>
</html>