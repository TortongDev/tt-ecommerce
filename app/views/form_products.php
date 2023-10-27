﻿<?php
  
    require_once "./autoload_class.php";
    $connection = new Connection(true);
    $stmt_ptype = Connection::$pdo->prepare("SELECT * FROM kanji_product_type WHERE ?");
    $stmt_ptype->execute(array('1=1'));

    $stmt_partner = Connection::$pdo->prepare("SELECT * FROM kanji_partners WHERE ?");
    $stmt_partner->execute(array('1=1'));

    $stmt_product = Connection::$pdo->prepare('SELECT * FROM kanji_products WHERE ? ORDER BY product_id DESC');
    $stmt_product->execute(array('1=1'));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Backend Management</title>
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
                <form role="form" action="./services/post_product.php" enctype="multipart/form-data" method="post">
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
                    
                    </div>
                    <div class="form-group">
                    <label class="help-block">เลือก Partner</label>
                        <select class="form-control" name="product_shop_name" required>
                            <option value="">--เลือกข้อมูล--</option>
                            <?php while($partner = $stmt_partner->fetch(PDO::FETCH_ASSOC)): ?>
                            <option value="<?php echo $partner['partner_name']; ?>"><?php echo $partner['partner_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label class="help-block">ระดับสินค้า</label>
                        <select class="form-control" name="product_star" required>
                            <option value="">--เลือกข้อมูล--</option>
                            <option value="1">1 ดาว</option>
                            <option value="2">2 ดาว</option>
                            <option value="3">3 ดาว</option>
                            <option value="4">4 ดาว</option>
                            <option value="5">5 ดาว</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label class="help-block">ป้าย Tag</label>
                        <select class="form-control" name="STATUS_SELLER" required>
                            <option value="">--เลือกข้อมูล--</option>
                            <option value="1">สินค้าขายดี</option>
                            <option value="2">สินค้าแนะนำ</option>
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
                
                <br>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา / หน่วย</th>
                            <th>ประเภทสินค้า</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            while($RP_PRODUCT = $stmt_product->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <tr>
                            <td><?php echo $i=$i+1; ?></td>
                            <td><img src="./<?php echo $RP_PRODUCT['product_img'];?>" width="200" height="100"></td>
                            <td><?php echo $RP_PRODUCT['product_name'];?></td>
                            <td><?php echo $RP_PRODUCT['product_price'];?></td>
                            <td><?php echo $RP_PRODUCT['product_type_name'];?></td>
                            <td>
                                        <label class="switch">
                                            <input 
                                             type="checkbox" 
                                             value="<?php echo $RP_PRODUCT['product_id'].','.$RP_PRODUCT['product_status']; ?>" 
                                             <?php echo ($RP_PRODUCT['product_status'] == 1) ? 'checked' : ''; ?>
                                              @change="update_status">
                                            <span class="slider"></span>
                                        </label> 
                            </td>
                            <td><a href="./services/delete.php?process=add_product&option=delete&id=<?php echo $RP_PRODUCT['product_id']; ?>" class="btn btn-danger">ลบ</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

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
