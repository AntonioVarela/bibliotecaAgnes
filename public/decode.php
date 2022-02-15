<?php

namespace Zxing;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: index.php');
    die();
}
require __DIR__.'/../vendor/autoload.php';
$qrcode = new QrReader($_FILES['qrimage']['tmp_name']);
$text = $qrcode->text();
header("Location: /buscaqr/$text");
?>