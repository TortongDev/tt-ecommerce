<?php
    require_once "../../../services/class/Connection.php";
    require_once "./checkAdmin.php";
    $checkAdmin = new checkAdmin;
    $checkAdmin->checkAdmin();
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
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   
    <style>
        .row {
            padding: 20px;
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
                    <h3>Preview Banner 1</h3>
                    <div class="picture-preview">
                      
                        <img  v-if="image.imagePreview == null " :src="'./uploads/'+image.makeImg" style="width: 100%; height: auto; " alt="">
                        <img  v-else-if="image.imagePreview != null " :src="image.imagePreview" style="width: 100%; height: auto" alt="">
                    </div>
                </div>
                <div class="row">
                    <form action="./services/post_banner.php" enctype="multipart/form-data"  method="post">
                        <div class="form-group">
                            <label for="">Picture</label>
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" @change="fileToUpload">
                        </div>
                        <button type="submit" class="btn btn-primary">แก้ไข Banner</button>
                    </form>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php
            $select = new Connection(true);
            $stmt = $select->pdo->query('SELECT * FROM `kanji_banners` WHERE 1=1'); 
            $rPicture = $stmt->fetch();
        ?> 

<script>
    document.addEventListener('DOMContentLoaded',()=>{
        let img =   ''
        const app = Vue.createApp({
            data() {
                return {
                    image:{
                        imagePreview: null,
                        makeImg:''
                    }
                }
            },methods: {
                fileToUpload (event) 
                {
                    const  uploadImg = event.target;
                    const render = new FileReader();
                    render.onload = () =>{
                        this.image.imagePreview = render.result;
                    }
                    render.readAsDataURL(uploadImg.files[0]);
                }
            },mounted() {
                this.image.makeImg = '<?php echo $rPicture['picture']; ?>';
            },
        })
        app.mount('#page-wrapper')
    })
</script>
   <?php include "./footer-template.php"; ?>


</body>
</html>
