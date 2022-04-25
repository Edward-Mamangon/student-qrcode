<?php
// require 'dbconnection/db_connect.php';

session_start();

session_unset();
session_destroy();

header("Location: ../index.php");

$_SESSION["status"] = "invalid";
unset($_SESSION["role"]);
unset($_SESSION["user_name"]);
unset($_SESSION["id"]);
unset($_SESSION["subject"]);
unset($_SESSION["subject_teacher_id"]);
unset($_SESSION["grade"]);
unset($_SESSION["section"]);
// header('location: index.php');
//Close db connection
mysqli_close($conn);

?>