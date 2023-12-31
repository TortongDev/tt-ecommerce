
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        html,body {
            background-color: white !important;
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
        <br><br>
        <h3 class="">ที่อยู่จัดส่ง</h3>
    </div>
    <div class="containers">
        <article class="container-checkout-cart">
          
          
            <section class="list-address-main" style="overflow: auto;">
                <div class="fname-form">
                    <label for="">ชื่อ</label>
                    <input type="text" name="FIST_NAME" class="w3-input" placeholder="" required>
                </div>
                <div class="fname-form">
                    <label for="">นามสกุล</label>
                    <input type="text" name="LAST_NAME" class="w3-input" placeholder="" required>
                </div>

                    <div class="fname-form">
                        <label for="">บ้านเลขที่</label>
                        <input type="text" name="ADDRESS_NUMBER" class="w3-input" placeholder="" required>
                    </div>
                    
                    <div class="fname-form">
                        <label for="">หมู่ที่</label>
                        <input type="text" name="ADDRESS_MOO" class="w3-input" placeholder="" required>
                    </div>
                    <div class="fname-form">
                        <label for="">บ้าน</label>
                        <input type="text" name="MOOBAN" class="w3-input" placeholder="" required>
                    </div>
                    <div class="fname-form">
                        <label for="">ตำบล</label>
                        <input type="text" name="TUMBON" class="w3-input" placeholder="" required>
                    </div>
                    <div class="fname-form">
                        <label for="">อำเภอ</label>
                        <input type="text" name="AMPHOR" class="w3-input" placeholder="" required>
                    </div>

                    <div class="fname-form">
                        <label for="">จังหวัด</label>
                        <input type="text" name="JUNGWAT" class="w3-input" placeholder="" required>
                    </div>
                    
                    <div class="fname-form">
                        <label for="">ไปรษณี</label>
                        <input type="text" maxlength="5" name="PROVINCE" class="w3-input" placeholder="" required>
                    </div>
                    <div class="fname-form">
                        <label for="">เบอร์โทร ( ขนส่งใช้ติดต่อตอนส่งสินค้า )</label>
                        <input type="text" maxlength="10" name="TEL" class="w3-input" placeholder="" required>
                    </div>
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
                            <th id="" colspan="2">ขั้นตอนชำระเงิน และแจ้งชำระเงิน</th>
                        </tr>
                    </thead>
                    </table>
                    <ul class="list-payment">
                        <li id="sub-text" style="font-size: 12pt">ดำเนินการโดยการ Click ที่ปุ่ม => <a href="./list_cart.php">ชำระสินค้า</a></li>
                        <li id="sub-text" style="font-size: 12pt">เมื่อคลิกปุ่มขั้นตอนด้านบนแล้ว ระบบจะไปหน้าหน้ารายการ Order ทั้งหมด</li>
                        <li id="sub-text" style="font-size: 12pt">ให้ทำการ Click "แจ้งโอนเงิน" และโอนเงินตามรูปแบบที่ลูกค้าต้องการ</li>
                        <li id="sub-text" style="font-size: 12pt">เมื่อโอนเงินเสร็จแล้วให้ Click "แจ้งโอนเงิน" และกรอกข้อมูล</li>
                        <li id="sub-text" style="font-size: 12pt">Click "OK" เพื่อส่งข้อมูลแจ้งโอนเงิน</li>
                    </ul>
                </div>
                <div class="checkout-footer desktop">
                    <center>
                    <button class="w3-button w3-blue"><i class="fa-solid fa-plus"></i> เลือกสินค้าต่อ </button>
                    <!-- <a href="./checkout_confirm_step2.php" class="btn btn-checkout"><i class="fa-solid fa-cart-shopping"></i> ยืนยันและดำเนินการต่อ</a> -->
                    <button type="submit" class="w3-button w3-orange" value="1" name="post">ยืนยันและดำเนินการต่อ</button>
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