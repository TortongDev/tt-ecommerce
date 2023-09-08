<?php

require_once "../../../services/class/Connection.php";
 $db = new Connection(true);
 require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkAdmin();
if(isset($_POST['process']) == 'insert_product'):    
   
    $product_type_id       = 'KANJIID-';
    $product_type_name     = isset($_POST['product_type_name'])     ? htmlspecialchars(trim($_POST['product_type_name'])) : '';
    $product_type_status   = isset($_POST['product_type_status'])   ? htmlspecialchars(trim($_POST['product_type_status'])) : '';
    $product_type_detail   = isset($_POST['product_type_detail'])    ? htmlspecialchars(trim($_POST['product_type_detail'])) : '';
   
    $insertStmtProduct = $db->pdo->prepare(
        "
        INSERT INTO `kanji_product_type`(
            `product_type_id`, 
            `product_type_name`, 
            `product_type_status`, 
            `product_type_detail`
            ) VALUES (?,?,?,?)
    ");

    $insertStmtProduct->execute(
        array(
            $product_type_id,
            $product_type_name,
            $product_type_status,
            $product_type_detail
        )
    );
    header('Location: form_product_type.php');
    exit;
else:

    echo "false";

endif;
?>