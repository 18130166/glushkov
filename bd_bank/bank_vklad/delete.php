<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$zapros="DELETE FROM f0470376_glushkov.bank_vklad WHERE vklad_id=" . $_GET['vklad_id'];
mysqli_query($link, $zapros);
header("Location: index.php");
exit;
?>