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
     <?php include "./header-template.php"; ?>
      <?php include "./aside-template.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>เพิ่มสินค้า</h2>
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
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
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

   <?php include "./footer-template.php"; ?>


</body>
</html>
