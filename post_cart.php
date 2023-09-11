<?php
session_start();
if(isset($_GET['clear'])=='1'):
    unset($_SESSION['CART']);
    header("Location: shopping_online.php");
    exit;
endif;
    $product_id     = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $product_name   = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $product_type   = isset($_POST['product_type']) ? $_POST['product_type'] : '';
    $product_price  = isset($_POST['product_price']) ? $_POST['product_price'] : '';
    $user_id        = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $product_amount = isset($_POST['product_amount']) ? $_POST['product_amount'] : '';
    $product_member_id = isset($_POST['product_member_id']) ? htmlspecialchars(trim($_POST['product_member_id'])) : '';


    if(empty($_SESSION['CART'])){
        $_SESSION['CART'] = array();
    }
    $total = $product_amount * $product_price;
    if(!empty($_SESSION['CART'][$product_member_id])){
        if($product_amount == 1){
            $_SESSION['CART'][$product_member_id]['product_amount']        += $product_amount;
            $_SESSION['CART'][$product_member_id]['product_total_price']   += $product_price;
            $_SESSION['CART'][$product_member_id]['product_price']         = $product_price;       
    
        }else{
            $_SESSION['CART'][$product_member_id]['product_amount']        += $product_amount;
            $_SESSION['CART'][$product_member_id]['product_total_price']   += $total;       
            $_SESSION['CART'][$product_member_id]['product_price']         = $product_price;       
    }
    
    }else{
        if($product_amount != 1){
            $_SESSION['CART'][$product_member_id] = array(
                "product_member_id"     => $product_member_id,
                "product_id"            => $product_id,
                "product_name"          => $product_name,
                "product_amount"        => $product_amount,
                "product_total_price"   => $total,
                "product_price"         => $product_price,
                "user_id"               => $user_id,
                "product_type"          => $product_type
            );   
        }else{
            $_SESSION['CART'][$product_member_id] = array(
                "product_member_id"     => $product_member_id,
                "product_id"            => $product_id,
                "product_name"          => $product_name,
                "product_amount"        => $product_amount,
                "product_price"         => $product_price ,
                "product_total_price"   => $total,
                "user_id"               => $user_id,
                "product_type"          => $product_type
            );
        }
        
    
    }

    // echo "<pre>";
    // print_r( $_SESSION['CART']);
    // echo "</pre>";
    header("Location: checkout_cart.php");
    exit;

?>