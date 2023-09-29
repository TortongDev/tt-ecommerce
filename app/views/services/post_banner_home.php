<?php

    require_once "../autoload_class.php";

    $slide_header   = isset($_POST['slide_header']) ? htmlspecialchars(trim($_POST['slide_header'])) : '';
    $slide_content  = isset($_POST['slide_content']) ? htmlspecialchars(trim($_POST['slide_content'])) : '';
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_name =  basename($_FILES["fileToUpload"]["name"]);
    $slide_picture  = $target_name;
    $db = new Connection(true); 
    $banner = new Banner(Connection::$pdo);
    
    //upload file
    $banner->uploadPicture($target_dir,$target_file,$target_name);

    $banner->setBannerName($slide_header);
    $banner->setBannerPicture($slide_picture);
    $banner->save();

    $db = NULL;
    $banner = NULL;

?>