<?php
    use MARKETZONE\MAIN\Products as Product; 
    include_once __DIR__ . '/myapi/Products.php';
    $product = new Product('marketzone2');
    $product->search($_GET['search']);
    echo $product->getResponse();
?>