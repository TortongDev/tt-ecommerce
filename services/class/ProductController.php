<?php
require_once dirname(dirname(__DIR__))."/app/config/config_pach.php";
require_once PATCH_PRODUCT;
require_once PATCH_CONNECTION;

class ProductController extends Product {

    public static $pdo;
    public function __construct()
    {
        
        $db = new Connection(true);
        parent::$pdo = Connection::$pdo;
    }
    public function __destruct()
    {
        parent::$pdo = NULL;
        self::$pdo = NULL;
    }
    public function selectProduct(){
        $this->limit        = 6;
        $stmt_product       = $this->selectLimit();
       
        while($R_PRODUCT    =  $stmt_product->fetch(PDO::FETCH_ASSOC)){
            $PRODUCT_IMG = $R_PRODUCT['product_img'];
            $product_id = $R_PRODUCT['product_id'];
            $product_name = $R_PRODUCT['product_name'];
            $product_detail = $R_PRODUCT['product_detail'];
            $id =  $this->id_encrypt($product_id);
            echo <<<PRODT
                    <div class="box-product">
                                <div class="img-profile">
                                <img class="img-action" src="./app/views/$PRODUCT_IMG" alt="">
                                </div>
                                <h3 class="short-text-1"><a href="./shop_product.php?product_id=$id">$product_name</a></h3>
                                <h4 class="sub-text short-text-2">$product_detail</h4>
                            
                </div>
                PRODT;
        }
    }
  
}
?>