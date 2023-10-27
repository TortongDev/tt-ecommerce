<?php
    require_once __DIR__."/app/config/config_pach.php";
    require_once PATCH_CONNECTION;
    $checkAuthen = new Connection();
    $checkAuthen->authenPermission();


    $product_id     = isset($_GET['product_id'])            ? htmlspecialchars(trim($_GET['product_id']))       : '';
    $product_member_id = isset($_GET['product_member_id'])  ? htmlspecialchars(trim($_GET['product_member_id'])) : '';
    $product_name   = isset($_GET['product_name'])          ? htmlspecialchars(trim($_GET['product_name']))     : '';
    $product_type   = isset($_GET['product_type'])          ? htmlspecialchars(trim($_GET['product_type']))     : '';
    $product_price  = isset($_GET['product_price'])         ? htmlspecialchars(trim($_GET['product_price']))    : '';
    $user_id        = isset($_GET['user_id'])               ? htmlspecialchars(trim($_GET['user_id']))          : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    
    <link rel="icon" type="image/x-icon" href="./img-shop/icon/title.ico">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        html,body {
            background-color: white !important;
        }
        footer {
            position: relative !important;
        }
        .list-cart tr td:nth-last-child(1) {
            margin: auto;
            text-align: center;
        }
        .list-cart tr td:nth-last-child(2) {
            margin: auto;
            text-align: center;
        }
        .list-cart tr td:nth-last-child(3) {
            margin: auto;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .list-cart tr td:nth-last-child(4) {
            margin: auto;
            text-align: center;
        }
        .list-cart tr td:nth-last-child(5) {
            margin: auto;
            text-align: center;
        }
        #hidden-btn {
            background-color: silver !important;
        }
    </style>
    
</head>
<body>
<div id="wrapper">
    <?php include ('./header-template.php'); ?>
    <div class="tabbar-checkout">
        <h2 class="">ตะกร้าสินค้า</h2>
    </div>
    <div class="containers">
        <article class="container-checkout-cart">
            
            <section class="list-cart" style="overflow: auto;">
                <table class="table" id="table">
                    <thead style="overflow: auto;">
                        <tr class="">
                            <th>#</th>
                            <th>รหัสสินค้า</th>
                            <th >รายการสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody style="overflow: auto;">
                        <?php 
                            $countID = 1;
                            $cart = @$_SESSION['CART'];
                            if(!empty($cart)):
                            foreach($cart  as $key => $value):  
                        ?>
                        <form method="get">
                        <tr>
                            <td><?php echo $countID++; ?></td>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $value['product_name']; ?></td>
                            <td><input type="number" style="width:50px" id="<?php echo $key ?>" value="<?php echo $value['product_amount']; ?>" name="p_amount" class="form-control"></td>
                            <td><?php echo $value['product_price']; ?></td>
                            <td>
                                <a style="padding:3px;color:red" href="./delete_cart.php?id=<?php echo $key;?>" class="btn" style="margin:5px !important">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        </form>
                        <?php
                            endforeach; 
                            endif;
                        ?>
                     
                    </tbody>
                </table>
            </section>
            <section class="checkout-form">
                <table class="table" style="">
                    <thead>
                        <tr>
                            <th colspan="2">ประมาณราคา</th>
                        </tr>
                    </thead>
                    <tbody id="app1">
                        <?php if(empty($_SESSION['CART'])): ?>
                        <tr>
                            <td><br>รวมราคาสินค้า</td>
                            <td style="text-align: right;"><br>0.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>ค่าจัดส่ง</td>
                            <td style="text-align: right;">0.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>รวมราคาทั้งหมด</td>
                            <td style="text-align: right;">0.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <?php else: ?>
                     
                          
                        <tr>
                            <td>รวมราคาสินค้า</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;"> <div id="priceAll"></div>&nbsp; <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>

                        <tr>
                            <td><u style="color:red;">หัก</u> ค่าจัดส่ง</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;">40.00 &nbsp;<i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>รวมราคาสินค้า + ค่าจัดส่ง</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;"><u><div id="totalAll"></div></u> &nbsp; <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                     
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="code">
                    <table class="">
                            <tr>
                                <th colspan="2">โค้ดส่วนลด (ถ้ามี)</th>
                            </tr>
                    </table>
                    <div class="grid-2">
                    <input type="text" name="code" id="code" min="8" max="10" class="form-control">
                        <a href="" class="w3-button w3-teal"><i class="fa-solid fa-tag"></i> ใช้โค้ด</a>
                    </div>
                <!-- <td></td> -->
                    
                </div>
                <div class="checkout-footer desktop">
                    <center>
                    <a href="./shopping_online.php">
                        <button class="w3-button w3-blue"><i class="fa-solid fa-plus"></i> เลือกสินค้าต่อ </button></a>
                    <a href="./clear_cart.php?cls=1"><button class="w3-button w3-light-grey"><i class="fa-solid fa-trash-can-arrow-up"></i> ล้างตะกร้าสินค้า</button></a>
                    <?php if(!empty($_SESSION['CART'])):?>
                        <a href="./checkout_cart_confirm.php"><button  class="w3-button w3-orange"><i class="fa-solid fa-cart-shopping"></i>ดำเนินการต่อไป</button></a>
                    <?php else: ?>
                        <a href="#" class="btn btn-checkout"><i class="fa-solid fa-cart-shopping"></i> ยืนยันชำระเงิน </a>
                    <?php endif; ?>
                    </center>
                </div>
            </section>
        </article>
    </div>
    <div class="navbar-footer">
        <section><a href="./shopping_online.php"><i class="fa-solid fa-arrow-left"></i></a></section>
        <section class="main-navbar-footer cart-confirm btn-cart" <?php if(!empty($_SESSION['CART'])):?> id="upBTN" <?php else: ?>id="hidden-btn"<?php endif; ?>>ถัดไป</section>
        <!-- <section class="main-navbar-footer cart-confirm btn-cart" id="upBTN">ถัดไป</section> -->
        <section><a href="./checkout_cart.php"><i class="fa-regular fa-rectangle-list"></i> </a> </section>
    </div>
    <?php include ('./footer-template.php'); ?>
