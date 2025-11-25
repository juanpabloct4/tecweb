<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tecweb\MyApi\Read\Read;

$productos = new Read('marketzone2');
$productos->search($_GET['search']);
echo $productos->getData();
?>