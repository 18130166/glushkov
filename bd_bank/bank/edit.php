
<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query = "SELECT bank_name, INN, bank_country, 	bank_class, bank_assets FROM bank WHERE id_bank=".$_GET['id_bank'];
$rows = mysqli_query($link, $query) or die ("Ошибка в запросе");
while ($st = mysqli_fetch_array($rows)) {
$id = $_GET['id_bank'];
$name = $st['bank_name'];
$inn = $st['INN'];
$country = $st['bank_country'];
$class = $st['bank_class'];
$assets = $st['bank_assets'];
}
print "<H2>Изменить:</H2>";
print "<form action='save_edit.php' metod='get'><p style='margin-left: 50px;'><table style='font-size: 20'>";
print "<tr><td>Наименование:        <td><input name='name'      maxlength='20' type='text' value='".$name."'></tr>";
print "<tr><td>ИНН:                 <td><input name='inn'       maxlength='10' type='text' value='".$inn."'></tr>";
print "<tr><td>страна:              <td><input name='country'   maxlength='30' type='text' value='".$country."'></tr>";
print "<tr><td>Класс надежности:    <td><input name='class'     maxlength='20' type='text' value='".$class."'></tr>";
print "<tr><td>Объем активов:       <td><input name='assets'    maxlength='20' type='text' value='".$assets."'></tr>";

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