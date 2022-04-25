<?php
session_start();

$name = "localhost";
$user = "root";
$password = "";
$db_name = "student-qrcode_db";


$conn = mysqli_connect($name, $user, $password, $db_name);

if(!$conn) {
   die ("Access Denied!!!");
}

?>