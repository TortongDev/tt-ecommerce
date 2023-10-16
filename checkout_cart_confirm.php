
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
    <link rel="icon" type="image/x-icon" href="./img-shop/icon/title.ico">
    <link rel="stylesheet" href="./style.css">
    <style>   
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
        .list-payment  {
            list-style: auto;
        }
    </style>
    
</head>
<body>
<?php
        require_once __DIR__."/app/config/config_pach.php";
        require_once PATCH_CONNECTION;
        $checkAuthen = new Connection();
        $checkAuthen->openConnection();
   
        $DESC = Connection::$pdo->query('SELECT `PRM_ID` FROM `kanji_orders` WHERE 1=1 ORDER BY PRM_ID DESC LIMIT 1' );
        $DESC = $DESC->fetch(PDO::FETCH_ASSOC);
        $DESC = $DESC['PRM_ID']+1;
        $_SESSION['STATUS_CONFIRM'] = 1;
        $FIST_NAME    = isset($_POST['FIST_NAME']) ? htmlspecialchars(trim($_POST['FIST_NAME']))       : '';
        $LAST_NAME    = isset($_POST['LAST_NAME']) ? htmlspecialchars(trim($_POST['LAST_NAME']))       : '';
        $ADDRESS_NUMBER = isset($_POST['ADDRESS_NUMBER']) ? htmlspecialchars(trim($_POST['ADDRESS_NUMBER'])) : '';
        $ADDRESS_MOO    = isset($_POST['ADDRESS_MOO']) ? htmlspecialchars(trim($_POST['ADDRESS_MOO']))       : '';
        $TUMBON         = isset($_POST['TUMBON']) ? htmlspecialchars(trim($_POST['TUMBON']))          : '';
        $MOOBAN         = isset($_POST['MOOBAN']) ? htmlspecialchars(trim($_POST['MOOBAN']))          : '';
        $AMPHOR         = isset($_POST['AMPHOR']) ? htmlspecialchars(trim($_POST['AMPHOR']))          : '';
        $JUNGWAT        = isset($_POST['JUNGWAT']) ? htmlspecialchars(trim($_POST['JUNGWAT']))        : '';
        $TEL            = isset($_POST['TEL']) ? htmlspecialchars(trim($_POST['TEL']))                : '';
        $ORDER_ID       = isset($_POST['ORDER_ID']) ? htmlspecialchars(trim($_POST['ORDER_ID']))       : 'KANJI_'.$DESC;
        $ORDER_STATUS   = isset($_POST['ORDER_STATUS']) ? htmlspecialchars(trim($_POST['ORDER_STATUS'])) : '';
        $PROVINCE       = isset($_POST['PROVINCE']) ? htmlspecialchars(trim($_POST['PROVINCE']))      : '';
        $TRANSPORT = 80;
        $SUM_PRICE_ALL = $_SESSION['total'];
        $POST = isset($_POST['post']) ? htmlspecialchars($_POST['post']) : '';
        if($POST == '1'):

            $_SESSION['CONFIRM']['FIST_NAME']   = $FIST_NAME;
            $_SESSION['CONFIRM']['LAST_NAME']   = $LAST_NAME;
            $_SESSION['CONFIRM']['ADDRESS_MOO'] = $ADDRESS_MOO;
            $_SESSION['CONFIRM']['ADDRESS_NUMBER'] = $ADDRESS_NUMBER;
            $_SESSION['CONFIRM']['JUNGWAT']     = $JUNGWAT;
            $_SESSION['CONFIRM']['AMPHOR']      = $AMPHOR;
            $_SESSION['CONFIRM']['TUMBON']      = $TUMBON;
            $_SESSION['CONFIRM']['PROVINCE']    = $PROVINCE;
            $_SESSION['CONFIRM']['TEL']         = $TEL;
            $_SESSION['CONFIRM']['ORDER_ID']    = $ORDER_ID;
            header("Location: ./checkout_confirm_step2.php");
            exit;

        else:

        endif;
          
