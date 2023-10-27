<?php
require_once "../../class/Connection.php";
require_once "../../class/Banner.php";

use appBanner\Banner;

$id = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';

$db             = new Connection(true);
$updateStatus   = new Banner(Connection::$pdo);
$updateStatus->setBannerID($id);
$updateStatus->updateStatus();

$updateStatus           = NULL;
$db                     = NULL;
?>