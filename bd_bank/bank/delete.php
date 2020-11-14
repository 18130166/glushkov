<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$zapros="DELETE FROM f0470376_glushkov.bank WHERE id_bank=" . $_GET['id_bank'];
mysqli_query($link, $zapros);
header("Location: index.php");
exit;
?>