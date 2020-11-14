<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$zapros="DELETE FROM f0470376_glushkov.bank_prog WHERE prog_id=" . $_GET['prog_id'];
mysqli_query($link, $zapros);
header("Location: index.php");
exit;
?>