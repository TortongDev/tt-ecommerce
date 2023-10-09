<?php
namespace appPartner;
use APP\CLASS\AdditionalMethods;
class Partner extends AdditionalMethods
{
    public $partner_id;
    public $partner_member_id;
    public $partner_name;
    public $partner_detail;
    public $partner_status;
    public $partner_img;
    public static $pdo;

    public function __construct($pdo)
    {
        self::$pdo = $pdo;
    }
    public function __destruct(){
        self::$pdo = NULL;
    }
    public function getPartnerID(){
        return $this->partner_id;
    } 
    public function getPartnerMemberID(){
        return $this->partner_member_id;
    } 
    public function getPartnerName(){
        return $this->partner_name;
    } 
    public function getPartnerDetail(){
        return $this->partner_detail;
    } 
    
    public function getPartnerStatus(){
        return $this->partner_status;
    } 
    public function getPartnerImage(){
        return $this->partner_img;
    } 
    public function setPartnerID($partner_id){
        $this->partner_id = $partner_id;
    } 

    public function setPartnerMemberID($partner_member_id){
        $this->partner_member_id = $partner_member_id;
    } 

    public function setPartnerName($partner_name){
        $this->partner_name = $partner_name;
    } 

    public function setPartnerDetail($partner_detail){
        $this->partner_detail = $partner_detail;
    } 

    public function setPartnerStatus($partner_status){
        $this->partner_status = $partner_status;
    } 

    public function setPartnerImage($partner_img){
        $this->partner_img = $partner_img;
    } 


    public static function selectAll(){
        $sql = "SELECT * FROM kanji_partners WHERE ? ";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(array('1=1'));
        $fetchArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }
    public function save(){
        $sql = "INSERT INTO `kanji_partners`(
            `partner_member_id`, 
            `partner_name`, 
            `partner_detail`, 
            `partner_status`,
            partner_img
            ) VALUES (?,?,?,?,?)";
        $stmt = self::$pdo->prepare($sql);
        if($stmt->execute(array($this->partner_member_id,$this->partner_name,$this->partner_detail,$this->partner_status,$this->partner_img))):
            // header("Location: ".dirname(__DIR__).'/views/popup.php?status_post=success&pagename=form_shop_product&status=post');
            header('Location: ../popup.php?status_post=success&pagename=form_shop_product&status=post');
            exit;
          else:
    
        endif;
    }
    public function delete(){
        $sql = "DELETE FROM `kanji_partners` WHERE 1=1 AND  partner_id = '".$this->getPartnerID()."' ";
        $stmt = self::$pdo->query($sql);
        if($stmt){
            header("Location: ../popup.php?status_post=success&pagename=form_shop_product&status=delete");
            exit;
        }else{
            echo "DELETE FROM `kanji_partners` WHERE 1=1 AND  partner_id = '".$this->getPartnerID()."' ";;
        }
    }
    public function updateStatus(){
        $sid = explode(',',$this->id);
        $ssid = $sid[1];
        if($ssid == '1'){
            $point = "2";
        }elseif($ssid == '2'){
            $point = "1";
        }
        $sql_insert = "UPDATE `kanji_banners` SET `banner_status`= ? WHERE banner_id = ?";
        $stmt_insert = self::$pdo->prepare($sql_insert);
        if($stmt_insert->execute(array($point,$sid[0]))):
            echo json_encode(array('status'=>"success"));
        else:

        endif;

    }
}
?>