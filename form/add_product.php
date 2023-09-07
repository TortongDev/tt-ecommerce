<?php

    require_once "../services/class/Connection.php";
    $db = new Connection(true);
    // $product_id         = isset($_POST['product_id'])       ? htmlspecialchars(trim($_POST['product_id'])) : '';
    $product_name       = isset($_POST['product_name'])     ? htmlspecialchars(trim($_POST['product_name'])) : '';
    $product_price      = isset($_POST['product_type'])     ? htmlspecialchars(trim($_POST['product_type'])) : '';
    $product_amount     = isset($_POST['product_detail'])   ? htmlspecialchars(trim($_POST['product_detail'])) : '';
    $product_user_id    = isset($_POST['product_sub_detail']) ? htmlspecialchars(trim($_POST['product_sub_detail'])) : '';
    $product_img        = isset($_POST['product_img'])      ? htmlspecialchars(trim($_POST['product_img'])) : '';
    $product_detail     = isset($_POST['product_amount'])   ? htmlspecialchars(trim($_POST['product_amount'])) : '';
    $product_sub_detail = isset($_POST['product_price'])    ? htmlspecialchars(trim($_POST['product_price'])) : '';

    
    // if(!empty($product_amount)): 
        
    //     $updateStmtProduct = $db->pdo->prepare("");
    //     $updateStmtProduct->execute(array());    



    // endif;

    $insertStmtProduct = $db->pdo->prepare("INSERT INTO `kanji_products`
                                                ( 
                                                    `product_name`, 
                                                    `product_price`, 
                                                    `product_amount`, 
                                                    `product_user_id`, 
                                                    `product_img`, 
                                                    `product_detail`, 
                                                    `product_sub_detail`
                                                ) VALUES (?,?,?,?,?,?,?)");
    $insertStmtProduct->execute(
        array(
            $product_name,
            $product_price,
            $product_amount,
            $product_user_id,
            $product_img,
            $product_detail,
            $product_sub_detail
        )
    );
?>