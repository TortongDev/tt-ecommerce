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
                
                <div class="box-product">
                    <form action="./post_cart_v2.php" method="post">
                        <!-- <div class="shadow-box"></div> -->
                        <div class="img-profile-shop">
                            <img class="img-action" src="./backend_disc/bs-advance-admin/advance-admin/assets/img/info-detail.png" alt="">
                        </div>
                        <h3><a href="./shop_product.php?product_id=P1001">โทรศัพท์ Iphone 14</a></h3>
                        <h4 class="sub-text short-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, perspiciatis.</h4>
                        <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>34,000 / 1 เครื่อง</div></h4>
                        <input type="hidden" name="product_id" value="P1001">
                        <input type="hidden" name="product_name" value="Iphone 14">
                        <input type="text" name="product_amount" value="">
                        <input type="hidden" name="product_price" value="34000">
                        <button type="submit">ADD</button>
                    </form>
                </div>
                <div class="box-product">
                    <form action="./post_cart_v2.php" method="post">
                        <!-- <div class="shadow-box"></div> -->
                        <div class="img-profile-shop">
                            <img class="img-action" src="./backend_disc/bs-advance-admin/advance-admin/assets/img/info-detail.png" alt="">
                        </div>
                        <h3><a href="./shop_product.php?product_id=P1002">โทรศัพท์ Iphone 15</a></h3>
                        <h4 class="sub-text short-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, perspiciatis.</h4>
                        <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>44,000 / 1 เครื่อง</div></h4>
                        <input type="hidden" name="product_id" value="P1002">
                        <input type="hidden" name="product_name" value="Iphone 15">
                        <input type="text" name="product_amount" value="">
                        <input type="hidden" name="product_price" value="44000">
                        <button type="submit">ADD</button>
                    </form>
                </div>
                <div class="box-product">
                    <form action="./post_cart_v2.php" method="post">
                        <!-- <div class="shadow-box"></div> -->
                        <div class="img-profile-shop">
                            <img class="img-action" src="./backend_disc/bs-advance-admin/advance-admin/assets/img/info-detail.png" alt="">
                        </div>
                        <h3><a href="./shop_product.php?product_id=P1003">โทรศัพท์ Iphone 16</a></h3>
                        <h4 class="sub-text short-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, perspiciatis.</h4>
                        <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>49,000 / 1 เครื่อง</div></h4>
                        <input type="hidden" name="product_id" value="P1003">
                        <input type="hidden" name="product_name" value="Iphone 16">
                        <input type="text" name="product_amount" value="">
                        <input type="hidden" name="product_price" value="49000">
                        <button type="submit">ADD</button>
                    </form>
                </div>
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