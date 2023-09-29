<?php
require_once "../autoload_class.php";
require_once "../checkAdmin.php";
$db = new Connection(true);
$checkAuthen = new checkAdmin;
$conn = new Connection(true);
$newPartner = new Partner(Connection::$pdo);
 
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
    $target_name = basename($_FILES["fileToUpload"]["name"]);

    $partner_member_id       = "PNER-". rand(1,1000);
    $partner_name            = isset($_POST['partner_name'])        ? htmlspecialchars(trim($_POST['partner_name'])) : '';
    $partner_detail          = isset($_POST['partner_detail'])      ? htmlspecialchars(trim($_POST['partner_detail'])) : '';
    $partner_status          = isset($_POST['partner_status'])      ? htmlspecialchars(trim($_POST['partner_status'])) : '';
   
    $newPartner->uploadPicture($target_dir,$target_file,$target_name);
    $newPartner->setPartnerMemberID($partner_member_id);
    $newPartner->setPartnerName($partner_name);
    $newPartner->setPartnerDetail($partner_detail);
    $newPartner->setPartnerStatus($partner_status);
    $newPartner->setPartnerImage($target_file);
    $newPartner->save();
    
?>
 