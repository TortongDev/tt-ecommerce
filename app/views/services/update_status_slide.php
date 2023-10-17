<?php
require_once "../../class/Connection.php";
require_once "../../class/Slide.php";

use appSlide\Slide;

$id     = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';
$db = new Connection(true);
$updateStatus = new Slide(Connection::$pdo);
$updateStatus->setSlideID($id);
$updateStatus->updateStatus();
echo json_encode(array('success'));


?>