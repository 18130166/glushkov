<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Глушков А.В. </title>
<?require_once 'connect.php';?>

<H2>Внесите данные:</H2>
<form action='save_new.php' metod='get'> <p style='margin-left: 50px;'> <table style='font-size: 20'>
<tr><td> дата создания вклада:       <td><input name='date'      maxlength='20' type='date'></tr>
<tr><td> стартовая сумма вклада:     <td><input name='sum'       maxlength='10' type='text'></tr>
<?

$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query_1 = "SELECT * FROM f0470376_glushkov.bank_prog";
$rows_1 = mysqli_query($link, $query_1) or die ("Ошибка в запросе");
   echo("<tr><td>id программы депозита:<td><select id='prog_id' name='prog_id'>");
    echo("<option disabled>Выберите</option>");
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