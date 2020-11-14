<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Глушков А.В. </title>
<?require_once 'connect.php';?>

<H2>Внесите данные:</H2>
<form action='save_new.php' metod='get'> <p style='margin-left: 50px;'> <table style='font-size: 20'>
<tr><td>Название:       <td><input name='name'      maxlength='20' type='text'></tr>
<tr><td>% годовых:      <td><input name='per'       maxlength='10' type='text'></tr>
<?

$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query_1 = "SELECT * FROM f0470376_glushkov.bank";
$rows_1 = mysqli_query($link, $query_1) or die ("Ошибка в запросе");
   echo("<tr><td>id банка:<td><select id='id_bank' name='id_bank'>");
    echo("<option disabled>Выберите имя</option>");
     while($row = mysqli_fetch_array($rows_1)){
        echo("<option value='$row[0]'> $row[0] - $row[1]</option>");
     }
     echo "</tr>";?>
   </select></p>
</table></p>
<input name='add' type='submit' value='Добавить'>
<input name='b2' type='reset' value='Очистить'>
</form>
    
<p><a href="index.php"> ⬅Вернуться к списку </a>

<style>
    input [type='text']{
    width: 300px;
    height: 30px;
    font-size: 16
   }
   select{
    width: 170px;
    height: 30px;
    font-size: 16
   }
</style>