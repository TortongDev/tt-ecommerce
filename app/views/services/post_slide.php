<?php
// INSERT INTO `kanji_banners`(`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
require_once "../autoload_class.php";

    $slide_header   = isset($_POST['slide_header']) ? htmlspecialchars(trim($_POST['slide_header'])) : '';
    $slide_content  = isset($_POST['slide_content']) ? htmlspecialchars(trim($_POST['slide_content'])) : '';

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filename_img = basename($_FILES["fileToUpload"]["name"]);
   

    
    $slide_picture  = $filename_img;
        
    $db     = new Connection(true);
    $slide  = new Slide(Connection::$pdo);
    
    $slide->uploadPicture($target_dir, $target_file ,  $slide_picture);
    $sql_insert = "INSERT INTO `kanji_slide`(`slide_picture`, `slide_header`, `slide_content`) VALUES (?,?,?)";
    $slide->setSlidePicture($slide_picture);
    $slide->setSlideHeader($slide_header);
    $slide->setSlideContent($slide_content);
    $slide->save();
    
?>