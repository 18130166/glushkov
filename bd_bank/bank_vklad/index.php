<? require_once 'connect.php'; ?><html>
<head> <title> Сведения об банках </title> </head>
<body>
<table border="1">
<tr>
<th> Ид </th> <th> Навание </th> <th> % годовых </th> <th> id банка </th> 
<th> Изменить </th> <th> Удалить </th> </tr>
<?php
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, "SELECT * FROM f0470376_glushkov.bank_prog"); 
mysqli_select_db($link, "f0470376_glushkov") or die("Нет такой таблицы!");
while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['prog_id']   . "</td>";
    echo "<td>" . $row['prog_name'] . "</td>";
    echo "<td>" . $row['prog_per']  . "</td>";
    echo "<td>" . $row['id_bank']   . "</td>";
    echo "<td><a href='edit.php?prog_id="   . $row['prog_id']. "'>Изменить</a></td>";
    echo "<td><a href='delete.php?prog_id=" . $row['prog_id']. "'>Удалить</a></td>";
    echo "</tr>";
} 

print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего: $num_rows </p>");

?>
<p> <a href="new.php"> Добавить </a>
<p><a href="http://f0470376.xsph.ru/phpglushkov/bd_user/bd_bank/index5.php"> На главную </a>
</body> </html>