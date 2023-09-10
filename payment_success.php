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
        <article class="container-payment-success">
           
            <section class="payment-success">
                <p>ร้าน Kanji Shop</p>
                <p></p>
                <p><b>address</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat delectus maxime sequi in magni consequuntur. Hic dolorem odit reiciendis est.</p>
            </section>
            <section class="payment-success grid-1">
                <p><b>address</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat delectus maxime sequi in magni consequuntur. Hic dolorem odit reiciendis est.</p>
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