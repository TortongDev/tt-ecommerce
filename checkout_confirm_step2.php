<?php
    require_once __DIR__."/app/config/config_pach.php";
    require_once PATCH_CONNECTION;
    $checkAuthen = new Connection();
    $checkAuthen->authenPermission();
    $checkAuthen->openConnection();

    if(empty($_SESSION['STATUS_CONFIRM'])){
        http_response_code(404);
        exit;   
    }else{

    }
    // $product_id     = isset($_GET['product_id'])            ? htmlspecialchars(trim($_GET['product_id']))       : '';
    // $product_member_id = isset($_GET['product_member_id'])  ? htmlspecialchars(trim($_GET['product_member_id'])) : '';
    // $product_name   = isset($_GET['product_name'])          ? htmlspecialchars(trim($_GET['product_name']))     : '';
    // $product_type   = isset($_GET['product_type'])          ? htmlspecialchars(trim($_GET['product_type']))     : '';
    // $product_price  = isset($_GET['product_price'])         ? htmlspecialchars(trim($_GET['product_price']))    : '';
    // $user_id        = isset($_GET['user_id'])               ? htmlspecialchars(trim($_GET['user_id']))          : '';
    
    $POST_ORDER        = isset($_POST['POST_ORDER'])      ? htmlspecialchars(trim($_POST['POST_ORDER']))          : '';
    $_SESSION['STATUS_CART_SUCCESS'] = 1;
    $FIST_NAME  = $_SESSION['CONFIRM']['FIST_NAME'];
    $LAST_NAME  = $_SESSION['CONFIRM']['LAST_NAME'];
    $ADDRESS_MOO = $_SESSION['CONFIRM']['ADDRESS_MOO'];
    $ADDRESS_NUMBER = $_SESSION['CONFIRM']['ADDRESS_NUMBER'];
    $JUNGWAT    = $_SESSION['CONFIRM']['JUNGWAT'];
    $AMPHOR     = $_SESSION['CONFIRM']['AMPHOR'];
    $TUMBON     = $_SESSION['CONFIRM']['TUMBON'];
    $PROVINCE   = $_SESSION['CONFIRM']['PROVINCE'];
    $TEL        = $_SESSION['CONFIRM']['TEL'];
    $ORDER_ID   = $_SESSION['CONFIRM']['ORDER_ID'];
    $USER_ID    = $_SESSION['AUTHEN_USER_ID'];
    $_SESSION['ORDERID'] = $ORDER_ID;
    if($POST_ORDER === 'POST'):
      
        $STMT_INSERT = Connection::$pdo->prepare(
            "
                INSERT INTO `kanji_orders`(`ORDER_ID`, `FIST_NAME`, `LAST_NAME`,  `JUNGWAT`, `AMPHOR`, `TUMBON`, `PROVINCE`, `ADDRESS_NUMBER`, `ADDRESS_MOO`, `TEL`,`USER_ID`) 
                VALUES (?,?,?,?,?,?,?,?,?,?)
            "
        );
        $STMT_INSERT->execute(array(
            $ORDER_ID,
            $FIST_NAME,
            $LAST_NAME,
            $JUNGWAT,
            $AMPHOR,
            $TUMBON,
            $PROVINCE,
            $ADDRESS_NUMBER,
            $ADDRESS_MOO,
            $TEL,
            $USER_ID
        ));
        $loopSql = "INSERT INTO `kanji_order_list`(`ORDER_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_AMOUNT`, `PRODUCT_ID`) VALUES (?,?,?,?,?)";
        $cart = @$_SESSION['CART'];
        if(!empty($cart)):
            foreach($cart  as $key => $value):  
                $insertLoop = Connection::$pdo->prepare($loopSql);
                $insertLoop->execute(
                    array(
                        $_SESSION['CONFIRM']['ORDER_ID'],
                        $value['product_name'],
                        $value['product_price'],
                        $value['product_amount'],
                        $key
                    )
                );

            endforeach; 
        endif;
        
        if($STMT_INSERT){
            header("Location: success_form.php?codeid=". $_SESSION['CONFIRM']['ORDER_ID']);
            exit;
        }else{
    
        }
    
       
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanji Farm Korat</title>
    
    <link rel="icon" type="image/x-icon" href="./kanji_farm.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./style.css">
    <style>
        html,body {
            width: 100%;
            height: 100%;
        }
        #wrapper {
            height: 100%;
        }
        .containers {
            height: 100%;
        }
        footer {
            position: relative !important;
        }
        table {
            width: 100%;
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
<div id="wrapper">
    <?php include ('./header-template.php'); ?>
    <div class="tabbar-checkout">
        <h2 class="">ยืนยันซื้อสินค้า</h2>
    </div>
    <div class="containers">
        <article class="container-payment-success">
           <section>
           <table>
                <thead style="overflow: auto;">
                        <tr>
                            <th>#</th>
                            <th>รหัสสินค้า</th>
                            <th >รายการสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
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
                            <td><input type="hidden" style="width:50px" id="<?php echo $key ?>" value="<?php echo $value['product_amount']; ?>" name="p_amount" class="form-control"><?php echo $value['product_amount']; ?></td>
                            <td><?php echo $value['product_price']; ?></td>
                           
                        </tr>
                        </form>
                        <?php
                            endforeach; 
                            endif;
                        ?>
                     
                    </tbody>
                </table>
           </section>
          
        </article>

        <article class="container-payment-success">
            <section>
               <h4><u>ที่อยู่ส่งของ</u></h4>
                    <?php
                   
                        echo <<<ADDRESS
                            คุณ $FIST_NAME $LAST_NAME <br>
                            หมู่ที่ $ADDRESS_MOO บ้านเลขที่ $ADDRESS_NUMBER จังหวัด$JUNGWAT อำเภอ$AMPHOR ตำบล$TUMBON รหัสไปรษณี$PROVINCE เบอร์ติดต่อ $TEL
                        ADDRESS;
                    
                    ?>
           </section>
        </article>
        <form action="" method="post">
            <center><button type="submit" name="POST_ORDER" value="POST" class="btn btn-checkout">ยืนยันและดำเนินการต่อ</button></center>
        </form>
        
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