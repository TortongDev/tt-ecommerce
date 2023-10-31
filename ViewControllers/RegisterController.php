<?php
require_once "../app/class/Connection.php";
$ndb    = new Connection(true); 
$per_username   = isset($_POST['PC_USERNAME']) ? htmlspecialchars($_POST['PC_USERNAME']) : '';
$per_password   = isset($_POST['PER_PASSWORD']) ? htmlspecialchars($_POST['PER_PASSWORD']) : '';
$per_firstname  = isset($_POST['PER_FIRSTNAME']) ? htmlspecialchars($_POST['PER_FIRSTNAME']) : '';
$per_lastname   = isset($_POST['PER_LASTNAME']) ? htmlspecialchars($_POST['PER_LASTNAME']) : '';
$per_tel        = isset($_POST['PC_PER_TEL']) ? htmlspecialchars($_POST['PC_PER_TEL']) : '';
$per_email      = isset($_POST['PER_EMAIL']) ? htmlspecialchars($_POST['PER_EMAIL']) : '';
$statusPost     = isset($_POST['STATUS_POST']) ? htmlspecialchars($_POST['STATUS_POST']) : '';

// สร้างอ็อบเจกต์เพื่อเก็บข้อมูล
$objData = array(
    ':PER_USERNAME' => $per_username,
    ':PER_PASSWORD' => $ndb->id_encrypt($per_password),
    ':PER_FIRSTNAME' => $per_firstname,
    ':PER_LASTNAME' => $per_lastname,
    ':PER_EMAIL' => $per_email,
    ':PER_TEL' => $per_tel
    
);

if( $statusPost == '1' ):
    $insert = Connection::$pdo->prepare('INSERT INTO `authen_users`(`authen_username`, `authen_password`, `per_firstname`, `per_lastname`, `per_email`, `per_phone_number`) 
        VALUES (:PER_USERNAME,:PER_PASSWORD,:PER_FIRSTNAME,:PER_LASTNAME,:PER_EMAIL,:PER_TEL)');
    $insert->execute($objData);
    echo json_encode(array('status_post'=> 'success'));
else:

endif;

?>