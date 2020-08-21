<?php
// Данные для подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "multiprogrammer";
// Подключение к базе данных multiprogrammer
$connect = mysqli_connect($server, $username, $password, $dbname);
mysqli_set_charset($connect, 'utf8');
?>