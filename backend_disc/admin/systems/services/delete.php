<?php
    require_once "../../../../autoload_class.php";
    $db = new Connection(true);
        
    $process = isset($_GET['process']) ? htmlspecialchars(trim($_GET['process'])) : '';
    $id = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
    $option = isset($_GET['option']) ? htmlspecialchars(trim($_GET['option'])) : '';

  
    if($option == 'delete'){

        if($process == 'slide'){
            $sql = "DELETE FROM `kanji_slide` WHERE 1=1 AND  slide_id = '{$id}' ";
            $stmt = $db->pdo->query($sql);
            if($stmt){
                header("Location: ../popup.php?status_post=success&pagename=slide-config&status=delete");
            }else{
                echo "0";
            }
        }

    }else{
        echo "0";
    }

?>