<?php
require_once __DIR__."/app/config/config_pach.php";
require_once PATCH_CONNECTION;
$checkAuthen = new Connection();

// if(@$_SESSION['STATUS_CART_SUCCESS']===1):


// else:
//     http_response_code(404);
//     exit;
// endif;

$checkAuthen->openConnection();
$ORDER_ID        = isset($_GET['codeid']) ? htmlspecialchars(trim($_GET['codeid'])) : '';
$STMT = Connection::$pdo->prepare('SELECT * FROM `kanji_orders` WHERE ? AND USER_ID = ? AND ORDER_ID = ?');
$STMT->execute(array('1=1',$_SESSION['AUTHEN_USER_ID'],$ORDER_ID));
$RCHECK_ORDER_ID = $STMT->fetch(PDO::FETCH_ASSOC);
// echo (string);
if(empty($RCHECK_ORDER_ID['ORDER_ID'])):
    http_response_code(404);
    exit;

endif;
unset($_SESSION['CONFIRM']);
unset($_SESSION['CART']);
unset($_SESSION['STATUS_CONFIRM']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    <style>
        html,body{
            margin: 0;
            padding: 0px;
            width: 100%;
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background-color: silver;
        }
        .container-status {
            border-radius: 5px;
            width: 900px;
            height: 90%;
            background-color: white;
            padding: 20px;
        }
        .swal2-popup {
            background-color: white !important;
        }
        .form-control {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
    
        <div class="container-status">
            <center>
                <h3 id="main-text">ชำระเงิน</h3>
                <h3 id="sub-text">หมายเลข ORDER <font color="orange"><?php echo $ORDER_ID; ?></font></h3>
                <h4 id="sub-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur consequatur laboriosam dolorum, nulla ad quasi officiis! Natus quam iure tempora!</h4>
            </center>
            <br />
            <!-- <img src="./img-shop/code.svg" width="200" alt=""> -->
            <div class="grid-3">
                <ul> 
                    <img src="./img-shop/scb.png" width="150" style="padding-block: 20px" alt=""><br><br>
                    <li>ธนาคารไทยพาณิช</li>
                    <li>ชื่อบช sssss</li>
                    <li>เลขบช. 1234567890</li>
                    
                </ul>
                <ul> 
                    <img src="./img-shop/prompt_pay.png" width="150" style="padding-block: 20px" alt=""><br><br>
                    <li>Prompt Pay ธนาคารไทยพาณิช</li>
                    <li>ชื่อบช sssss</li>
                    <li>เลขบช. 0910174918</li>
                    
                </ul>
                <ul> 
                    <img src="./img-shop/logo-truemoneywallet-300x300-1.jpg" width="150" style="padding-block: 20px" alt=""><br><br>
                    <li>True Monney Wallet</li>
                    <li>ชื่อบช sssss</li>
                    <li>เลขบช. 1234567890</li>
                    
                </ul>
               
            </div>
            <br><br><br>
            <center>
            <a href="#" class="btn btn-payment">
                <i class="fa-solid fa-paper-plane"></i> แจ้งชำระเงิน
            </a>
            </center>
            <br />
            </div>
    </div>
<script>
document.querySelector('.btn-payment').addEventListener('click',function(){
        Swal.fire({
        title: '<strong style="color: black;">แจ้งโอนเงิน</strong>',
        icon: 'info',
        html:
            '<label for="ORDER_ID">หมายเลขบิล (เช่น KANJI_1001 )</label>'+
            '<input type="text" id="ORDER_ID" class="form-control">' +
            '<label for="FIST_NAME">ชื่อจริงผู้สั่ง</label>'+
            '<input type="text" id="FIST_NAME" class="form-control"> ' +
            '<label for="PAYMENT_PRICE">ยอดเงินที่ชำระ</label>'+
            '<input type="text" id="PAYMENT_PRICE" class="form-control"> ' +
            '<label for="ORDER_ID">อัพโหลดสลิปการโอน</label>'+
            '<input type="file" id="fileToUpload" name="fileToUpload" class="form-control">',
        showCloseButton: true,
        focusConfirm: false
    }).then((result) => {
        

        if (result.isConfirmed) { // <== START IF CHECK REQUEST SUCCESS (1)
            const formData = new FormData();
            const id = document.querySelector('#ORDER_ID').value;
            const fileToUpload = document.querySelector('#fileToUpload');
            let file = fileToUpload.files[0];
            
            if(id != "<?php echo $RCHECK_ORDER_ID['ORDER_ID']; ?>"){ // <== start if check order_id (2)
                Swal.fire(
                    'หมายเลข Order ไม่ตรงกัน!',
                    'โปรดกรอกหมายเลข Order ใหม่อีกครั้ง.',
                    'error'
                )
                return 0;
            }else{
            formData.append('PAYMENT_ORDER_ID'  , document.querySelector('#ORDER_ID').value);
            formData.append('FIST_NAME'         , document.querySelector('#FIST_NAME').value);
            formData.append('PAYMENT_PRICE'     , document.querySelector('#PAYMENT_PRICE').value);
            formData.append('fileToUpload'     , file['name']);
            
            fetch('./ViewControllers/OrderPaymentController.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then((data)=>{
                    Swal.fire(
                    'ยืนยันชำระเงินสำเร็จ!',
                    'success'
                    )
                    location.href='./success_payment_confirm.php'
            })
            
            .catch(error => console.log(error)) // <== end if check order_id (2)
            }
        
        } // <== END IF CHECK REQUEST SUCCESS (1)
        
    })
})
</script>
</body>
</html>