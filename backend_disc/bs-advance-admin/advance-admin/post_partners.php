<?php
require_once "../../../autoload_class.php";
require_once "./checkAdmin.php";
$db = new Connection(true);
$checkAuthen = new checkAdmin;

if($_POST['process'] == "insert_partners"):    
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

    $partner_member_id       = "PARTNER-". rand(100,1000);
    $partner_name      = isset($_POST['partner_name'])     ? htmlspecialchars(trim($_POST['partner_name'])) : '';
    $partner_detail     = isset($_POST['partner_detail'])   ? htmlspecialchars(trim($_POST['partner_detail'])) : '';
    $partner_status        = isset($_POST['partner_status'])      ? htmlspecialchars(trim($_POST['partner_status'])) : '';
   
    $insertStmtProduct = $db->pdo->prepare(
        "
        INSERT INTO `kanji_partners`(
            `partner_member_id`, 
            `partner_name`, 
            `partner_detail`, 
            `partner_status`,
            partner_img
            ) VALUES (?,?,?,?,?)
    ");

    $insertStmtProduct->execute(
        array(
            $partner_member_id,
            $partner_name,
            $partner_detail,
            $partner_status,
            $target_file
        )
    );
    header('Location: popup.php?status_post=success&pagename=form_shop_product&status=post');
    exit;
else:
  echo $_POST['process'];

endif;
?>
 