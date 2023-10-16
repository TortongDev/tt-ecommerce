<?php

require_once "../class/Connection.php";
require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkAdmin();

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
                                <h2>รายการสั่งซื้อที่ยังไม่ชำระ</h2><br>
                                <h5>30 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="?page=listCartSuccess">
                                <!-- <i class="fa fa-plug fa-5x"></i> -->
                                <!-- <h5>40 Task In Check</h5> -->
                                <h2>รายการสั่งซื้อที่ชำระแล้ว</h2><br>
                                <h5>10 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="?page=transportSuccess">
                                <!-- <i class="fa fa-dollar fa-5x"></i>
                                <h5>200K Pending</h5> -->
                                <h2>ส่งสินค้าแล้ว</h2><br>
                                <h5>1 รายการ</h5>
                            </a>
                        </div>
                    </div>
                   
                </div>
               

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>หมายเลขรายการสั่งซื้อ</th>
                                    <th>ชื่อผู้สั่งซื้อ</th>
                                    <th>ที่อยู่</th>
                                    <th>ราคา</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                    $db = new Connection(true);
                                    $sql = "";
                                    $stmt = "";
                                    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : '';
                                    switch ($page) {
                                        case 'listCartwait':
                                            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '2' ORDER BY ORDER_ID DESC";
                                            $stmt = Connection::$pdo->query($sql);
                                            break;
                                        case 'listCartSuccess':
                                            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '1' ORDER BY ORDER_ID DESC";
                                            $stmt = Connection::$pdo->query($sql);
                                            break;
                                        case 'transportSuccess':
                                            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 AND ORDER_STATUS = '0' ORDER BY ORDER_ID DESC";
                                            $stmt = Connection::$pdo->query($sql);
                                            break;
                                        default:
                                            $sql = "SELECT * FROM `kanji_orders` WHERE 1=1 ORDER BY ORDER_ID DESC";
                                            $stmt = Connection::$pdo->query($sql);
                                            break;
                                    }
                                    while($R = $stmt->fetch(PDO::FETCH_ASSOC)): 
                                ?>
                                <tr>
                                    <td><?php echo $R['ORDER_ID']; ?></td>
                                    <td><?php echo $R['ORDER_ID']; ?></td>
                                    <td><?php echo $R['ORDER_ID']; ?></td>
                                    <td><?php echo $R['ORDER_ID']; ?></td>
                                    <td><?php echo $R['ORDER_ID']; ?></td>
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
