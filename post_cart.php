<?php
    $cart = array();
    $cart['product_id']     = isset($_GET['product_id']) ? $_GET['product_id'] : '';
    $cart['product_name']   = isset($_GET['product_name']) ? $_GET['product_name'] : '';
    $cart['product_type']   = isset($_GET['product_type']) ? $_GET['product_type'] : '';
    $cart['product_price']  = isset($_GET['product_price']) ? $_GET['product_price'] : '';
    $cart['user_id']        = isset($_GET['user_id']) ? $_GET['user_id'] : '';
    $cart['product_amount'] = isset($_GET['product_amount']) ? $_GET['product_amount'] : '';
    $cart_array = array($cart);
    $reduce = array_reduce($cart_array, function ($carry, $item){
        $name       = $item['product_name'];
        $quantity   = $item['product_price'];
        var_dump($item);
        // ถ้าไม่ว่าง
        if(!isset($carry[$name])){
            $carry[$name] = $item;
        }else{
            $carry[$name]['product_price'] += $quantity;
        }
        return $carry;
    },array());
    
    // $result = array_reduce($fruits, function ($carry, $item) {
    //     $name       = $item['name'];
    //     $quantity   = $item['quantity'];
    //     if (!isset($carry[$name])) {
    //         $carry[$name] = $item;
    //     } else {
    //         $carry[$name]['quantity'] += $quantity;
    //     }
    //     return $carry;
    // }, array());
    // $result = array_values($result);


?>