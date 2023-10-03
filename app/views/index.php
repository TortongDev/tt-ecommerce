<?php
session_start();
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
                            <a href="#">
                                <!-- <i class="fa fa-bolt fa-5x"></i> -->
                                <h2>รอจัดส่ง</h2><br>
                                <h5>30 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <!-- <i class="fa fa-plug fa-5x"></i> -->
                                <!-- <h5>40 Task In Check</h5> -->
                               
                                <h2>ยื่นชำระเงิน</h2><br>
                                <h5>10 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <!-- <i class="fa fa-dollar fa-5x"></i>
                                <h5>200K Pending</h5> -->
                                <h2>ยังไม่ชำระเงิน</h2><br>
                                <h5>1 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <!-- <i class="fa fa-bolt fa-5x"></i> -->
                                <h2>จำนวนสั่งซื้อประจำเดือน</h2><br>
                                <h5>300 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <!-- <i class="fa fa-plug fa-5x"></i> -->
                                <!-- <h5>40 Task In Check</h5> -->
                               
                                <h2>จำนวนสั่งซื้อประจำปี</h2><br>
                                <h5>10,390 รายการ</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <!-- <i class="fa fa-dollar fa-5x"></i>
                                <h5>200K Pending</h5> -->
                                <h2>จำนวนสั่งซื้อทั้งหมด</h2><br>
                                <h5>134,324 รายการ</h5>
                            </a>
                        </div>
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
