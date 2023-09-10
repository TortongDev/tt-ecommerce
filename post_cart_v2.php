<?php
session_start();

if(isset($_GET['d']) == '1' ){

    unset($_SESSION['CART']);
    unset($_SESSION['TOTAL_ALL_SUM']);
    header('Location: ./shopping_online_2.php');
    exit;
}
$product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : '';
$product_name = isset($_POST['product_name']) ? htmlspecialchars($_POST['product_name']) : '';
$product_amount = isset($_POST['product_amount']) ? htmlspecialchars($_POST['product_amount']) : '';
$product_price = isset($_POST['product_price']) ? htmlspecialchars($_POST['product_price']) : '';




if(empty($_SESSION['CART'])){
    $_SESSION['CART'] = array();
}
$total = $product_amount * $product_price;
if(!empty($_SESSION['CART'][$product_id])){
    if($product_amount == 1){
        $_SESSION['CART'][$product_id]['product_amount'] += $product_amount;
        $_SESSION['CART'][$product_id]['product_price']  += $product_price;
        $_SESSION['CART'][$product_id]['product_price1'] = $product_price;       
   
    }else{
        $_SESSION['CART'][$product_id]['product_amount'] += $product_amount;
        $_SESSION['CART'][$product_id]['product_price']  += $total;       
        $_SESSION['CART'][$product_id]['product_price1']  = $product_price;       
   
   }
   
}else{
    if($product_amount != 1){
        $_SESSION['CART'][$product_id] = array(
            "product_id"        => $product_id,
            "product_name"      => $product_name,
            "product_amount"    => $product_amount,
            "product_price"     => $total,
            "product_price1"    => $product_price
        );   
    }else{
        $_SESSION['CART'][$product_id] = array(
            "product_id"        => $product_id,
            "product_name"      => $product_name,
            "product_amount"    => $product_amount,
            "product_price"     => $product_price ,
            "product_price1"    => $product_price
        );
    }
       
   
}

echo "<pre>";
print_r( $_SESSION['CART']);
echo "</pre>";

?>