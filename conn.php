<?php

$localhost = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'iteac';

$conn = mysqli_connect($localhost, $username, $pass, $dbname);

if (!$conn) {
    die('error occurred to connect' . mysqli_connect_errno());
}


?>