</div>
</body>
<script  src="./base_function.js"></script>

<script>
   document.addEventListener('DOMContentLoaded',function(){
        const mainNavbarFooter = document.querySelector('#upBTN')
        mainNavbarFooter.addEventListener('click',()=>{
            mainNavbarFooter.style.transform = "scale(1.1,1.1)"
            setTimeout(function(){
                location.href = "./checkout_cart_confirm.php";
            }, 1000)
            
        })

   })

    const app = Vue.createApp(BaseControllers)
    const vm = app.mount('#wrapper')
    vm.amount = 0;
    vm.price = 0;
    vm.total_price = 0; 
   
   
    const p_amount = document.querySelectorAll('[name=p_amount]')
   
   document.addEventListener('DOMContentLoaded',()=>{
    p_amount.forEach(element => {
        // console.log();
                const id = element.getAttribute('id')
                const valueID = document.querySelector('#'+id).value
                fetch('./fetchData.php?id='+id+'&valueID='+valueID)
                    .then(response => response.json())
                    .then((data)=>{
                        document.querySelector('#priceAll').textContent = data.priceAll
                        document.querySelector('#totalAll').innerHTML = data.sumTotal
                    })
                    .catch(error => console.log(error));
        });
   })
        p_amount.forEach(element => {
        // console.log();
            let priceAll = "";
            let sumTotal = "";
            element.addEventListener('change',function(){
                const id = element.getAttribute('id')
                const valueID = document.querySelector('#'+id).value
                fetch('./fetchData.php?id='+id+'&valueID='+valueID)
                    .then(response => response.json())
                    .then((data)=>{
                        priceAll = `${data.priceAll}`;
                        sumTotal= `${data.sumTotal}`;
                        document.querySelector('#priceAll').innerHTML = priceAll
                        document.querySelector('#totalAll').innerHTML = sumTotal
                    })
                    .catch(error => console.log(error));
            })
        });
</script>
</html>