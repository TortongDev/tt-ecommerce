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
        }elseif($process == 'banner'){
            $sql = "DELETE FROM `kanji_banners` WHERE 1=1 AND  banner_id = '{$id}' ";
            $stmt = $db->pdo->query($sql);
            if($stmt){
                header("Location: ../popup.php?status_post=success&pagename=banner-config-home&status=delete");
            }else{
                echo "0";
            }
        }elseif($process == 'product_type'){
            $sql = "DELETE FROM `kanji_product_type` WHERE 1=1 AND  type_id = '{$id}' ";
            $stmt = $db->pdo->query($sql);
            if($stmt){
                header("Location: ../popup.php?status_post=success&pagename=form_product_type&status=delete");
            }else{
                echo "0";
            }
        }elseif($process == 'add_product'){
            $sql = "DELETE FROM `kanji_products` WHERE 1=1 AND  product_id = '{$id}' ";
            $stmt = $db->pdo->query($sql);
            if($stmt){
                header("Location: ../popup.php?status_post=success&pagename=form_products&status=delete");
            }else{
                echo "0";
            }
        }

    }else{
        echo "0";
    }

?>