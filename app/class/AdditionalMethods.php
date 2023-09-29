<?php

class AdditionalMethods 
{
   
    // public static function selectAll($tableName){
    //     $sql = "SELECT * FROM {$tableName} WHERE ? ";
    //     $stmt = self::$pdo->prepare($sql);
    //     $stmt->execute(array('1=1'));
    //     $fetchArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $fetchArray;
    // }

    public static function selectFind($tableName,...$args){
        $sql = "SELECT * FROM  {$tableName} WHERE ";
        foreach ($args as $key => $value) {
            $sql .= "$value = ? ,";
        }
        echo  $sql;
    }

    public function uploadPicture($target_dir,$target_file,$target_name){
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
      }
      public function redirectSuccess(){
          header("Location: ../popup.php?status_post=success&pagename=form_product_type&status=delete");
          exit;
      }
    
}
?>