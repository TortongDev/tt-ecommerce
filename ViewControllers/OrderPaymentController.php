<?php
require_once dirname(__DIR__)."/app/config/config_pach.php";
require_once PATCH_OP;
require_once PATCH_CONNECTION;
use appOrderPayment\OrderPayment;
class OrderPaymentController extends OrderPayment {
    public static $pdo;

    public function __construct($pdo){
        self::$pdo = $pdo;
    }
    public function insert(){
        $sql = "INSERT INTO `kanji_payment`(`PAYMENT_NAME`, `PAYMENT_IMG`, `PAYMENT_USERNAME`, `PAYMENT_PRICE`, `PAYMENT_ORDER_ID`,AUTHEN_USER_ID) VALUES (?,?,?,?,?,?)";
        $stmtInsert = self::$pdo->prepare($sql);
        $stmtInsert->execute(array($this->PAYMENT_NAME,$this->PAYMENT_IMG,$_SESSION['AUTHEN_USERNAME'],$this->PAYMENT_PRICE,$_SESSION['ORDERID'],$_SESSION['AUTHEN_USER_ID']));
    }
    public function updateStatusOrder(){
        $sql = "
            UPDATE
                `kanji_orders`
            SET
            
                `ORDER_STATUS` = '1'
            WHERE
                1=1
            AND `ORDER_ID` = ? 
        ";
        $stmtInsert = self::$pdo->prepare($sql);
        $stmtInsert->execute(array($this->ORDER_ID));
        
    }
   
}
$db = new Connection();
$db->openConnection();
$controller = new OrderPaymentController(Connection::$pdo); 
$target_dir = "../app/views/uploads/";
$target_file = $target_dir . basename(@$_FILES["fileToUpload"]["name"]);
// Handle the file upload (you need to validate and move the file)
move_uploaded_file(@$_FILES["fileToUpload"]["tmp_name"], $target_file);
// $controller->uploadPicture($target_dir,$target_file,$target_name);
$controller->setPAYMENT_NAME($_POST['FIST_NAME']);
$controller->setPAYMENT_PRICE($_POST['PAYMENT_PRICE']);
$controller->setPAYMENT_ORDER_ID($_POST['PAYMENT_ORDER_ID']);
$controller->setPAYMENT_IMG($_POST['fileToUpload']);


$controller->insert();
sleep(1);
$controller->setORDER_ID($_POST['PAYMENT_ORDER_ID']);
$controller->updateStatusOrder();
$controller = NULL;
$db = NULL;

echo json_encode(array('status'=>'success'));
exit;
?>