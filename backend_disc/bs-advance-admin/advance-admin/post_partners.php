<?php
require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkAdmin();
require_once "../../../autoload_class.php";

if(isset($_POST['process']) == 'insert_product'):    
    $db = new Connection(true);


    $partner_member_id       = "PARTNER-";
    $partner_name      = isset($_POST['partner_name'])     ? htmlspecialchars(trim($_POST['partner_name'])) : '';
    $partner_detail     = isset($_POST['partner_detail'])   ? htmlspecialchars(trim($_POST['partner_detail'])) : '';
    $partner_status        = isset($_POST['partner_status'])      ? htmlspecialchars(trim($_POST['partner_status'])) : '';
   
    $insertStmtProduct = $db->pdo->prepare(
        "
        INSERT INTO `kanji_partners`(
            `partner_member_id`, 
            `partner_name`, 
            `partner_detail`, 
            `partner_status`
            ) VALUES (?,?,?,?)
    ");

    $insertStmtProduct->execute(
        array(
            $partner_member_id,
            $partner_name,
            $partner_detail,
            $partner_status
        )
    );
    header('Location: form_shop_product.php');
    exit;
else:

    echo "false";

endif;
?>