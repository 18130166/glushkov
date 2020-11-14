<? require_once 'connect.php'; ?><html>
<head> <title> Сведения об банках </title> </head>
<body>
<table border="1">
<tr>
<th> Ид </th> <th> Дата создания вклада </th> <th> id программы депозита </th> <th> стартовая
сумма вклада </th> 
<th> Изменить </th> <th> Удалить </th> </tr>
<?php
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, "SELECT *, DATE_FORMAT(vklad_date, '%d.%m.%Y') as date_rus FROM f0470376_glushkov.bank_vklad"); 
mysqli_select_db($link, "f0470376_glushkov") or die("Нет такой таблицы!");
while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['vklad_id']   . "</td>";
    echo "<td>" . $row['date_rus'] . "</td>";
    echo "<td>" . $row['prog_id']  . "</td>";
    echo "<td>" . $row['vklad_sum']   . "</td>";
    echo "<td><a href='edit.php?vklad_id="   . $row['vklad_id']. "'>Изменить</a></td>";
    echo "<td><a href='delete.php?vklad_id=" . $row['vklad_id']. "'>Удалить</a></td>";
    echo "</tr>";
} 

print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего: $num_rows </p>");

?>
<p> <a href="new.php"> Добавить </a>
<p><a href="http://f0470376.xsph.ru/phpglushkov/bd_user/bd_bank/index5.php"> На главную </a>
</body> </html>