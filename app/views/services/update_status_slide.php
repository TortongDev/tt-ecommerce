<?php
// INSERT INTO `kanji_banners`(`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
header("Access-Control-Allow-Origin: atsamart.com");
require_once "../autoload_class.php";


    $id     = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';
// $status = isset($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : '';
// $point = "";
    
        $db = new Connection(true);
        $updateStatus = new Slide(Connection::$pdo);

        $updateStatus->setSlideID($id);
        $updateStatus->updateStatus();



?>