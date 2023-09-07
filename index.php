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
        <!-- รู้จักกับร้าน -->
        <article class="intro" id="intro">
            <section class="background-shop-promote header-img" style="overflow: hidden;">
                <!-- <img src="./kanji_farm.jpg" class="img-action header-img"  alt=""> -->
            </section>
            <br>
            <center><h1 class="main-text">Kanji Farm ( คันจิ ฟาร์ม )</h1></center>
            <center><h3 class="sub-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus sint maxime error voluptatum eveniet fugit repellat quas possimus, cupiditate dolor rerum nobis expedita? Rerum cumque quae in, ipsum corrupti, minima impedit nisi tenetur, quaerat tempora aperiam cupiditate voluptates nostrum nobis? Porro, at id, ad ipsam aliquid expedita pariatur ullam reprehenderit itaque eligendi voluptas tempora, debitis aut totam exercitationem cum dignissimos quidem est? Alias laboriosam animi modi. Distinctio cumque quo, nemo velit, ex dicta maiores voluptatum excepturi autem amet optio. Laboriosam cupiditate dolorum expedita consequuntur totam, hic esse placeat unde blanditiis est inventore accusamus! Quos laborum optio est magnam doloremque.</h3></center>
            <center>
                
                <div class="container-shop-highlight">
                    <div class="shop-highlight">
                        <img src="https://asv-ptgenergy-backoffice-api-prod.azurewebsites.net/images/banner-pd.jpg" alt="" class="pic-highlight">
                        <h4 class="sub-text">Lorem ipsum dolor sit amet consectetur adipisicing.</h4>
                    </div>
                    <div class="shop-highlight">
                        <img src="https://asv-ptgenergy-backoffice-api-prod.azurewebsites.net/images/banner-pd.jpg" alt="" class="pic-highlight">
                        <h4 class="sub-text">Lorem ipsum dolor sit amet consectetur adipisicing.</h4>
                    </div>
                    <div class="shop-highlight">
                        <img src="https://asv-ptgenergy-backoffice-api-prod.azurewebsites.net/images/banner-pd.jpg" alt="" class="pic-highlight">
                        <h4 class="sub-text">Lorem ipsum dolor sit amet consectetur adipisicing.</h4>
                    </div>
                </div>
                <br><br>
                <br><br>
                <h4 class="sub-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita architecto distinctio praesentium minus voluptatibus dolor ad perspiciatis, provident, soluta enim dicta modi consequuntur molestiae ut iure. Quam dignissimos veritatis laboriosam vero doloremque nihil distinctio neque eius facilis, nulla doloribus, excepturi quas molestias? Similique ut, dolor sint adipisci aliquid incidunt ex beatae vero error velit, labore commodi nihil perspiciatis eligendi consequuntur nisi cum? Cum, asperiores laboriosam molestias eum earum pariatur laborum sed optio, sint itaque tempore rem! Obcaecati omnis animi unde sapiente distinctio eligendi et in neque, nobis accusamus facere explicabo assumenda voluptas ea qui delectus facilis hic? Commodi, consequatur accusantium!</h4>
            </center>
            <!-- <center>
                <div class="contact">
                    <img class="icon-contact" src="https://logos-world.net/wp-content/uploads/2021/03/Line-Logo.png" alt="">
                    <img class="icon-contact" src="https://cdn2.downdetector.com/static/uploads/logo/FB-f-Logo__blue_512.png" alt="">
                    <img class="icon-contact" src="data:image/png;base64,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" alt="">

                </div>
            </center> -->
        </article>
        
        <div id="product"></div>
        <br><br><br><br><br><br>
        <!-- แนะนำสินค้า -->
        <article class="product">
            <center><h1 class="main-text" style="margin-block-end: 0 !important;">แนะนำสินค้า</h1></center>
            <center><h3 class="sub-text" style="margin-block-start: 0 !important;">สินค้าแนะนำจากทางร้าน หากต้องการเลือกซื้อสินค้าเพิ่มเติมได้ที่  
            <a style="color: blue;" href="./shopping_online.php"><i class="fa-solid fa-shop"></i> ไปที่ร้านค้า</a></h3></center>
            <br>
          
            <section class="container-product">
                <div class="box-product">
                    <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile">
                        <img class="img-action" src="./img-shop/Cos-Lettuce.jpg" alt="">
                    </div>
                    <h3><a href="./shop_product.php">Cos Lettuce or Romaine Lettuce (กรีนคอส)</a></h3>
                    <h4 class="sub-text short-text">ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับประทานเป็นอันดับต้น ๆ </h4>
                    <h4 class="price"><center><i class="fa-solid fa-baht-sign"></i>1,000.00</center></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile">
                        <img class="img-action" src="./img-shop/Frillice_Ice_Berg.jpg" alt="">
                    </div>
                    <h3>Frillice Ice Berg Lettuce (ฟิลเลย์ไอซ์เบิร์ก)</h3>
                    <h4 class="sub-text short-text">ฟิลเลย์ไอซ์เบิร์ก (Frillice Ice Berg Lettuce) คือ ผักสลัดชนิดหนึ่ง ใบมีสีเขียวอ่อนถึงสีเขียวเข้ม เรียวยาวเป็นทรงพุ่ม ปลายใบหยิกงอเป็นฝอย ๆ เรียงชิดติดกัน โคนต้นมีความชุ่มน้ำ ทำให้ดูอวบ</h4>
                    <h4 class="price"><center><i class="fa-solid fa-baht-sign"></i>1,000.00</center></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile">
                        <img class="img-action" src="./img-shop/green-oak-1.jpg" alt="">
                    </div>
                    <h3>Green Oak Lettuce (กรีนโอ๊ค ) </h3>
                    <h4 class="sub-text short-text">Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผม  </h4>
                    <h4 class="price"><center><i class="fa-solid fa-baht-sign"></i>1,000.00</center></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile">
                        <img class="img-action" src="./img-shop/MG_0293-Selected.jpg" alt="">
                    </div>
                    <h3>MINI COS ORGANIC (มินิคอส ออร์แกนิค).</h3>
                    <h4 class="sub-text short-text">MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ </h4>
                    <h4 class="price"><center><i class="fa-solid fa-baht-sign"></i>1,000.00</center></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile">
                        <img class="img-action" src="./img-shop/original-1634632690275.jpg" alt="">
                    </div>
                    <h3>ผักชี (ชื่อวิทยาศาสตร์: Coriandrum sativum)</h3>
                    <h4 class="sub-text short-text">ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี. </h4>
                    <h4 class="price"><center><i class="fa-solid fa-baht-sign"></i>1,000.00</center></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile">
                        <img class="img-action" src="./img-shop/เรดโอ๊ค.jpg" alt="">
                    </div>
                    <h3>Red Oak Lettuce (เรดโอ๊ค) </h3>
                    <h4 class="sub-text short-text">เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง. </h4>
                    <h4 class="price"><center><i class="fa-solid fa-baht-sign"></i>1,000.00</center></h4>
                </div>
               
            </section>
        </article>
       
        <div id="partner"></div>
        <br><br><br><br><br><br>
        <article class="alliance">
            <center><h1 class="main-text" style="margin-block-end: 0 !important;">ร้านค้า Partner</h1></center>
            <center><h3 class="sub-text" style="margin-block-start: 0 !important;">ร้านค้าที่เป็น Partner กับร้านเรา</h3></center>
            <br>
            <section class="container-alliance">
                <article class="logger-partner">
                    <div class="partner img-action" style="background-image: url('https://f.ptcdn.info/923/033/000/1438186017-P1170303JP-o.jpg');background-size: cover;">
                        <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                        <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                        <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                        <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                        <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
                    </div>
                </article>
                <div class="partner">
                    <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                    <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                    <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                    <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                    <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
                </div>
                <div class="partner">
                    <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                    <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                    <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                    <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                    <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
                </div>
                <div class="partner">
                    <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                    <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                    <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                    <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                    <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
                </div>
                <div class="partner">
                    <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                    <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                    <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                    <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                    <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
                </div>
                <div class="partner">
                    <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                    <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                    <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                    <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                    <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
                </div>
                <div class="partner">
                    <h2 class="margin-block-0">Lorem ipsum dolor sit amet </h2>
                    <h4 class="sub-text margin-block-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, eius!</h4>
                    <h4 class="main-text margin-block-0">Tel. 000-000-0000</h4>
                    <h4 class="main-text margin-block-0">Line. @asdf1</h4>
                    <h4 class="main-text margin-block-0">Facebook. fbshop</h4>
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