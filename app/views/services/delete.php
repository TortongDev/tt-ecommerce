<?php 
    require_once "../../class/Connection.php";
    require_once "../../class/Slide.php";
    require_once "../../class/Partner.php";
    require_once "../../class/ProductType.php";

    use appType\ProductType;
    use appPartner\Partner;
    use appSlide\Slide;



    $db = new Connection(true);
        
    $process    = isset($_GET['process']) ? htmlspecialchars(trim($_GET['process'])) : '';
    $id         = isset($_GET['id']) ? htmlspecialchars(trim($_GET['id'])) : '';
    $option     = isset($_GET['option']) ? htmlspecialchars(trim($_GET['option'])) : '';

  
    if($option == 'delete'){

        if($process == 'slide'){
            $slide = new Slide(Connection::$pdo);
            $slide->setSlideID($id);
            $slide->delete();          
        }elseif($process == 'banner'){
    
           $banner = new Banner(Connection::$pdo);
           $banner->delete($id);
           
        }elseif($process == 'product_type'){
            $product_type = new ProductType(Connection::$pdo);
            $product_type->setTypeID($id);
            $product_type->delete();
        }elseif($process == 'add_product'){
            $sql = "DELETE FROM `kanji_products` WHERE 1=1 AND  product_id = '{$id}' ";
            $stmt = Connection::$pdo->query($sql);
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