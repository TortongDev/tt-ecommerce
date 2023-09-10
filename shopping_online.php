<?php
    require_once "./services/class/Connection.php";
    $checkAuthen = new Connection();
    $checkAuthen->authenPermission();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script  src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div id="wrapper">
   <?php include ('./header-template.php'); ?>
    <div class="container">
        <br>
        <section class="shop-filter">
            <div class="form-group">
                <label for="">ชื่อสินค้า</label>
                <input type="text" name="produce_name" class="form-control" style="width: 90%">
            </div>
            <div class="form-group">
                <label for="">ประเภทสินค้า</label>
                <select  name="produce_type" class="form-control" style="width: 90%">
                    <option value="">-- กรุณาเลือก --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">สินค้าจากร้าน Partner</label>
                <select name="produce_partner" class="form-control" style="width: 90%">
                    <option value="">-- กรุณาเลือก --</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-filter-skyblue"> <i class="fa-solid fa-arrow-up-wide-short"></i> ใหม่ล่าสุด</button>
                <button class="btn btn-filter-orange"> <i class="fa-solid fa-arrow-down-wide-short"></i> เก่าสุด</button>
            </div>
            <div class="form-group">
               
            </div>

        </section>
        <!-- แนะนำสินค้า -->
        <article class="product">
            <div class="center"><h1 class="main-text" style="margin-block-end: 0 !important;">สินค้าออนไลน์</h1></div>
            <div class="center"><h3 class="sub-text" style="margin-block-start: 0 !important;">สินค้าออนไลน์จากทาง Kanji Farm Online. </h3></div>
            <br>
          
            <section class="container-product-shop">
                <?php
                    $checkAuthen->openConnection();
                    $stmt_product = $checkAuthen->pdo->prepare("SELECT * FROM `kanji_products` WHERE ? ");
                    $stmt_product->execute(array('1=1'));
                    while($R_PRODUCT =  $stmt_product->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div class="box-product">
                    <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./backend_disc/bs-advance-admin/advance-admin/<?php echo $R_PRODUCT['product_img'] ?>" alt="">
                    </div>
                    <h3><a href="./shop_product.php?product_id=<?php echo $checkAuthen->id_encrypt($R_PRODUCT['product_id']); ?>"><?php echo $R_PRODUCT['product_name'] ?></a></h3>
                    <h4 class="sub-text short-text"><?php echo $R_PRODUCT['product_detail'] ?></h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i><?php echo $R_PRODUCT['product_price']; ?> / <?php echo '1 '.$R_PRODUCT['option_price'] ?></div></h4>
                </div>
                <?php 
                    endwhile; 
                    $checkAuthen->closeConnection();    

                ?>
            </section>
        </article>
    </div>
    <?php include('./footer-template.php') ?>
    
</div>
</body>
<!-- นำเข้าไฟล์ Base Controller -->
<script  src="./base_function.js"></script>
<script>
    const app = Vue.createApp(BaseControllers,{
        data() {
            return {
                showBox1: false,
                showBox2: false,
                showBox3: false,
                showBox4: false,
                showBox5: false,
                showBox6: false,
                menuSlide: 0
            }
        },methods: {

        },mounted() {
            
        },
    })
    app.mount('#wrapper')
</script>
</html>
<?php exit; ?>