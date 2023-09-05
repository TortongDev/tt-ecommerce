
<?php
require_once "../vendor/autoload.php";
require_once "./class/Connection.php";



$db = new Connection(true);

session_start();

$client = new Google_Client();
$client->setClientId('969098766658-cs0dea0r4pru6hdiea0g409d9o3dmher.apps.googleusercontent.com');
$client->setClientSecret("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");
$client->setRedirectUri('https://kanjikorat.000webhostapp.com'); // ระบุ URI ที่คุณได้กำหนด
$client->addScope('email'); // ระบุสิทธิ์ที่คุณต้องการ


$authUrl = $client->createAuthUrl(); // สร้าง URL สำหรับการเข้าสู่ระบบผ่าน Google
echo $authUrl;
echo "<a href='$authUrl'>เข้าสู่ระบบผ่าน Google</a>";

exit;
if (isset($_GET['code'])) {
    $client->fetchAccessTokenWithAuthCode($_GET['code']); // รับโทเคนจากรหัสอนุญาต

    // รับข้อมูลผู้ใช้จากบัญชี Google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_user_info = $google_oauth->userinfo->get();

    // ตรวจสอบว่าผู้ใช้นี้มีบัญชีในระบบของคุณหรือไม่
    $user_id = getUserIDFromDatabase($google_user_info->getId());
    
    function getUserIDFromDatabase($google_id){
        $db = new Connection(true);
        $stmt_select = $db->pdo->prepare('SELECT * FROM authen_user_api WHERE 1=1 AND authen_id = ?');
        $stmt_select->execute(array($google_id));
        while ($rCheck = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            return $rCheck['user_id'];
        }
    }
   
    if (!$user_id) {
        // ถ้าไม่มีบัญชีในระบบของคุณ สร้างบัญชีใหม่
        createUserInDatabase($google_user_info->getId(), $google_user_info->getEmail());
        function createUserInDatabase($google_id,$platformAPI){
            $db = new Connection(true);
            $stmt_insert = $db->pdo->prepare('INSERT INTO `authen_user_api`(`authen_id`, `platformAPI`) VALUES (?,?)');
            $stmt_insert->execute(array($google_id,$platformAPI)); 
        }
    }
    // ลงชื่อเข้าใช้
    $_SESSION['user_id'] = $user_id;
    // ลิงก์ไปยังหน้าหลังล็อกอินของคุณหรือทำในที่อื่นตามความเหมาะสม
    header('Location: dashboard.php');
    exit;
} else {
    $authUrl = $client->createAuthUrl(); // สร้าง URL สำหรับการเข้าสู่ระบบผ่าน Google
    echo "<a href='$authUrl'>เข้าสู่ระบบผ่าน Google</a>";
}




?>