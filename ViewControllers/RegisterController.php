<?php
require_once "../app/class/Connection.php";
 
$ndb    = new Connection(true); 

 $OBJ_DATA = array();
 $per_username      = isset($_POST['PER_USERNAME'])   ? htmlspecialchars($_POST['PER_USERNAME'])   : '';
 $per_password      = isset($_POST['PER_PASSWORD'])   ? htmlspecialchars($_POST['PER_PASSWORD'])   : '';
 $per_firstname     = isset($_POST['PER_FIRSTNAME'])  ? htmlspecialchars($_POST['PER_FIRSTNAME'])  : '';
 $per_lastname      = isset($_POST['PER_LASTNAME'])   ? htmlspecialchars($_POST['PER_LASTNAME'])   : '';
 $per_tel           = isset($_POST['PER_TEL'])        ? htmlspecialchars($_POST['PER_TEL'])        : '';
 $per_email         = isset($_POST['PER_EMAIL'])      ? htmlspecialchars($_POST['PER_EMAIL'])      : '';
 $statusPost        = isset($_POST['STATUS_POST'])    ? htmlspecialchars($_POST['STATUS_POST'])    : '';
 
 $OBJ_DATA['DATA']  = $per_username;
 $OBJ_DATA['DATA']  = $per_password;
 $OBJ_DATA['DATA']  = $per_firstname;
 $OBJ_DATA['DATA']  = $per_lastname;
 $OBJ_DATA['DATA']  = $per_tel;
 $OBJ_DATA['DATA']  = $per_email;
 
    echo json_encode($OBJ_DATA);

?>