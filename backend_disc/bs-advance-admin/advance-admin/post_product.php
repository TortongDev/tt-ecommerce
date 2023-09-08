<?php

require_once "../../../services/class/Connection.php";

if(isset($_POST['process']) == 'insert_product'):    
    $db = new Connection(true);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
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
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }






    $product_name       = isset($_POST['product_name'])     ? htmlspecialchars(trim($_POST['product_name'])) : '';
    $product_price      = isset($_POST['product_price'])     ? htmlspecialchars(trim($_POST['product_price'])) : '';
    $product_amount     = isset($_POST['product_amount'])   ? htmlspecialchars(trim($_POST['product_amount'])) : '';
    $product_user_id    = $_SESSION['AUTHEN_USER_ID'];
    $product_img        = isset($_POST['product_img'])      ? htmlspecialchars(trim($_POST['product_img'])) : '';
    $product_detail     = isset($_POST['product_detail'])   ? htmlspecialchars(trim($_POST['product_detail'])) : '';
    $product_sub_detail = isset($_POST['product_sub_detail'])    ? htmlspecialchars(trim($_POST['product_sub_detail'])) : '';
    $product_type_name  = isset($_POST['product_type_name']) ? htmlspecialchars(trim($_POST['product_type_name'])) : '';
    $product_shop_name  = isset($_POST['product_shop_name'])      ? htmlspecialchars(trim($_POST['product_shop_name'])) : '';
    $product_type_id    = isset($_POST['product_type_id'])   ? htmlspecialchars(trim($_POST['product_type_id'])) : '';
    $product_shop_id    = isset($_POST['product_shop_id'])    ? htmlspecialchars(trim($_POST['product_shop_id'])) : '';
   
    $insertStmtProduct = $db->pdo->prepare(
        "
        INSERT INTO `kanji_products`(
            `product_name`, 
            `product_price`, 
            `product_amount`, 
            `product_type_name`, 
            `product_shop_name`, 
            product_user_id,
            product_img,
            `product_detail`, 
            `product_sub_detail`
            ) VALUES (?,?,?,?,?,?,?,?,?)
    ");

    $insertStmtProduct->execute(
        array(
            $product_name,
            $product_price,
            $product_amount,
            $product_type_name,
            $product_shop_name,
            $product_user_id,
            $target_file,
            $product_detail,
            $product_sub_detail
        )
    );
    echo "success";
    exit;
else:

    echo "false";

endif;
?>