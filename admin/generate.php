<?php

header("Content-Type: image/png");
require "vendor/autoload.php";
use Endroid\QrCode\QrCode;

// if(isset($_POST['submitqr'])){
// $name = $_POST['idnumber'];
$qrcode = new QrCode($_GET['idnumber']);
// $qrcode->setText($name);
echo $qrcode->writeString();
die();
// }
?>