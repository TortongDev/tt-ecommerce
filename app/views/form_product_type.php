<?php
   
    require_once "./autoload_class.php";
    $connection = new Connection(true);
    require_once "./checkAdmin.php";
    $checkadmin = new checkAdmin;
    $checkadmin->checkAdmin();
    // $connection
    $stmt_select = Connection::$pdo->prepare("SELECT * FROM kanji_product_type WHERE ? ORDER BY sys_timestamp DESC");
    $stmt_select->execute(array('1=1'));
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

    <link href="./assets/css/switch.css" rel="stylesheet" type="text/css">
    
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
   
</head>
<body>
    <div id="wrapper">
     <?php include "./header-template.php"; ?>
      <?php include "./aside-template.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>ข้อมูลประเภทสินค้า</h2>
                <form role="form" action="./services/post_product_type.php" enctype="multipart/form-data" method="post">
                    <!-- <div class="form-group">
                        <label>รหัสประเภท</label>
                        <input class="form-control" name="product_type_id" type="text">
                        <p class="help-block">หมายเลขประจำตัวของประเภทสินค้า</p>
                    </div> -->
                    <div class="form-group">
                        <label>ชื่อประเภท</label>
                        <input class="form-control" name="product_type_name" type="text">
                        <p class="help-block">ลงชื่อประเภทของสินค้า</p>
                    </div>
                    
                    <div class="form-group">
                        <label>สถานะใช้งาน</label><br>
                        <input type="radio" name="product_type_status" id="product_type_status" value="1"> เปิดใช้งาน &emsp;
                        <input type="radio" name="product_type_status" id="product_type_status" value="2"> ไม่ใช้งาน 
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
                                    <th/</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="app">
                                <?php
                                    $i = 1;  
                                    while($r = $stmt_select->fetch(PDO::FETCH_ASSOC)): 
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $r['product_type_id'] ?></td>
                                    <td><?php echo $r['product_type_name']; ?></td>
                                    <td><?php echo $r['product_type_detail']; ?></td>
                                    <td>
                                        <label class="switch">
                                            <input 
                                             type="checkbox" 
                                             value="<?php echo $r['type_id'].','.$r['product_type_status']; ?>" 
                                             <?php echo ($r['product_type_status'] == 1) ? 'checked' : ''; ?>
                                              @change="update_status">
                                            <span class="slider"></span>
                                        </label>
                                    </td>
                                    
                                    <td>
                                        <!-- <button class="btn btn-warning">แก้ไข</button> -->
                                        <a class="btn btn-danger" href="./services/delete.php?process=product_type&id=<?php echo $r['type_id']; ?>&option=delete">ลบ</a>
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
        <script>
            const app = Vue.createApp({
                data() {
                    return {
                        id: '',
                        status: '',
                        enable_status: false
                    }
                },methods: {
                        update_status (){
                        const status_point  = document.querySelector('#status_point');
                        this.id             = event.target.value;
                        const appdata       = new FormData()
                        appdata.append('id',    this.id);
                        appdata.append('status',this.status);
                        fetch('./services/update_status_type.php', {
                            method: 'POST',
                            body: appdata
                        })
                            .then(response => response.json())
                            .then(data => console.log(data))
                            .catch(error => console.log(error));
                    }
                },mounted() {
                
                },
            })
            app.mount('#app')
    </script>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

   <?php include "./footer-template.php"; ?>
   
</body>
</html>
