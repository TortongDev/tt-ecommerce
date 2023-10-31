<?php
   

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Shopping Kanji Farm</title>
    <script src="https://kit.fontawesome.com/833cbfbd69.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/x-icon" href="./img-shop/icon/title.ico">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .login-form {
            width: 90%;
            margin: auto;
        }
        html , body {
            background-color: white !important;
            height: 100%;
            width: 100%;
        }
        .container-login {
            width: 300px;
        }
        
        .login-form {
            width: 300px;
        }
        
        .form {
            width: 300px;
        }
        input {
            width: 300px;
            padding: 5px;
        }
     .btn {
        background-color: #aedbaf;
     }
     .title-img {
        display: flex;
        justify-content: center;
        align-items: center;
     }
     .login-form-title {
        text-align: center;
     }
     .container {
        width: 100%;
        height: 100%;
     }
    .row {
        display: grid;
        grid-template-columns: 1fr 500px;
        height: 100%;
     }
     .col{
        width: 100%;
        height: 100%;
     }
     .col:nth-child(1){
        position: relative;
        background-image: url('./img-shop/hydroponics-4447705_1280.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
     .col:nth-child(2){
        display: flex;
        justify-content: center;
        align-items: center;
     }
     .phone {
        display: none;
     }
    .pc {
        display: block;
        height: 100%;
    }
     @media only screen and (max-width: 700px) {
        .phone {
            display: block;
        }
        .pc {
            display: none;
        }
        html , body {
            height: 100%;
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
     }

    </style>
</head>
<body>
    <div class="phone">
    <!-- <section class="login-form-title"> <h3>Login | เข้าสู่ระบบ</h3></section> -->
    <?php
   
        if(isset($_SESSION['LOGIN_STATUS']) !== 1):
        echo <<<PHONE
        <div id="wrapper">
        <form action="" method="get">
        <div class="container-login">
            <section class="title-img">
                <img src="./img-shop/Kanji_Farm.png" style="margin: 0 auto; border-top-right-radius: 30px; border-bottom-left-radius: 30px; margin-block-end: 30px" width="250px" height="auto" alt="">
            </section>
            
            <section class="login-form">
            
                <div class="form">
                    <label for="PER_USERNAME">Username</label>
                    <input type="text" name="PER_USERNAME" id="PER_USERNAME" class="form-control">
                    <label for="PER_PASSWORD">Password</label>
                    <input type="password" name="PER_PASSWORD" id="PER_PASSWORD" class="form-control">
                    <label for="PER_FIRSTNAME">FIRSTNAME</label>
                    <input type="text" name="PER_FIRSTNAME" id="PER_FIRSTNAME" class="form-control">
                    <label for="PER_LASTNAME">LASTNAME</label>
                    <input type="password" name="PER_LASTNAME" id="PER_LASTNAME" class="form-control">
                    <label for="PER_TEL">TEL</label>
                    <input type="text" name="PER_TEL" id="PER_TEL" class="form-control">
                    <label for="PER_EMAIL">EMAIL</label>
                    <input type="password" name="PER_EMAIL" id="PER_EMAIL" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn" type="submit" name="act" value="login">เข้าสู่ระบบ</button>
                </div>
                <div class="form-group">
                    <div><a href="#"><i class="fa-brands fa-google"></i> Login for Google Account</a></div>
                </div>
            </section>
        </div>
        </form>
        </div>
        PHONE;
        else:
        endif;
   ?>
    </div>
    <div class="pc">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tab-heilight"></div>
                    <div class="tab-vegetable">
                        <!-- <img src="./img-shop/vegetable.png" width="400px" alt=""> -->
                    </div>
                </div>
                <div class="col">
                    <form action="" method="post" id="">
                    <div class="container-login">
                        <section class="title-img">
                            <img src="./img-shop/Kanji_Farm.png" class="fix-banner" alt="">
                        </section>
                        <section class="login-form">
                        
                            <div class="form" id="">
                            <label for="PER_USERNAME">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="PC_USERNAME" id="PC_USERNAME"  class="form-control" required><br>
                            <label for="PER_PASSWORD">รหัสผ่าน</label>
                            <input type="password" name="PER_PASSWORD" id="PER_PASSWORD" class="form-control" required><br>
                            <label for="PER_FIRSTNAME">ชื่อจริง</label>
                            <input type="text" name="PER_FIRSTNAME" id="PER_FIRSTNAME" class="form-control" required><br>
                            <label for="PER_LASTNAME">นาสกุล</label>
                            <input type="text" name="PER_LASTNAME" id="PER_LASTNAME" class="form-control" required><br>
                            <label for="PER_TEL">เบอร์มือถือ</label>
                            <input type="number" name="PER_TEL" id="PC_PER_TEL" maxlength="10" class="form-control" required><br>
                            <label for="PER_EMAIL">อีเมล</label>
                            <input type="text" name="PER_EMAIL" id="PER_EMAIL" class="form-control" required>
                            <input type="hidden" name="STATUS_POST" value="1">
                            <input type="hidden" name="STATUS_REGISTER" value="1">
                         
                            </div>
                            <div class="form-group">
                                <button id="registerPost" class="w3-btn w3-teal w3-block" style="margin-block: 5px;"><i class="fa-solid fa-right-to-bracket"></i> บันทึก</button>
                                <button id="reset" type="reset" class="w3-btn w3-khaki w3-block"><i class="fa-solid fa-trash-can-arrow-up"></i> ล้างแบบฟอร์ม</button>
                            </div>
                            <div class="form-group">
                                <!-- <div><a href="#"><i class="fa-brands fa-google"></i> Login for Google Account</a></div> -->
                            </div>
                        </section>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
            $(document).ready(()=>{
                $('#PC_USERNAME').on('keyup',function(){
                    if($(this).val().toUpperCase() == 'ADMIN'){
                        alert('ไม่อนุญาตให้ใช้ Username นี้');
                        $(this).val("");
                    }
                })
                // $('#PC_PER_TEL').on('keyup',function(){
                //     if($(this).val().length > '10'){
                //         alert('กำลังพิมพ์เกิน 10 ตัวอักษร');
                //         $(this).val("");
                //     }
                // });
            })
            let form = $('form');
            form.on('submit',(e)=>{
                e.preventDefault();
                function request_register (){
                    e.preventDefault();
                    $.ajax({
                        url: './ViewControllers/RegisterController.php',
                        type: 'post',
                        dataType: 'json',
                        data: $('form').serialize(),
                        success: function(data){
                            location.href = "./services/alert_process_register.php?STATUS_REGISTER=1";
                        },
                        error: function(err){

                        }
                    })
                    
                }
               
                request_register();
                
            })
       
    </script>  
</body>
</html>
