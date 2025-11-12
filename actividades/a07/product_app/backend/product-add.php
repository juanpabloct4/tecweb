<?php
    include_once __DIR__ . '/myapi/Products.php';
    use MARKETZONE\MAIN\Products as Product; 
    $product = new Product('marketzone2');
    $product->add($_POST);
    echo $product->getResponse();
?>
