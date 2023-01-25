<?php

$servername = 'az483140.mysql.tools';
$database = 'az483140_db';
$login = 'az483140_db';
$password = 'Pjb93xEw';

$conn = mysqli_connect($servername, $login, $password, $database);

if(!$conn) {
    die('Ошибка: ' . mysqli_connect_error());
}
