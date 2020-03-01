<?php

$host='dd';
$dbName='dd';
$username='root';
$password='';

$connect = mysqli_connect($host, $username, $password) or die(mysqli_error());
mysqli_select_db($connect,$dbName) or die(mysqli_error());
?>