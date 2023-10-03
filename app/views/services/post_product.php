<?php
require_once "../../../services/class/Connection.php";

if(isset($_POST['process']) == 'insert_product'):    
    $db = new Connection(true);
    // $db->;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    if (file_exists($target_file)) {
      echo "มีไฟล์นี้แล้ว.";
      $uploadOk = 0;
    }
    
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "ขนาดเกินกำหนด.";
      $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "อนุญาตินามสกุลนี้ JPG, JPEG, PNG เท่านั้น";
      $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
      echo "ไม่มีการอัปโหลดไฟล์";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "ขออภัย เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
      }
    }

    $product_member_id    = "PROKJ-";
    $product_name       = isset($_POST['product_name'])     ? htmlspecialchars(trim($_POST['product_name'])) : '';
    $product_price      = isset($_POST['product_price'])     ? htmlspecialchars(trim($_POST['product_price'])) : '';
    $product_amount     = isset($_POST['product_amount'])   ? htmlspecialchars(trim($_POST['product_amount'])) : '';
    $option_price     = isset($_POST['option_price'])   ? htmlspecialchars(trim($_POST['option_price'])) : '';
    $option_amount     = isset($_POST['option_amount'])   ? htmlspecialchars(trim($_POST['option_amount'])) : '';
    $product_user_id    = $_SESSION['AUTHEN_USER_ID'];
    $product_img        = isset($_POST['product_img'])      ? htmlspecialchars(trim($_POST['product_img'])) : '';
    $product_detail     = isset($_POST['product_detail'])   ? htmlspecialchars(trim($_POST['product_detail'])) : '';
    $product_sub_detail = isset($_POST['product_sub_detail'])    ? htmlspecialchars(trim($_POST['product_sub_detail'])) : '';
    $product_type_name  = isset($_POST['product_type_name']) ? htmlspecialchars(trim($_POST['product_type_name'])) : '';
    $product_shop_name  = isset($_POST['product_shop_name'])      ? htmlspecialchars(trim($_POST['partner_name'])) : '';
    $product_type_id    = isset($_POST['product_type_id'])   ? htmlspecialchars(trim($_POST['product_type_id'])) : '';
    $product_shop_id    = isset($_POST['product_shop_id'])    ? htmlspecialchars(trim($_POST['product_shop_id'])) : '';
   
    $insertStmtProduct = $db->pdo->prepare(
        "
        INSERT INTO `kanji_products`(
            product_member_id,
            `product_name`, 
            `product_price`, 
            `product_amount`, 
            `product_type_name`, 
            `product_shop_name`, 
            product_user_id,
            product_img,
            `product_detail`, 
            `product_sub_detail`,
            option_price,
            option_amount
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
    ");

    $insertStmtProduct->execute(
        array(
            $product_member_id,
            $product_name,
            $product_price,
            $product_amount,
            $product_type_name,
            $product_shop_name,
            $product_user_id,
            $target_file,
            $product_detail,
            $product_sub_detail,
            $option_price, 
            $option_amount    
        )
    );
    echo "success";
    exit;
else:

    echo "false";

endif;
?>