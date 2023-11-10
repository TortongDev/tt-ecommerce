<?php

require_once "../class/Connection.php";
require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkAdmin();

?>
<?php
    $db = new Connection(true);
    $sql = "SELECT * FROM `kanji_orders` WHERE 1=1  ORDER BY ORDER_ID DESC";
    $stmt = Connection::$pdo->query($sql);

       
    $section_3 = Connection::$pdo->query("SELECT * FROM `kanji_orders` WHERE 1=1  ORDER BY ORDER_ID DESC"); // ยังชำระแล้ว
    
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>รายงานขายสินค้า</h2>
                                <div class="export_all">
                                    <div class="btn-excel"><a href="./services/export/export_report_sell.php" class="btn btn-primary">Export Excel</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-10 mt-3">
                                <div class="row mt-3">
                                    <div class="col-md-5">
                                    <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                    <input type="text" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>หมายเลขรายการสั่งซื้อ</th>
                                    <th>ชื่อผู้สั่งซื้อ</th>
                                    <th>ที่อยู่</th>
                                    <th>รายการสินค้า</th>
                                    <th>ราคา</th>
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
                                    <td>
                                    <?php
                                            $select_sql = "SELECT * FROM kanji_order_list WHERE ORDER_ID = ?";
                                            $query = Connection::$pdo->prepare($select_sql);
                                            $query->execute([$R['ORDER_ID']]);
                                            $N = 0;
                                            while ($SR = $query->fetch(PDO::FETCH_ASSOC)):
                                            $N++;
                                        ?>
                                            <?php echo $N.'. '.$SR['PRODUCT_NAME'].'<br>'; ?>
                                        <?php endwhile; ?>
                                    </td>
                                    <td><?php echo $R['PRICE_ALL']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
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
