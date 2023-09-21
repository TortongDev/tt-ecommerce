<?php
// INSERT INTO `kanji_banners`(`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
require_once "../../../../services/class/Connection.php";
require_once "../checkAdmin.php";
$chkAdmin = new checkAdmin;
$chkAdmin->checkAdmin();

$id     = isset($_POST['id']) ? htmlspecialchars(trim($_POST['id'])) : '';
$status = isset($_POST['status']) ? htmlspecialchars(trim($_POST['status'])) : '';

$insert = new Connection(true);
$sql_insert = "UPDATE `kanji_slide` SET `slide_status`= '1' WHERE slide_id = ?";
$stmt_insert = $insert->pdo->prepare($sql_insert);
if($stmt_insert->execute(array($id))):

else:

endif;

echo json_encode(array('success'=>$_POST['id']));

?>