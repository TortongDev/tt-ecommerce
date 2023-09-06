<?php

$shop = array(
    array(
        'shop_name' => 'ร้านใจดี',
        'product_id'=> 'p1',
        'product_name'=>'iphone14',
        'product_price'=>'23000',
        'prodect_detail'=>'poooooooooooo1'
    )
    ,array(
        'shop_name' => 'ร้านใจดี',
        'product_id'=> 'p2',
        'product_name'=>'iphone15',
        'product_price'=>'26000',
        'prodect_detail'=>'poooooooooooo1'
    ),
    array(
        'shop_name' => 'ร้านใจดี',
        'product_id'=> 'p3',
        'product_name'=>'iphone16',
        'product_price'=>'28000',
        'prodect_detail'=>'poooooooooooo1'
    )
     
);

    echo json_encode($shop);


?>