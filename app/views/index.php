<?php

require_once "../class/Connection.php";
require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkAdmin();

?>
<?php
    $db = new Connection(true);
    $sql = "";
    $stmt = "";
    $TOPIC = "";
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : '';
    switch ($page) {
        case 'listCartwait':
            $TOPIC = "ยังไม่ชำระ";
            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '3' ORDER BY ORDER_ID DESC";
            $stmt = Connection::$pdo->query($sql);

            break;
        case 'paymentSuccess':

            $TOPIC = "รายการสั่งซื้อที่รอดำเนินการ";
            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '1' ORDER BY ORDER_ID DESC";
            $stmt = Connection::$pdo->query($sql);
            break;
        case 'listCartSuccess':

            $TOPIC = "ชำระเงินแล้ว";
            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '2' ORDER BY ORDER_ID DESC";
            $stmt = Connection::$pdo->query($sql);

          
            break;
        default:
        
            $TOPIC = "ทั้งหมด";
            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 ORDER BY ORDER_ID DESC";
            $stmt = Connection::$pdo->query($sql);



           

        break;
    }
    $section_1 = Connection::$pdo->query("SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '1' ORDER BY ORDER_ID DESC"); // ขนส่งสำเร็จ
    $section_2 = Connection::$pdo->query("SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '2' ORDER BY ORDER_ID DESC"); // ชำระแล้ว
    $section_3 = Connection::$pdo->query("SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '3' ORDER BY ORDER_ID DESC"); // ยังชำระแล้ว
    
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Backend Management</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
     <?php include "./header-template.php"; ?>
      <?php include "./aside-template.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
          
           
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
   <?php include "./footer-template.php"; ?>
</body>
</html>
