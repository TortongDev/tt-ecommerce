<?php

session_start();


if(!isset($_SESSION['cart'])):
    $_SESSION['cart'] = array();
endif;

$product_id     = isset($_GET['product_id'])    ? $_GET['product_id'] : '';
$product_name   = isset($_GET['product_name'])  ? $_GET['product_name'] : '';
$product_price  = isset($_GET['product_price']) ? $_GET['product_price'] : '';


if(!empty($_SESSION['cart'][$product_id])):
    $_SESSION['cart'][$product_id]['product_price'] += $product_price;
else:
    $_SESSION['cart'][$product_id] = array(
        'product_id' => $product_id,
        'product' => $product_name,
        'product_price' => $product_price
    );
endif;
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";


?>