<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">COMPANY NAME</a>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                admin
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>ตั้งค่าเว็บ<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>เปลี่ยน Banner</a>
                            </li>
                            <li>
                                <a href="notification.html"><i class="fa fa-bell "></i>แก้ไข Slide</a>
                            </li>
                             <li>
                                <a href="progress.html"><i class="fa fa-circle-o "></i>เพิ่ม Partner</a>
                            </li>
                        </ul>
                 
                    <li>
                        <li>
                            <a href="#"><i class="fa fa-desktop "></i>เพิ่มข้อมูลสินค้า<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>ประเภทสินค้า</a>
                                </li>
                                <li>
                                    <a href="notification.html"><i class="fa fa-bell ">เพิ่มร้านค้า</i></a>
                                </li>
                                 <li>
                                    <a href="progress.html"><i class="fa fa-circle-o "></i>สินค้า</a>
                                </li>
                            </ul>
                     
                        <li>
                        <a href="login.html"><i class="fa fa-sign-in "></i>เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <form role="form" action="./post_product.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>ชื่อสินค้า</label>
                        <input class="form-control" name="product_name" type="text">
                        <p class="help-block">กรอกชื่อสินค้า.</p>
                    </div>
                    <div class="form-group">
                        <label>ราคา/หน่วย</label>
                        <input class="form-control" name="product_price" type="text">
                        <p class="help-block">ราคา/หน่วย กรัม กิโลกรัม ชิ้น</p>
                    </div>
                    <div class="form-group">
                        <label>จำนวน/หน่วย</label>
                        <input class="form-control" name="product_amount" type="text">
                        <p class="help-block">จำนวน/หน่วย กรัม กิโลกรัม ชิ้น</p>
                    </div>
                    <!-- <input type="hidden" name="product_user_id" value="<?php @$_SESSION['product_user_id'];?>"> -->
                    <div class="form-group">
                        <label>รายละเอียดสินค้า</label>
                        <input class="form-control" name="product_detail" type="text">
                        <p class="help-block">รายละเอียดคร่าวๆ ของสินค้า</p>
                    </div>
                    <div class="form-group">
                        <label>ประเภทของสินค้า</label>
                        <input class="form-control" name="product_type_name" type="text">
                    <p class="help-block">เลือกประเภทของสินค้า</p>
                    </div>
                    <div class="form-group">
                        <label>ชื่อร้านค้า</label>
                        <input class="form-control" name="product_shop_name" type="text">
                    <p class="help-block">สินค้านี้มาจากร้านไหน</p>
                    </div>
                   <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดสินค้าในหน้าสินค้า</label>
                        <textarea class="form-control" name="product_sub_detail" rows="3"></textarea>
                    </div>
              
             
                    <button type="submit" name="process" value="insert_product" class="btn btn-info">Send Message </button>

                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>
