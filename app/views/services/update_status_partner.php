<?php
// INSERT INTO `kanji_banners`(`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
require_once "../autoload_class.php";
    $id     = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';
    $sid = explode(',',$id);
    $ssid = $sid[1];
    echo $ssid;
    if($ssid == '1'){
        $point = "2";
    }elseif($ssid == '2'){
        $point = "1";
    }
     $insert = new Connection(true);
        $sql_insert = "UPDATE `kanji_partners` SET `partner_status`= ? WHERE partner_id = ?";
        $stmt_insert = Connection::$pdo->prepare($sql_insert);
        if($stmt_insert->execute(array($point,$sid[0]))):
            echo json_encode(array('status'=>"success"));
        else:
            
        endif;



?>