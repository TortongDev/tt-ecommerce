<?php
    require_once "../autoload_class.php";
    $db = new Connection(true);
    $product = new Product(Connection::$pdo);
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // $uploadOk = 1;
    $target_name = $target_file;
    $product->uploadPicture($target_dir,$target_file,$target_name);

    $product_member_id    = "PROKJ-";
    $product_name       = isset($_POST['product_name'])     ? htmlspecialchars(trim($_POST['product_name'])) : '';
    $product_price      = isset($_POST['product_price'])     ? htmlspecialchars(trim($_POST['product_price'])) : '';
    $product_amount     = isset($_POST['product_amount'])   ? htmlspecialchars(trim($_POST['product_amount'])) : '';
    $option_price     = isset($_POST['option_price'])   ? htmlspecialchars(trim($_POST['option_price'])) : '';
    $option_amount     = isset($_POST['option_amount'])   ? htmlspecialchars(trim($_POST['option_amount'])) : '';
    $product_user_id    = $_SESSION['AUTHEN_ADMIN_ID'];
    $product_img        = './uploads/'.basename($_FILES["fileToUpload"]["name"]);
    $product_detail     = isset($_POST['product_detail'])   ? htmlspecialchars(trim($_POST['product_detail'])) : '';
    $product_sub_detail = isset($_POST['product_sub_detail'])    ? htmlspecialchars(trim($_POST['product_sub_detail'])) : '';
    $product_type_name  = isset($_POST['product_type_name']) ? htmlspecialchars(trim($_POST['product_type_name'])) : '';
    $product_shop_name  = isset($_POST['product_shop_name'])      ? htmlspecialchars(trim($_POST['partner_name'])) : '';
    $product_type_id    = isset($_POST['product_type_id'])   ? htmlspecialchars(trim($_POST['product_type_id'])) : '';
    $product_shop_id    = isset($_POST['product_shop_id'])    ? htmlspecialchars(trim($_POST['product_shop_id'])) : '';
  
    $product->setProductMemberID($product_member_id);
    $product->setProductName($product_name);
    $product->setProductPrice($product_price);
    $product->setProductAmount($product_amount);
    $product->setOptionPrice($option_price);
    $product->setOptionAmount($option_amount);
    $product->setProductUserID($product_user_id);
    $product->setProductImage($product_img);
    $product->setProductDetail($product_detail);
    $product->setProductSubDetail($product_sub_detail);
    $product->setProductTypeName($product_type_name);
    $product->setProductShopNmae($product_shop_name);
    
    
    $product->save();
?>