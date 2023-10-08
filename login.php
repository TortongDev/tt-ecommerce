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
                    echo "ไม่สำเร็จ";
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
    <style>
        .login-form {
            width: 90%;
            margin: auto;
        }
        html , body {
            height: 100%;
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
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
    </style>
</head>
<body>
    <div id="wrapper">
        <form action="" method="get">
            <div class="container-login">
                <section class="title-img">
                    <img src="./kanji_farm.jpg" style="margin: 0 auto; border-top-right-radius: 30px; border-bottom-left-radius: 30px;" width="200px" height="auto" alt="">
                </section>
                <section class="login-form-title"> <h3>Login | เข้าสู่ระบบ</h3></section>
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
</body>
</html>