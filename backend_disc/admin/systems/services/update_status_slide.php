<?php
// INSERT INTO `kanji_banners`(`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
header("Access-Control-Allow-Origin: atsamart.com");
require_once "../../../../services/class/Connection.php";
require_once "../checkAdmin.php";
$chkAdmin = new checkAdmin;
$chkAdmin->checkAdmin();
// $chkAdmin->authenAPI();



    $id     = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';
// $status = isset($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : '';
// $point = "";
    $sid = explode(',',$id);
    
    $ssid = $sid[1];
    echo $ssid;
    if($ssid == '1'){
        $point = "2";
    }elseif($ssid == '2'){
        $point = "1";
    }
     $insert = new Connection(true);
        $sql_insert = "UPDATE `kanji_slide` SET `slide_status`= ? WHERE slide_id = ?";
        $stmt_insert = $insert->pdo->prepare($sql_insert);
        if($stmt_insert->execute(array($point,$sid[0]))):
            echo json_encode(array('status'=>"seccess"));
        else:

        endif;



?>