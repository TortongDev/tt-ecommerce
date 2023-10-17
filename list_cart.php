<?php
   require_once __DIR__."/app/config/config_pach.php";
   require_once PATCH_CONNECTION;
   $checkAuthen = new Connection();

?>
<?php


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
        html,body {
            height:100%;
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
        footer {
            margin-top: 100vh;
            bottom: 0;
            position: relative;
        }
        .tabbar-checkout {
            margin-block-start: 120px;
        }
    </style>
    
</head>
<body>

<div id="wrapper">
    <?php include ('./header-template.php'); ?>

    <div class="tabbar-checkout">
        <h2 class="">รายการสั่งซื้อทั้งหมด</h2>
    </div>
   
    <div class="containers">
        <article class="container-list-cart">
            <section class="list-cart" style="overflow: auto;">
                <table class="table" id="table">
                    <thead style="overflow: auto;">
                        <tr>
                            <th style="width:80px;text-align: center;">#</th>
                            <th style="width:180px;text-align: center;">วันที่</th>
                            <th style="width:180px;text-align: center;">รหัสรายการ</th>
                            <th style="width:180px;text-align: center;">ผู้สั่ง</th>
                            <th style="width:80px;text-align: center;">สถานะ</th>
                            <th style="width:150px;text-align: left;"></th>
                            <th style="width:150px;text-align: left;"></th>
                            
                        </tr>
                    </thead>
                    <tbody style="overflow: auto;">
                    <?php 
                        $checkAuthen->openConnection();
                        $sql = "SELECT * FROM `kanji_orders` WHERE ? AND USER_ID = ?";
                        $stmt = Connection::$pdo->prepare($sql);
                        $stmt->execute(array('1=1',$_SESSION['AUTHEN_USER_ID']));
                        // $stmt->execute(array('1=1'));
                        $number = 0;
                        while($R = $stmt->fetch(PDO::FETCH_ASSOC)):
                            $number = $number + 1;
                            $orderID    = $R['ORDER_ID']; 
                            $FIST_NAME  = $R['FIST_NAME']; 
                            $ORDER_TIMESTAMP = $R['ORDER_TIMESTAMP']; 
                            $ORDER_STATUS    = $R['ORDER_STATUS']; 
                            $TEL        = $R['TEL'];
                            $ORDER_STATUS_IF = 'ยังไม่ชำระเงิน';
                            $STATUS_COLOR = "RED";
                            $BTN_PAYMENT = "<a class='btn' href='./success_form.php?codeid=$orderID'>แจ้งโอนเงิน</a>";
                            if($ORDER_STATUS == '1'):
                                $STATUS_COLOR = "GREEN";
                                $ORDER_STATUS_IF = 'ชำระเงินแล้ว';
                                $BTN_PAYMENT = "-";
                            endif;
                            // $TEL = $R['TEL']; 
                            echo <<<ORDER
                                <tr>
                                    <td style="text-align: center;">$number</td>
                                    <td style="text-align: center;">$ORDER_TIMESTAMP</td>
                                    <td style="text-align: center;">$orderID</td>
                                    <td style="text-align: center;">$FIST_NAME</td>
                                    <td style="text-align: left;">
                                        <font color="$STATUS_COLOR">$ORDER_STATUS_IF</font>
                                    </td>
                                    <td>
                                        <a class="btn">รายละเอียดสินค้า</a>
                                    </td>
                                    <td>$BTN_PAYMENT</td>
                                </tr>

                            ORDER;
                        endwhile;
                    ?>
                        
                    </tbody>
                </table>
            </section>
         
        </article>
    </div>
    <div class="navbar-footer">
        <section><a href="./shopping_online.php"><i class="fa-solid fa-arrow-left"></i></a></section>
        <section class="main-navbar-footer cart-confirm btn-cart" id="upBTN">ถัดไป</section>
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