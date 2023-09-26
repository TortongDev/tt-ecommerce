<?php
// INSERT INTO `kanji_banners`(`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
require_once "../../../../services/class/Connection.php";
require_once "../checkAdmin.php";
$chkAdmin = new checkAdmin;
$chkAdmin->checkAdmin();


    $slide_header   = isset($_POST['slide_header']) ? htmlspecialchars(trim($_POST['slide_header'])) : '';
    $slide_content  = isset($_POST['slide_content']) ? htmlspecialchars(trim($_POST['slide_content'])) : '';

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filename_img = basename($_FILES["fileToUpload"]["name"]);
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
    
    $slide_picture  = $filename_img;
        
    $insert = new Connection(true);
    $sql_insert = "INSERT INTO `kanji_banners`(`banner_topic`, `picture`) VALUES (?,?)";
    $stmt_insert = $insert->pdo->prepare($sql_insert);
    if($stmt_insert->execute(array($slide_header,$slide_picture))):
        header("Location: ../popup.php?status_post=success&pagename=banner-config-home&status=post");
        exit;
      else:

    endif;

?>