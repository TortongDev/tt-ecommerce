<?php

    require_once "../services/class/Connection.php";
    
    if(isset($_POST['process']) == 'insert_product'):    
        $db = new Connection(true);
        $product_name       = isset($_POST['product_name'])     ? htmlspecialchars(trim($_POST['product_name'])) : '';
        $product_price      = isset($_POST['product_type'])     ? htmlspecialchars(trim($_POST['product_type'])) : '';
        $product_amount     = isset($_POST['product_detail'])   ? htmlspecialchars(trim($_POST['product_detail'])) : '';
        $product_user_id    = isset($_POST['product_sub_detail']) ? htmlspecialchars(trim($_POST['product_sub_detail'])) : '';
        $product_img        = isset($_POST['product_img'])      ? htmlspecialchars(trim($_POST['product_img'])) : '';
        $product_detail     = isset($_POST['product_amount'])   ? htmlspecialchars(trim($_POST['product_amount'])) : '';
        $product_sub_detail = isset($_POST['product_price'])    ? htmlspecialchars(trim($_POST['product_price'])) : '';

        $product_type_name    = isset($_POST['product_sub_detail']) ? htmlspecialchars(trim($_POST['product_sub_detail'])) : '';
        $product_shop_name        = isset($_POST['product_img'])      ? htmlspecialchars(trim($_POST['product_img'])) : '';
        $product_type_id     = isset($_POST['product_amount'])   ? htmlspecialchars(trim($_POST['product_amount'])) : '';
        $product_shop_id = isset($_POST['product_price'])    ? htmlspecialchars(trim($_POST['product_price'])) : '';
        // if(!empty($product_amount)): 
            
        //     $updateStmtProduct = $db->pdo->prepare("");
        //     $updateStmtProduct->execute(array());    



        // endif;

        $insertStmtProduct = $db->pdo->prepare(
            "INSERT INTO `kanji_products`(
                `product_name`, 
                `product_price`, 
                `product_amount`, 
                `product_type_name`, 
                `product_shop_name`, 
                `product_type_id`, 
                `product_user_id`,  
                `product_img`, 
                `product_detail`, 
                `product_sub_detail`, 
                `product_shop_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?)
        ");

        $insertStmtProduct->execute(
            array(
                $product_name,
                $product_price,
                $product_amount,
                $product_type_name,
                $product_shop_name,
                $product_type_id,
                $product_user_id,
                $product_img,
                $product_detail,
                $product_sub_detail,
                $product_shop_id
            )
        );
        echo "success";
        exit;
    else:

        echo "false";

    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        <div class="form-group">
            <input type="text" name="product_name"  class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="product_price" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="product_amount" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="product_user_id" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="product_img" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="product_detail" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="product_sub_detail" class="form-control">
        </div>
       

        <button type="submit" name="process" value="insert_product">
            บันทึก
        </button>

    </form>
</body>
</html>