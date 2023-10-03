<?php


class ProductType extends AdditionalMethods
{
    public $type_id ;
    public $product_type_id;
    public $product_type_name;
    public $product_type_detail;
    public $product_type_status;
    public $tableName = "kanji_product_type";
    public static $pdo;

    public function __construct($pdo)
    {
        self::$pdo = $pdo;
    }
    public function __destruct(){
        self::$pdo = NULL;
    }
    public function getTypeID(){
        return $this->type_id;
    } 
    public function getProductTypeID(){
        return $this->product_type_id;
    } 
    public function getProductTypeName(){
        return $this->product_type_name;
    } 
    public function getProductTypeStatus(){
        return $this->product_type_status;
    } 
    public function getProductTypeDetail(){
        return $this->product_type_detail;
    } 
    
    

    public function setTypeID($type_id){
        $this->type_id = $type_id;
    } 

    public function setProductTypeID($product_type_id){
        $this->product_type_id = $product_type_id;
    } 

    public function setProductTypeName($product_type_name){
        $this->product_type_name = $product_type_name;
    } 
    public function setProductTypeStatus($product_type_status){
        $this->product_type_status = $product_type_status;
    } 

    public function setProductTypeDetail($product_type_detail){
        $this->product_type_detail = $product_type_detail;
    } 


    public static function selectAll(){
        $sql = "SELECT * FROM kanji_partners WHERE ? ";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(array('1=1'));
        $fetchArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }
    public function save(){
        $sql = "
            INSERT INTO {$this->tableName} (  
                `product_type_id`, 
                `product_type_name`,
                `product_type_detail`,
                `product_type_status` 
            ) 
            VALUES (?,?,?,?)
        ";
        $stmt = self::$pdo->prepare($sql);
        if($stmt->execute(array($this->product_type_id,$this->product_type_name,$this->product_type_detail,$this->product_type_status))):
            header('Location: ../popup.php?status_post=success&pagename=form_product_type&status=post');
            exit;
          else:
    
        endif;
    }
    public function delete(){
        $sql = "DELETE FROM {$this->tableName} WHERE 1=1 AND  type_id = '".$this->type_id."' ";
        $stmt = self::$pdo->query($sql);
        if($stmt){
            header("Location: ../popup.php?status_post=success&pagename=form_product_type&status=delete");
            exit;
        }else{
            echo json(array("false"));
        }
    }
    public function updateStatus(){
        $sid = explode(',',$this->type_id);
        $ssid = $sid[1];
        var_dump($this->type_id);
        echo $ssid;
        if($ssid == '1'){
            $point = "2";
        }elseif($ssid == '2'){
            $point = "1";
        }
        $sql_insert = "UPDATE {$this->tableName} SET `product_type_status`= ? WHERE type_id = ?";
        $stmt_insert = self::$pdo->prepare($sql_insert);
        if($stmt_insert->execute(array($point,$sid[0]))):
            echo json_encode(array('status'=>"success"));
        else:

        endif;

    }
}
?>