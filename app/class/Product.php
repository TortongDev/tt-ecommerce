<?php
declare(strict_types=1);
namespace appProduct;


require_once dirname(dirname(__DIR__))."/app/config/config_pach.php";
require_once PATCH_ADDITIONAL_METHODE;

use APP\CLASS\AdditionalMethods;
class Product extends AdditionalMethods
{
    public $product_id;
    public $product_member_id;
    public $product_name;
    public $product_price;
    public $product_amount;
    public $product_type_name;
    public $product_shop_name;
    public $product_user_id;
    public $product_img;
    public $product_detail;
    public $product_sub_detail;
    public $option_price;
    public $option_amount;
    public $limit;
    public $tableName = "kanji_products";
    
    public static $pdo;

    public function __construct($pdo)
    {
        self::$pdo = $pdo;
    }
    public function __destruct(){
        self::$pdo = NULL;
    }
    
    public function getProductID(){
        return $this->product_id;
    } 
    public function getProductMemberID(){
        return $this->product_member_id;
    } 
    public function getProductName(){
        return $this->product_name;
    } 
    public function getProductPrice(){
        return $this->product_price;
    } 
    public function getProductAmount(){
        return $this->product_amount;
    } 
    
    public function getProductTypeName(){
        return $this->product_type_name;
    } 
    public function getProductShopNmae(){
        return $this->product_shop_name;
    } 
    public function getProductUserID(){
        return $this->product_user_id;
    } 
    public function getProductImage(){
        return $this->product_img;
    } 
    public function getProductDetail(){
        return $this->product_detail;
    } 
    public function getProductSubDetail(){
        return $this->product_sub_detail;
    } 
    
    public function getOptionPrice(){
        return $this->option_price;
    } 
    public function getOptionAmount(){
        return $this->option_amount;
    } 




    public function setProductID($product_id){
        $this->product_id = $product_id;
    } 
    public function setProductMemberID($product_member_id){
        $this->product_member_id = $product_member_id;
    } 
    public function setProductName($product_name){
        $this->product_name = $product_name;
    } 
    public function setProductPrice($product_price){
        $this->product_price = $product_price;
    } 
    public function setProductAmount($product_amount){
        $this->product_amount = $product_amount;
    } 
    
    public function setProductTypeName($product_type_name){
        $this->product_type_name = $product_type_name;
    } 
    public function setProductShopNmae($product_shop_name){
        $this->product_shop_name = $product_shop_name;
    } 
    public function setProductUserID($product_user_id){
        $this->product_user_id = $product_user_id;
    } 
    public function setProductImage($product_img){
        $this->product_img = $product_img;
    } 
    public function setProductDetail($product_detail){
        $this->product_detail = $product_detail;
    } 
    public function setProductSubDetail($product_sub_detail){
        $this->product_sub_detail = $product_sub_detail;
    } 
    
    public function setOptionPrice($option_price){
        $this->option_price = $option_price;
    } 
    public function setOptionAmount($option_amount){
        $this->option_amount = $option_amount;
    } 



    public function selectLimit(){
         
        $stmt_product = self::$pdo->prepare("SELECT * FROM `kanji_products` WHERE ? ORDER BY product_timestamp DESC LIMIT ".$this->limit);
        $stmt_product->execute(array('1=1'));
        return $stmt_product;
    }
    public function save(){
        $sql = " INSERT INTO $this->tableName(
            product_member_id,
            `product_name`, 
            `product_price`, 
            `product_amount`, 
            `product_type_name`, 
            `product_shop_name`, 
            product_user_id,
            product_img,
            `product_detail`, 
            `product_sub_detail`,
            option_price,
            option_amount
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = self::$pdo->prepare($sql);
        if($stmt->execute(array(
                $this->product_member_id,$this->product_name,$this->product_price,$this->product_amount,$this->product_type_name,
                $this->product_shop_name,$this->product_user_id,$this->product_img,$this->product_detail,$this->product_sub_detail,
                $this->option_price,$this->option_amount
                )
            )
        ):
            header('Location: ../popup.php?status_post=success&pagename=form_products&status=post');
            exit;
          else:
    
        endif;
    }
    public function delete(){
        $sql = "DELETE FROM $this->tableName WHERE 1=1 AND  product_id = '".$this->product_id."' ";
        $stmt = self::$pdo->query($sql);
        if($stmt){
            header("Location: ../popup.php?status_post=success&pagename=form_products&status=delete");
            exit;
        }else{
        }
    }
    public function updateStatus(){
        $sid = explode(',',$this->product_id);
        $ssid = $sid[1];
        if($ssid == '1'){
            $point = "2";
        }elseif($ssid == '2'){
            $point = "1";
        }
        $sql_insert = "UPDATE $this->tableName SET `product_status`= ? WHERE product_id = ?";
        $stmt_insert = self::$pdo->prepare($sql_insert);
        if($stmt_insert->execute(array($point,$sid[0]))):
            echo json_encode(array('status'=>"success"));
        else:

        endif;

    }
}
?>

