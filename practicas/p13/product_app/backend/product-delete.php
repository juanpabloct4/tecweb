<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tecweb\MyApi\Delete\Delete;

$productos = new Delete('marketzone2');
$productos->delete($_POST['id']);
echo $productos->getData();
?>