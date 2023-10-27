<?php
   require_once __DIR__."/app/config/config_pach.php";
   require_once PATCH_CONNECTION;
    $ndb    = new Connection(true);
    
    $ndb->authenUsers();

    $users = array();
    
    $users['username']      = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
    $users['password']      = isset($_GET['password']) ? htmlspecialchars($_GET['password']) : '';
    $check                  = isset($_GET['act']) ? htmlspecialchars($_GET['act']) : '';
    $user = $users['username'];
    $pass = $users['password'];
    // if(@$_SERVER['SERVER_NAME']!='localhost'){
        $stmt   = Connection::$pdo->query("SELECT * FROM `authen_users` WHERE 1=1 AND authen_username = '{$user}' AND authen_password = '{$pass}' ");
        $countAll = $stmt->rowCount();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if($countAll > 0 ):
            $_SESSION['AUTHEN_USER_ID'] = $r['authen_user_id'];
            $_SESSION['AUTHEN_USERNAME'] = $r['authen_username'];
            $_SESSION['AUTHEN_PASSWORD'] = $r['authen_password'];
            $_SESSION['LOGIN_STATUS'] = 1;
        endif;
        
    if($check == 'login'):
        if(isset($countAll) > 0 ):
            if(!empty( $user ) && !empty($pass )):
                if($user  == @$_SESSION['AUTHEN_USERNAME'] && $pass == @$_SESSION['AUTHEN_PASSWORD'] ):
                    header("Location: index.php");
                    exit;
                else:
                    header("Location: alert_process.php?STATUS_LOGIN=1");
                    exit;
                endif;
            else:

            endif;
        endif;
    else:

    endif;
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .login-form {
            width: 90%;
            margin: auto;
        }
        html , body {
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
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
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
                    <form action="" method="get">
                    <div class="container-login">
                        <section class="title-img">
                            <img src="./img-shop/Kanji_Farm.png" class="fix-banner" alt="">
                        </section>
                        <section class="login-form">
                        
                            <div class="form">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <button class="w3-button w3-teal w3-block" type="submit" name="act" value="login"><i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ</button>
                                <a href="./register-form.php" class="w3-button w3-blue w3-block" type="submit" name="act" value="login"><i class="fa-solid fa-user-plus"></i> สมัครสมาชิก</a>
                            </div>
                            <div class="form-group">
                                <div><a href="#"><i class="fa-brands fa-google"></i> Login for Google Account</a></div>
                               
                            </div>
                        </section>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>