<?php
    require_once "../../class/Connection.php";
    $id = isset($_GET['oid']) ? htmlspecialchars($_GET['oid']) : '';
    $db = new Connection();
    $db->openConnection();
    $update_status = 1;
    $sql = "UPDATE `kanji_orders` SET `ORDER_STATUS`= 1 WHERE ORDER_ID = ? ";
    $stmt = Connection::$pdo->prepare($sql);
    $stmt->execute([$id]);
    header('Location: ../popup.php?status_post=success&pagename=index&status=post');
    exit;  
?>