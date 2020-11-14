
<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query = "SELECT * FROM bank_prog WHERE prog_id=".$_GET['prog_id'];
$rows = mysqli_query($link, $query) or die ("Ошибка в запросе");
while ($st = mysqli_fetch_array($rows)) {
$id = $_GET['prog_id'];
$name = $st['prog_name'];
$per = $st['prog_per'];
$id_bank = $st['id_bank'];
}
print "<H2>Изменить:</H2>";
print "<form action='save_edit.php' metod='GET'><p style='margin-left: 50px;'><table style='font-size: 20'>";

print "<tr><td>Название:    <td><input name='name'      maxlength='20' type='text' value='".$name."'></tr>";
print "<tr><td>% годовых:   <td><input name='per'       maxlength='10' type='text' value='".$per."'></tr>";

$query_1 = "SELECT * FROM f0470376_glushkov.bank";
$rows_1 = mysqli_query($link, $query_1) or die ("Ошибка в запросе");
   echo("<tr><td>id банка:<td><select id='prog_id' name='prog_id' >");
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