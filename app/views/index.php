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
            <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="?page=listCartwait">
                                <!-- <i class="fa fa-bolt fa-5x"></i> -->
                                <h2>ยังไม่ชำระ</h2><br>
                                <h5><?php echo $section_3->rowCount(); ?> รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="?page=listCartSuccess">
                                <!-- <i class="fa fa-plug fa-5x"></i> -->
                                <!-- <h5>40 Task In Check</h5> -->
                                <h2>รอดำเนินการ</h2><br>
                                <h5><?php echo $section_2->rowCount(); ?> รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="?page=paymentSuccess">
                                <!-- <i class="fa fa-dollar fa-5x"></i>
                                <h5>200K Pending</h5> -->
                                <h2>ชำระเสร็จสมบูรณ์</h2><br>
                                <h5><?php echo $section_1->rowCount(); ?> รายการ</h5>
                            </a>
                        </div>
                    </div>
                   
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php echo $TOPIC; ?></h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>หมายเลขรายการสั่งซื้อ</th>
                                    <th>ชื่อผู้สั่งซื้อ</th>
                                    <th>ที่อยู่</th>
                                    <th>ราคา</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                  
                                <?php 
                                    $NUMBER_COUNT = 0;
                                    while($R = $stmt->fetch(PDO::FETCH_ASSOC)): 
                                ?>
                                <tr>
                                    <td><?php echo $NUMBER_COUNT = $NUMBER_COUNT + 1; ?></td>
                                    <td><?php echo $R['ORDER_ID']; ?></td>
                                    <td><?php echo $R['FIST_NAME']; ?></td>
                                    <td><?php echo "บ้านเลขที่{$R['ADDRESS_NUMBER']} หมู่{$R['ADDRESS_MOO']} บ้าน{$R['ORDER_ID']} ตำบล{$R['TUMBON']} อำเภอ{$R['AMPHOR']} จังหวัด{$R['JUNGWAT']} {$R['PROVINCE']}"; ?></td>
                                    <td><?php echo $R['ORDER_STATUS']; ?></td>
                                    <td>
                                        <?php 
                                            if ($R['ORDER_STATUS'] == '2'):
                                                echo "<a href='./services/update_status_order.php?oid={$R['ORDER_ID']}' class='btn btn-warning'>ยืนยัน (ชำระเงิน)</a>";
                                            elseif($R['ORDER_STATUS'] == '3'):
                                                echo '<a href="" class="btn btn-secondaly">ยังไม่ชำระเงิน</a>';
                                            else:
                                                echo '<a href="" class="btn btn-success"> ชำระเงินแล้ว</a>';
                                            endif;
                                        ?>
                                        </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
   <?php include "./footer-template.php"; ?>
</body>
</html>
