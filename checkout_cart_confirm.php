<?php
    require_once "./services/class/Connection.php";
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
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./style.css">
    <style>
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
        .list-payment  {
            list-style: auto;
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
            
            <section class="list-address" style="overflow: auto;">
                <div class="fname">ชื่อ</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">นามสกุล</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">บ้านเลขที่</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">หมู่ที่</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">บ้าน</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">ตำบล</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">อำเภอ</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">จังหวัด</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">ไปรษณี</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>
                <div class="fname">เบอร์โทรศัพท์</div><div class="fname-form"><input type="text" name="fname" class="form-control"></div>

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
                            <td>รวมราคาสินค้า</td>
                            <td style="text-align: right;">0.00 <i class="fa-solid fa-baht-sign"></i></td>
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
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;"><?php echo $_SESSION['total'];?><i class="fa-solid fa-baht-sign"></i></td>
                        </tr>

                        <tr>
                            <td>ค่าจัดส่ง</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;">40.00 <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>รวมราคาทั้งหมด</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;"><?php echo $_SESSION['sumtotal'];?><i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                     
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="payment-de">
                    <h3 class="main-text">รายละเอียดการชำระเงิน</h3>
                    <ul class="list-payment">
                        <li style="font-size: 12pt">โอนเงินที่พร้อมเพย์ : 0887778854</li>
                        <li style="font-size: 12pt">โอนเงินเสร็จ ทำการแจ้งโอนเงินได้ที่ <a href="">แจ้งโอนเงิน</a></li>
                    </ul>
                </div>
                <div class="checkout-footer">
                    <button class="btn btn-back-shopping"><i class="fa-solid fa-plus"></i> เลือกสินค้าต่อ </button>
                    <button class="btn btn-clear-order"><i class="fa-solid fa-trash-can-arrow-up"></i> ล้างตะกร้าสินค้า</button>
                    <button class="btn btn-checkout"><i class="fa-solid fa-cart-shopping"></i> ชำระเงิน</button>

                </div>
            </section>
        </article>
    </div>
    <?php include ('./footer-template.php'); ?>
</div>
</body>
<script  src="./base_function.js"></script>

<script>

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