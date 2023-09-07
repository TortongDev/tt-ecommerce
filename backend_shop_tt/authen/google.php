<?php
require_once '../../vendor/autoload.php'; // โหลด API Client Library
require_once "../class/Connection.php";
$db = new Connection(true);
session_start();

$client = new Google_Client();
$client->setClientId('999373250345-vlred5ig4863mru4g4hcqla9r5k3f45o.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://kanjikorat.000webhostapp.com');
$client->addScope('email'); // ระบุสิทธิ์ที่คุณต้องการ
if (isset($_GET['code'])) {
    $client->fetchAccessTokenWithAuthCode($_GET['code']); // รับโทเคนจากรหัสอนุญาต

    // รับข้อมูลผู้ใช้จากบัญชี Google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_user_info = $google_oauth->userinfo->get();
    // ตรวจสอบว่าผู้ใช้นี้มีบัญชีในระบบของคุณหรือไม่
    $user_id = getUserIDFromDatabase($google_user_info->getId(),$db);
    if (!$user_id) {
        // ถ้าไม่มีบัญชีในระบบของคุณ สร้างบัญชีใหม่
        $user_id = createUserInDatabase($google_user_info->getId(), $google_user_info->getEmail(),$db);
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

function getUserIDFromDatabase($google_id,$db) {
   

    $query = "SELECT user_id FROM authen_user WHERE google_id = '$google_id'";
    $result = $db->query($query);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            return $row['user_id'];
        }
    } else {
        return false;
    }
}

function createUserInDatabase($google_id, $email,$db) {
    $query = "INSERT INTO authen_user (google_id, email) VALUES (?,?)";
    $query1 = $db->query($query);
    $query1->execute(array($google_id,$email));
    // if ($db->query($query) === TRUE) {
    //     return $db->insert_id;
    // } else {
    //     die("Error: " . $query . "<br>" . $db->error);
    // }
}
?>
