<?php
     require_once "../../../services/class/Connection.php";
     $db = new Connection(true);
     require_once "./checkAdmin.php";
     $checkadmin = new checkAdmin;
?>
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

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
   
    <style>
        .row {padding:20px;}
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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


                <div class="row">
                    <h3>แก้ไข Slide</h3>
                    <form action="./services/post_slide.php" enctype="multipart/form-data"  method="post">
                        <div class="form-group">
                            <label for="">ชื่อสไลน์</label>
                            <input type="text" name="slide_header" id="slide_header" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">เนื้อหาสไลน์</label>
                            <input type="text" name="slide_content" id="slide_content" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label for="">รูปภาพสไลน์</label>
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" @change="fileToUpload">
                        </div>
                        <button type="submit" class="btn btn-primary">เพิ่ม Slide</button>
                    </form>
                </div>
                <div class="row" id="app">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ภาพที่แสดง</th>
                                <th>ชื่อสไลน์</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <form action="" method="post" @submit.prevent= "update_status">
                        <?php
                           $status = "";
                            $checkadmin->checkAdmin();
                            $stmt = $db->pdo->query("SELECT `slide_id`,`slide_picture`,`slide_header`,`slide_content`,`slide_status` FROM `kanji_slide` WHERE 1");
                            $i = 0;
                            while($r = $stmt->fetch(PDO::FETCH_ASSOC)):
                        ?>
                            <tr>
                                <td><?php echo $i=$i+1; ?></td>
                                <td><?php echo $r['slide_picture']; ?></td>
                                <td><?php echo $r['slide_header']; ?></td>
                                <td>
                                <label class="switch">
                                <input type="checkbox" value="<?php echo $r['slide_id'].','.$r['slide_status']; ?>" <?php echo  ($r['slide_status'] == 1) ? 'checked' : ''; ?> @change="update_status()">
                                <span class="slider"></span>
                                </label>
                                </td>
                                <td><a href="./services/delete.php?process=slide&option=delete&id=<?php echo $r['slide_id']; ?>" class="btn btn-danger">ลบ</a></td>
                            </tr>
                                
                            <?php endwhile; ?>
                            </form>
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
                const status_point = document.querySelector('#status_point');
                this.id         = event.target.value;
                console.log( this.id);
                const appdata = new FormData()
                appdata.append('id',this.id);
                appdata.append('status',this.status);
                fetch('./services/update_status_slide.php', {
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
</body>
</html>
