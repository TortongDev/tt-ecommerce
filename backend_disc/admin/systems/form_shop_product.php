<?php

require_once "../../../autoload_class.php";
$connection = new Connection(true);
// $connection
require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkAdmin();
$stmt_select = $connection->pdo->prepare("SELECT * FROM kanji_partners WHERE ?");
$stmt_select->execute(array('1=1'));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
   

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

    <link href="./assets/css/switch.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
     <?php include "./header-template.php"; ?>
      <?php include "./aside-template.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>ลงชื่อร้าน Partner</h2>
                <form role="form" action="./post_partners.php" enctype="multipart/form-data" method="post">
                    <!-- <div class="form-group">
                        <label>รหัส Partner</label>
                        <input class="form-control" name="partner_member_id" type="text">
                        <p class="help-block">หมายเลขประจำตัวของร้านค้า Partner</p>
                    </div> -->
                    <div class="form-group">
                        <label>ชื่อ Partner</label>
                        <input class="form-control" name="partner_name" type="text">
                        <p class="help-block">ร้าน Partner ชื่อ</p>
                    </div>
                    
                    <div class="form-group">
                        <label>สถานะใช้งาน</label><br>
                        <input type="radio" name="partner_status" id="partner_status" value="1"> เปิดใช้งาน &emsp;
                        <input type="radio" name="partner_status" id="partner_status" value="0"> ไม่ใช้งาน 
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดเพิ่มเติม</label>
                        <textarea class="form-control" name="partner_detail" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>ภาพพื้นหลัง</label>
                        <input  type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                    </div>
              
             
                    <button type="submit" name="process" value="insert_partners" class="btn btn-info">บันทึกลงฐานข้อมูลประเภทสินค้า</button>

                </form>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>หมายเลข</th>
                                    <th>ชื่อร้าน Partners</th>
                                    <th>รายละเอียด</th>
                                    <th>สถานะการใช้งาน</th>
                                    <th>เพิ่ม / ลบ / แก้ไข</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;  
                                    while($r = $stmt_select->fetch(PDO::FETCH_ASSOC)): 
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $r['partner_member_id']. $r['partner_id']; ?></td>
                                    <td><?php echo $r['partner_name']; ?></td>
                                    <td><?php echo $r['partner_detail']; ?></td>
                                    <td>
                                        <label class="switch">
                                            <input 
                                             type="checkbox" 
                                             value="<?php echo $r['partner_id'].','.$r['partner_status']; ?>" 
                                             <?php echo ($r['partner_status'] == 1) ? 'checked' : ''; ?>
                                              @change="update_status">
                                            <span class="slider"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <!-- <button class="btn btn-warning">แก้ไข</button> -->
                                        <button class="btn btn-danger">ลบ</button>
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
