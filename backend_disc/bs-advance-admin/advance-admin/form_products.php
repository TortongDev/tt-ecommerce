<?php
  
    require_once "../../../autoload_class.php";
    $connection = new Connection(true);
    require_once "./checkAdmin.php";
    $checkadmin = new checkAdmin;
    $checkadmin->checkAdmin();
    $stmt_ptype = $connection->pdo->prepare("SELECT * FROM kanji_product_type WHERE ?");
    $stmt_ptype->execute(array('1=1'));

    $stmt_partner = $connection->pdo->prepare("SELECT * FROM kanji_partners WHERE ?");
    $stmt_partner->execute(array('1=1'));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <
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
    <style>
        #group {
            position: relative;

        }
        .shopInfoSubDetail {
            background-color: white;
            border: 1px solid silver;
            border-radius: 3px;
            margin-top: -250px;
            cursor: pointer;
            padding: 10px;
            position: absolute;

        }
    </style>
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
                    <!-- <div class="form-group">
                        <label>หมายเลขสินค้า</label>
                        <input class="form-control" name="product_member_id" type="text" required>
                        <p class="help-block">กรอกหมายเลขสินค้า.</p>
                    </div> -->
                    <div class="form-group">
                        <label>ชื่อสินค้า</label>
                        <input class="form-control" name="product_name" type="text" required>
                        <p class="help-block">กรอกชื่อสินค้า.</p>
                    </div>
                    <div class="form-group">
                        <label>ราคา/หน่วย</label>
                        <div class="row">
                            <div class="col-md-6"><input class="form-control" name="product_price" type="text" required></div>
                            <div class="col-md-6">
                                <select class="form-control" name="option_price" required>
                                    <option value="กรัม">1 กรัม</option>
                                    <option value="กิโลกรัม">1 กิโลกรัม</option>
                                    <!-- <option value="กิโลกรัม">กิโลกรัม</option> -->
                                </select>
                            </div>
                        </div>
                        <p class="help-block">ราคา/หน่วย กรัม กิโลกรัม ชิ้น</p>
                    </div>
                    
                    <div class="form-group">
                    <label>จำนวน</label>
                    <div class="row">
                        <div class="col-md-6">
                                <input class="form-control" name="product_amount" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="option_amount" required>
                                    <option value="กรัม">กรัม</option>
                                    <option value="กิโลกรัม">กิโลกรัม</option>
                                    <!-- <option value="กิโลกรัม">กิโลกรัม</option> -->
                                </select>
                            </div>
                        </div>
                        <p class="help-block">จำนวนสินค้าที่มีในคลัง</p>
                    </div>
                    <!-- <input type="hidden" name="product_user_id" value="<?php @$_SESSION['product_user_id'];?>"> -->
                    <div class="form-group">

                        <label>รายละเอียดสินค้า</label>
                        <input class="form-control" name="product_detail" type="text" required>
                        <p class="help-block">รายละเอียดคร่าวๆ ของสินค้า</p>
                    </div>
                    <div class="form-group">
                        <label>ประเภทของสินค้า</label>
                        <select class="form-control" name="product_type_name" required>
                             <option value="">--เลือกข้อมูล--</option>
                            <?php while($ptype = $stmt_ptype->fetch(PDO::FETCH_ASSOC)): ?>
                            <option value="<?php echo $ptype['product_type_name']; ?>"><?php echo $ptype['product_type_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    <p class="help-block">เลือกประเภทของสินค้า</p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="partner_name" required>
                            <option value="">--เลือกข้อมูล--</option>
                            <?php while($partner = $stmt_partner->fetch(PDO::FETCH_ASSOC)): ?>
                            <option value="<?php echo $partner['partner_name']; ?>"><?php echo $partner['partner_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                   <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="form-group" id="group">
                        <div class="shopInfoSubDetail" v-show="shopInfoSubDetail">
                            <img src="./assets/img/info-detail.png"  style="width: 500px;" alt="">
                        </div>
                        <label>รายละเอียดการจัดสินค้าในหน้าสินค้า <i @mouseover="shopInfoSubDetail = true" @mouseout="shopInfoSubDetail = false" class="fa fa-info-circle" aria-hidden="true"></i></label>
                        <textarea class="form-control" name="product_sub_detail" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="process" value="insert_partners" class="btn btn-info">บันทึกข้อมูลสินค้าลงฐานข้อมูล</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
   <?php include "./footer-template.php"; ?>
</body>
<script>
    const app = Vue.createApp({
        data() {
            return {
                shopInfoSubDetail: false
            }
        },methods: {
            fshopInfoSubDetail(){
                this.shopInfoSubDetail = true
            }
        },
    })
    app.mount('#wrapper')
</script>
</html>
