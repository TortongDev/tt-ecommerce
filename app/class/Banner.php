<?php

namespace appBanner;

require_once PATCH_ADDITIONAL_METHODE;
use APP\CLASS\AdditionalMethods;

class Banner extends AdditionalMethods
{
    public $id;
    public $bannerName;
    public $picture;
    public static $pdo;

    public function __construct($pdo)
    {
        self::$pdo = $pdo;
    }
    public function __destruct(){
        self::$pdo = NULL;
    }
    public function getBannerID(){
        return $this->id;
    } 
    public function getBannerName(){
        return $this->bannerName;
    } 
    public function getBannerPicture(){
        return $this->picture;
    } 
    public function setBannerID($id){
        $this->id = $id;
    } 
    public function setBannerName($bannerName){
        $this->bannerName = $bannerName;
    } 
    public function setBannerPicture($picture){
        $this->picture = $picture;
    } 
    public static function selectAll(){
        $sql = "SELECT * FROM kanji_banners WHERE ? ";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(array('1=1'));
        $fetchArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }
    public function save(){
        $sql = "INSERT INTO kanji_banners (banner_topic,picture) VALUES ( ? , ? )";
        $stmt = self::$pdo->prepare($sql);
        if($stmt->execute(array($this->bannerName,$this->picture))):
            header("Location: ../popup.php?status_post=success&pagename=banner-config-home&status=post");
            exit;
          else:
    
        endif;
    }
    public function delete($id){
        $this->id = $id;
        $sql = "DELETE FROM `kanji_banners` WHERE 1=1 AND  banner_id = '".$this->id."' ";
        $stmt = self::$pdo->query($sql);
            
        if($stmt){
            header("Location: ../popup.php?status_post=success&pagename=banner-config-home&status=delete");
            exit;
        }else{
            echo "0";
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