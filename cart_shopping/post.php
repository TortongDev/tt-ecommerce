<?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    $product_id     = isset($_GET['product_id'])      ? $_GET['product_id'] : '';
    $product_name   = isset($_GET['product_name'])    ? $_GET['product_name'] : '';
    $product_type   = isset($_GET['product_type'])    ? $_GET['product_type'] : '';
    $product_price  = isset($_GET['product_price'])   ? $_GET['product_price'] : '';
    $product_amount = isset($_GET['product_amount'])  ? $_GET['product_amount'] : '';
    
    // Check if the product is already in the cart; if yes, update the quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']  += intval($product_amount);
        $_SESSION['cart'][$product_id]['price']     += intval($product_price);
    } else {
    // If not, add the product to the cart
        $_SESSION['cart'][$product_id] = array(
            'name' => $product_name,
            'product_id'=>$product_id,
            'price' =>  intval($product_price),
            'quantity' =>  intval($product_amount)
        );
    }
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";

?>