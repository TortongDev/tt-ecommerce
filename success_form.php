<?php
session_start();

// if(@$_SESSION['STATUS_CART_SUCCESS']===1):


// else:
//     http_response_code(404);
//     exit;
// endif;
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
                <h2 class="main-text">ชำระเงิน</h2>
                <h2 class="sub-text">หมายเลข ORDER #<?php echo $_SESSION['ORDERID'] ?></h2>
                <h4 class="sub-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur consequatur laboriosam dolorum, nulla ad quasi officiis! Natus quam iure tempora!</h4>
            </center>
            <!-- <img src="./img-shop/code.svg" width="200" alt=""> -->
            <div class="grid-3">
                <ul> 
                    <img src="./img-shop/scb.png" width="200" style="padding-block: 20px" alt=""><br>
                    <li>ธนาคารไทยพาณิช</li>
                    <li>ชื่อบช sssss</li>
                    <li>เลขบช. 1234567890</li>
                    
                </ul>
                <ul> 
                    <img src="./img-shop/prompt_pay.png" width="200" style="padding-block: 20px" alt=""><br>
                    <li>Prompt Pay ธนาคารไทยพาณิช</li>
                    <li>ชื่อบช sssss</li>
                    <li>เลขบช. 0910174918</li>
                    
                </ul>
                <ul> 
                    <img src="./img-shop/logo-truemoneywallet-300x300-1.jpg" width="200" style="padding-block: 20px" alt=""><br>
                    <li>True Monney Wallet</li>
                    <li>ชื่อบช sssss</li>
                    <li>เลขบช. 1234567890</li>
                    
                </ul>
               
            </div>
            <br><br><br>
            <center>
            <a href="#" class="btn btn-payment">
                แจ้งชำระเงิน
            </a>
            </center>

          
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
    

    if (result.isConfirmed) {
        const formData = new FormData();
        const id = document.querySelector('#ORDER_ID').value;
        const fileToUpload = document.querySelector('#fileToUpload');
        let file = fileToUpload.files[0];
        if(id != "<?php echo $_SESSION['ORDERID']; ?>"){
            Swal.fire(
                'หมายเลข Order ไม่ตรงกัน!',
                // 'Your file has been deleted.',
                'error'
            )
        }
        formData.append('PAYMENT_ORDER_ID'  , document.querySelector('#ORDER_ID').value);
        formData.append('FIST_NAME'         , document.querySelector('#FIST_NAME').value);
        formData.append('PAYMENT_PRICE'     , document.querySelector('#PAYMENT_PRICE').value);
        formData.append('fileToUpload'     , file);
        
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
        .catch(error => console.log(error))

       
        }
    })

    })
</script>
</body>
</html>