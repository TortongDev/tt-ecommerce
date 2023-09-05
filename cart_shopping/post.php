<?php
    session_start();

    // $fruits = array(
    //     array('name' => 'banana', 'quantity' => 21),
    //     array('name' => 'apple', 'quantity' => 3),
    //     array('name' => 'banana', 'quantity' => 2),
    //     array('name' => 'apple', 'quantity' => 5),
    //     array('name' => 'orange', 'quantity' => 4),
    //     array('name' => 'orange', 'quantity' => 10)
    // );
    
    // $cart = array();
    // echo "<pre>";
    // print_r($fruits);
    // echo "</pre>";


    // foreach ($fruits as $fruit) {
    //     $name = $fruit['name'];
    //     $quantity = $fruit['quantity'];
    
    //     if (isset($cart[$name])) {
    //         // หากมีสินค้าชนิดนี้อยู่ในตะกร้าแล้ว
    //         $cart[$name]['quantity'] += $quantity;
    //     } else {
    //         // หากยังไม่มีสินค้าชนิดนี้ในตะกร้า
    //         $cart[$name] = $fruit;
    //     }
    // }
    
    // $cart = array_values($cart);
    
    // // แสดงผลลัพธ์
    
    // echo "<pre>";
    // print_r($cart);
    // echo "</pre>";











    $cart = array();
    $cart1 = array();
    $cart1['product_id']     = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $cart1['product_name']   = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $cart1['product_type']   = isset($_POST['product_type']) ? $_POST['product_type'] : '';
    $cart1['product_price']  = isset($_POST['product_price']) ? $_POST['product_price'] : '';
    $cart1['product_amount'] = isset($_POST['product_amount']) ? $_POST['product_amount'] : '';
    $cart_array = array($cart1);
    
    // if(empty($_SESSION['cart'])):
    //     $_SESSION['cart'] = array();
    // else:
    //     array_push($_SESSION['cart'] , $cart_array);
    //     echo "<pre>";
    //     print_r($_SESSION['cart']);
    //     echo "</pre>";
    // endif;
   

    foreach ($_SESSION['cart'] as $fruit) {
        $product_name  = $fruit[0]['product_name'];
        $product_price =  $fruit[0]['product_price'];

        if (isset($cart[$product_name])) {
            // หากมีสินค้าชนิดนี้อยู่ในตะกร้าแล้ว
            $cart[$product_name][0]['product_price'] += $product_price;

        } else {
            // หากยังไม่มีสินค้าชนิดนี้ในตะกร้า
            $cart[$product_name][0] = $fruit;
        }
    }
    $cart = array_values($cart);
   
    echo "<pre>";
    print_r($cart);
    echo "</pre>";

?>