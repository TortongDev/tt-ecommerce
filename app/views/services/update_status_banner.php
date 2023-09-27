<?php
// require_once "../../../../services/class/Connection.php";
require_once "../checkAdmin.php";
$chkAdmin = new checkAdmin;
$chkAdmin->checkAdmin();

$id     = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';

    


?>