<?php
require_once "../autoload_class.php";

$id = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';

$db             = new Connection(true);
$updateStatus   = new Banner(Connection::$pdo);
$updateStatus->setBannerID($id);
$updateStatus->updateStatus();

$updateStatus           = NULL;
$db                     = NULL;
?>