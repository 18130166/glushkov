<? require_once 'connect.php'; ?><html>
<head> <title> Сведения об банках </title> </head>
<body>
<table border="1">
<tr>
<th> Наименование </th> <th> ИНН </th> <th> Страна </th> <th> Класс надежности</th>
<th> Объем активов </th> <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, "SELECT id_bank, bank_name, INN, bank_country, bank_class, bank_assets FROM f0470376_glushkov.bank"); 
mysqli_select_db($link, "f0470376_glushkov") or die("Нет такой таблицы!");
while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['bank_name'] . "</td>";
    echo "<td>" . $row['INN'] . "</td>";
    echo "<td>" . $row['bank_country'] . "</td>";
    echo "<td>" . $row['bank_class'] . "</td>";
    echo "<td>" . $row['bank_assets'] . "</td>";
    echo "<td><a href='edit.php?id_bank=" . $row['id_bank']. "'>Редактировать</a></td>";
    echo "<td><a href='delete.php?id_bank=" . $row['id_bank']. "'>Удалить</a></td>";
    echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего: $num_rows </p>");

?>
<p> <a href="new.php"> Добавить </a>
<p><a href="http://f0470376.xsph.ru/phpglushkov/bd_user/bd_bank/index5.php"> На главную </a>
</body> </html>