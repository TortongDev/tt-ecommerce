<?php

require_once dirname(__DIR__)."/app/config/config_pach.php";
require_once PATCH_PARTNER;
require_once PATCH_CONNECTION;
use appPartner\Partner;
class PartnerController extends Partner {
    public static $pdo;
    public function __construct()
    {
        
        $db = new Connection(true);
        self::$pdo = Connection::$pdo;

    }
    public function __destruct()
    {
        parent::$pdo = NULL;
        self::$pdo = NULL;
    }

    public function selectPartnerIndex($status=2){
        $this->setPartnerStatus($status);
        $stmt_partner = self::$pdo->prepare("SELECT * FROM `kanji_partners` WHERE ? AND partner_status = ? ORDER BY timestamp DESC LIMIT 6");
        $stmt_partner->execute(array('1=1',$this->partner_status));
        while ($R_PARTNERs =  $stmt_partner->fetch(PDO::FETCH_ASSOC)) {  
            $picture = $R_PARTNERs['partner_img'];
            $partner_name = $R_PARTNERs['partner_name'];
            $partner_detail = $R_PARTNERs['partner_detail'];
            $timestamp = $R_PARTNERs['timestamp'];
            echo <<<SLIDE
                <article class="logger-partner">
                    <div class="partner img-action" style="background-image: url('./app/views/uploads/$picture');background-size: cover;">
                        <h2 class="margin-block-0">$partner_name</h2>
                        <h4 class="sub-text margin-block-0">$partner_name</h4>
                        <h4 class="main-text margin-block-0"> $partner_detail</h4>
                        <h4 class="main-text margin-block-0"> $timestamp </h4>
                    </div>
                </article>
            SLIDE;
        }
        $stmt = NULL;
        
    }
}
?>