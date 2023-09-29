<?php
    require_once "../autoload_class.php";
    $db = new Connection(true);
        
    $process = isset($_GET['process']) ? htmlspecialchars(trim($_GET['process'])) : '';
    $id = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
    $option = isset($_GET['option']) ? htmlspecialchars(trim($_GET['option'])) : '';

  
    if($option == 'delete'){

        if($process == 'slide'){
            $slide = new Slide(Connection::$pdo);
            $slide->setSlideID($id);
            $slide->delete();          
        }elseif($process == 'banner'){
    
           $banner = new Banner(Connection::$pdo);
           $banner->delete($id);
           
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
        }elseif($process == 'partner'){
            $partner = new Partner(Connection::$pdo);
            $partner->setPartnerID($id);
            $partner->delete();

        }

    }else{
        echo "0";
    }

?>