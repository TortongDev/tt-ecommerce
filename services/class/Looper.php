<?php 
    class Looper {
        public static $pdo;
        public function __construct($db){
           self::$pdo   = $db;
        }
        public function fetch_slide(){
            $stmt_slide = $checkAuthen->pdo->prepare(
                "SELECT `slide_id`, `slide_picture`, `slide_header`, `slide_content`, `slide_status`, `slide_timestamp` 
                FROM `kanji_slide` WHERE  ? AND `slide_status` = '1' ORDER BY slide_timestamp DESC
                ");
            $stmt_slide->execute(array('1=1'));
           
            while ($R =  $stmt_slide->fetch(PDO::FETCH_ASSOC)) {
                $picture = $R['slide_picture'];
                echo <<<SLIDE
                <div class="swiper-slide"><img style="" src="./app/views/uploads/$picture" alt=""></div>
                SLIDE;
            }
        }
    }



?>

