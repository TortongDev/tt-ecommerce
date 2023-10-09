<?php
require_once dirname(__DIR__)."/app/config/config_pach.php";
require_once PATCH_SLIDE;
require_once PATCH_CONNECTION;

use appSlide\Slide;

class SlideBanner extends Slide {
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
    public static function getAll(){
        $slide = new Slide(self::$pdo);
        $stmt = $slide->selectAll();
        while ($R  = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $R['slide_id'];
        }
        
    }
    public function selectAllStatus($status=2){
        $this->setSlideStatus($status);
        $stmt = $this->getAllStatus();
      
        while ($R =  $stmt->fetch(PDO::FETCH_ASSOC)) {  
            $picture = $R['slide_picture'];
            echo <<<SLIDE
                <div class="swiper-slide"><img style="" src="./app/views/uploads/$picture" alt=""></div>
            SLIDE;
        }
        $stmt = NULL;
    }
}
?>