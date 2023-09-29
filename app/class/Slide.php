<?php


class Slide extends AdditionalMethods
{
    public $slide_id;
    public $slide_picture;
    public $slide_header;
    public $slide_content;
    public $slide_status;
    public static $pdo;

    public function __construct($pdo)
    {
        self::$pdo = $pdo;
    }
    public function __destruct(){
        self::$pdo = NULL;
    }
    public function getSlideID(){
        return $this->slide_id;
    } 
    public function getSlidePicture(){
        return $this->slide_picture;
    } 
    public function getSlideHeader(){
        return $this->slide_header;
    } 
    public function getSlideContent(){
        return $this->slide_content;
    } 
    
    public function getSlideStatus(){
        return $this->slide_status;
    } 
    public function setSlideID($slide_id){
        $this->slide_id = $slide_id;
    } 

    public function setSlidePicture($slide_picture){
        $this->slide_picture = $slide_picture;
    } 

    public function setSlideHeader($slide_header){
        $this->slide_header = $slide_header;
    } 

    public function setSlideContent($slide_content){
        $this->slide_content = $slide_content;
    } 

    public function setSlideStatus($slide_status){
        $this->slide_status = $slide_status;
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
            INSERT INTO `kanji_slide`(`slide_picture`, `slide_header`, `slide_content`) 
            VALUES (?,?,?)
        ";
        $stmt = self::$pdo->prepare($sql);
        if($stmt->execute(array($this->slide_picture,$this->slide_header,$this->slide_content))):
            header('Location: ../popup.php?status_post=success&pagename=slide-config&status=post');
            exit;
          else:
    
        endif;
    }
    public function delete(){
        $sql = "DELETE FROM `kanji_slide` WHERE 1=1 AND  slide_id = '".$this->slide_id."' ";
        $stmt = self::$pdo->query($sql);
        if($stmt){
            header("Location: ../popup.php?status_post=success&pagename=slide-config&status=delete");
            exit;
        }else{
            echo "DELETE FROM `kanji_partners` WHERE 1=1 AND  partner_id = '".$this->getPartnerID()."' ";;
        }
    }
    public function updateStatus(){
        $sid = explode(',',$this->slide_id);
        $ssid = $sid[1];
        if($ssid == '1'){
            $point = "2";
        }elseif($ssid == '2'){
            $point = "1";
        }
        $sql_insert = "UPDATE `kanji_slide` SET `slide_status`= ? WHERE slide_id = ?";
        $stmt_insert = self::$pdo->prepare($sql_insert);
        if($stmt_insert->execute(array($point,$sid[0]))):
            echo json_encode(array('status'=>"success"));
        else:

        endif;

    }
}
?>