?>
<form action="" method="post">
<div id="wrapper">
    <?php include ('./header-template.php'); ?>
    <div class="tabbar-checkout">
        <h2 class="">ที่อยู่จัดส่ง</h2>
    </div>
    <div class="containers">
        <article class="container-checkout-cart">
          
          
            <section class="list-address" style="overflow: auto;">
                <div class="fname">ชื่อ</div><div class="fname-form"><input type="text" name="FIST_NAME" class="form-control" placeholder="ชื่อจริง"></div>
                <div class="fname">นามสกุล</div><div class="fname-form"><input type="text" name="LAST_NAME" class="form-control" placeholder="นามสกุลจริง"></div>
                <div class="fname">บ้านเลขที่</div><div class="fname-form"><input type="text" name="ADDRESS_NUMBER" class="form-control" placeholder="บ้านเลขที่"></div>
                <div class="fname">หมู่ที่</div><div class="fname-form"><input type="text" name="ADDRESS_MOO" class="form-control" placeholder="หมู่ที่"></div>
                <div class="fname">บ้าน</div><div class="fname-form"><input type="text" name="MOOBAN" class="form-control" placeholder="ชื่อหมู่บ้าน"></div>
                <div class="fname">ตำบล</div><div class="fname-form"><input type="text" name="TUMBON" class="form-control" placeholder="ชื่อตำบล"></div>
                <div class="fname">อำเภอ</div><div class="fname-form"><input type="text" name="AMPHOR" class="form-control" placeholder="ชื่ออำเภอ"></div>
                <div class="fname">จังหวัด</div><div class="fname-form"><input type="text" name="JUNGWAT" class="form-control" placeholder="ชื่อจังหวัด"></div>
                <div class="fname">ไปรษณี</div><div class="fname-form"><input type="text" maxlength="5" name="PROVINCE" class="form-control" placeholder="รหัสไปรษณี"></div>
                <div class="fname">เบอร์โทร</div><div class="fname-form"><input type="text" maxlength="10" name="TEL" class="form-control" placeholder="เบอร์โทรศัพท์"></div>
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
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;"><?php echo $_SESSION['total'];?> &nbsp; <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>

                        <tr>
                            <td><u style="color:red;">หัก</u> ค่าจัดส่ง</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;">80.00 &nbsp; <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                        <tr>
                            <td>รวมราคา + ค่าจัดส่ง</td>
                            <td style="text-align: right ;display:flex;align-items:center;justify-content: right;"> <u><?php echo $_SESSION['sumtotal'];?> </u> &nbsp; <i class="fa-solid fa-baht-sign"></i></td>
                        </tr>
                     
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="payment-de">
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="2">ขั้นตอนชำระเงิน</th>
                        </tr>
                    </thead>
                    </table>
                    <ul class="list-payment">
                        <li style="font-size: 12pt">โอนเงินที่พร้อมเพย์ : 0887778854</li>
                        <li style="font-size: 12pt">โอนเงินเสร็จ ทำการแจ้งโอนเงินได้ที่ <a href="">แจ้งโอนเงิน</a></li>
                    </ul>
                </div>
                <div class="checkout-footer desktop">
                    <center>
                    <button class="btn btn-back-shopping"><i class="fa-solid fa-plus"></i> เลือกสินค้าต่อ </button>
                    <button class="btn btn-clear-order"><i class="fa-solid fa-trash-can-arrow-up"></i> ล้างตะกร้าสินค้า</button>
                    <!-- <a href="./checkout_confirm_step2.php" class="btn btn-checkout"><i class="fa-solid fa-cart-shopping"></i> ยืนยันและดำเนินการต่อ</a> -->
                    <button type="submit" class="btn btn-checkout" value="1" name="post">ยืนยันและดำเนินการต่อ</button>
                    </center>
                </div>
      
            </section>
        </article>
    </div>
    
    <div class="navbar-footer">
        
            <section><a href="./checkout_cart.php"><i class="fa-solid fa-arrow-left"></i></a></section>
            <section class="main-navbar-footer cart-confirm btn-cart" id="upBTN">ชำระเงิน</section>
            <section><a href="./checkout_cart.php"><i class="fa-regular fa-rectangle-list"></i> </a> </section>
        
    </div>
    <?php include ('./footer-template.php'); ?>
</div>
</form>
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