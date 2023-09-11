<?php
header("Content-type: application/json; charset=utf-8");
session_start();
$id  = $_GET['id'];
$valueID = $_GET['valueID'];


    $_SESSION['CART'][$id]['product_amount'] = $valueID;
    $_SESSION['CART'][$id]['product_total_price'] = $valueID * $_SESSION['CART'][$id]['product_price'];


    $totalAmount = 0; // เริ่มต้นจากผลรวมเป็น 0
    $total_price  = 0; // เริ่มต้นจากผลรวมเป็น 0
    foreach ($_SESSION['CART'] as $item) {
        // var_dump($item);
            $totalAmount += $item['product_amount'];
            $total_price +=  $item['product_total_price'];
    }
    $total      =  $total_price;
    $sumtotal   =  $total_price + 40;
    $_SESSION['total']      = $total;
    $_SESSION['sumtotal']   = $sumtotal;


    echo json_encode(array('priceAll'=>$total_price,'sumTotal'=>$sumtotal));
    // $arrays = array(
    //     'price' => ($valueID * $price) 
    // );
 
    // echo json_encode($arrays);
?>