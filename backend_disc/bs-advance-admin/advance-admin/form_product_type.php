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
                <h2>ข้อมูลประเภทสินค้า</h2>
                <form role="form" action="./post_product.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>รหัสประเภท</label>
                        <input class="form-control" name="product_type_id" type="text">
                        <p class="help-block">หมายเลขประจำตัวของประเภทสินค้า</p>
                    </div>
                    <div class="form-group">
                        <label>ชื่อประเภท</label>
                        <input class="form-control" name="product_type_name" type="text">
                        <p class="help-block">ลงชื่อประเภทของสินค้า</p>
                    </div>
                    
                    <div class="form-group">
                        <label>สถานะใช้งาน</label><br>
                        <input type="radio" name="product_type_status" id="product_type_status" value="1"> เปิดใช้งาน &emsp;
                        <input type="radio" name="product_type_status" id="product_type_status" value="0"> ไม่ใช้งาน 
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดเพิ่มเติม</label>
                        <textarea class="form-control" name="product_type_detail" rows="3"></textarea>
                    </div>
              
             
                    <button type="submit" name="process" value="insert_product" class="btn btn-info">บันทึกลงฐานข้อมูลประเภทสินค้า</button>

                </form>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>หมายเลข</th>
                                    <th>ประเภท</th>
                                    <th>รายละเอียด</th>
                                    <th>สถานะการใช้งาน</th>
                                    <th>เพิ่ม / ลบ / แก้ไข</th>
                                   
                                </tr>
                            </thead>
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
