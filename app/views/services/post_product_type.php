<?php

    require_once "../autoload_class.php";

    
    $product_type_id       = 'KANJIID-'.rand(100,1000);
    $product_type_name     = isset($_POST['product_type_name'])     ? htmlspecialchars(trim($_POST['product_type_name'])) : '';
    $product_type_status   = isset($_POST['product_type_status'])   ? htmlspecialchars(trim($_POST['product_type_status'])) : '';
    $product_type_detail   = isset($_POST['product_type_detail'])    ? htmlspecialchars(trim($_POST['product_type_detail'])) : '';
   
    
    $db     = new Connection(true);
    $productType  = new ProductType(Connection::$pdo);
     
    
    $productType->setProductTypeID($product_type_id);
    $productType->setProductTypeName($product_type_name);
    $productType->setProductTypeStatus($product_type_status);
    $productType->setProductTypeDetail($product_type_detail);
    $productType->save();
?>