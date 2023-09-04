<?php

    $key = "skey1";
    $data = "13"; // ข้อมูลที่คุณต้องการเข้ารหัส
    $iv = random_bytes(16); // สร้างเวกเตอร์เริ่มต้นขนาด 16 ไบต์ (128 บิต) สำหรับการเข้ารหัสแบบการใช้ IV (Initialization Vector)
    $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
//    $decrypted_data = openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv);
    echo $encrypted_data;
?>