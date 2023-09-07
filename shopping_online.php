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
                    <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/Cos-Lettuce.jpg" alt="">
                    </div>
                    <h3><a href="./shop_product.php">Cos Lettuce or Romaine Lettuce (กรีนคอส)</a></h3>
                    <h4 class="sub-text short-text">ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับประทานเป็นอันดับต้น ๆ </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/Frillice_Ice_Berg.jpg" alt="">
                    </div>
                    <h3>Frillice Ice Berg Lettuce (ฟิลเลย์ไอซ์เบิร์ก)</h3>
                    <h4 class="sub-text short-text">ฟิลเลย์ไอซ์เบิร์ก (Frillice Ice Berg Lettuce) คือ ผักสลัดชนิดหนึ่ง ใบมีสีเขียวอ่อนถึงสีเขียวเข้ม เรียวยาวเป็นทรงพุ่ม ปลายใบหยิกงอเป็นฝอย ๆ เรียงชิดติดกัน โคนต้นมีความชุ่มน้ำ ทำให้ดูอวบ</h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/green-oak-1.jpg" alt="">
                    </div>
                    <h3>Green Oak Lettuce (กรีนโอ๊ค ) 125 กรัม </h3>
                    <h4 class="sub-text short-text">Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผม  </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/MG_0293-Selected.jpg" alt="">
                    </div>
                    <h3>MINI COS ORGANIC (มินิคอส ออร์แกนิค).</h3>
                    <h4 class="sub-text short-text">MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/original-1634632690275.jpg" alt="">
                    </div>
                    <h3>ผักชี (ชื่อวิทยาศาสตร์: Coriandrum sativum)</h3>
                    <h4 class="sub-text short-text">ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี. </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/เรดโอ๊ค.jpg" alt="">
                    </div>
                    <h3>Red Oak Lettuce (เรดโอ๊ค) </h3>
                    <h4 class="sub-text short-text">เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง. </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/MG_0293-Selected.jpg" alt="">
                    </div>
                    <h3>MINI COS ORGANIC (มินิคอส ออร์แกนิค).</h3>
                    <h4 class="sub-text short-text">MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/original-1634632690275.jpg" alt="">
                    </div>
                    <h3>ผักชี (ชื่อวิทยาศาสตร์: Coriandrum sativum)</h3>
                    <h4 class="sub-text short-text">ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี. </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/เรดโอ๊ค.jpg" alt="">
                    </div>
                    <h3>Red Oak Lettuce (เรดโอ๊ค) </h3>
                    <h4 class="sub-text short-text">เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง. </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
               
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/MG_0293-Selected.jpg" alt="">
                    </div>
                    <h3>MINI COS ORGANIC (มินิคอส ออร์แกนิค).</h3>
                    <h4 class="sub-text short-text">MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/original-1634632690275.jpg" alt="">
                    </div>
                    <h3>ผักชี (ชื่อวิทยาศาสตร์: Coriandrum sativum)</h3>
                    <h4 class="sub-text short-text">ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี. </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
                </div>
                <div class="box-product">
                <!-- <div class="shadow-box"></div> -->
                    <div class="img-profile-shop">
                        <img class="img-action" src="./img-shop/เรดโอ๊ค.jpg" alt="">
                    </div>
                    <h3>Red Oak Lettuce (เรดโอ๊ค) </h3>
                    <h4 class="sub-text short-text">เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง. </h4>
                    <h4 class="price"><div class="center"><i class="fa-solid fa-baht-sign"></i>1,000.00</div></h4>
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