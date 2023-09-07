<?php
    require_once "./backend_shop_tt/class/Connection.php";
    session_start();
    $ndb    = new Connection(true);

    $users = array();
    
    $users['username']      = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
    $users['password']      = isset($_GET['password']) ? htmlspecialchars($_GET['password']) : '';
    $check                  = isset($_GET['act']) ? htmlspecialchars($_GET['act']) : '';

    $user = $users['username'];
    $pass = $users['password'];
    if(@$_SERVER['SERVER_NAME']!='localhost'){
        $stmt   = $ndb->pdo->query("SELECT * FROM `authen_users` WHERE 1=1 AND authen_username = '{$user}' AND authen_password = '{$pass}' ");
        $countAll = $stmt->rowCount();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if($countAll > 0 ):
            $_SESSION['username'] = $r['authen_username'];
            $_SESSION['password'] = $r['authen_password'];
        endif;
        
    if($check == 'login'):
        if(isset($countAll) > 0 ):
            if(!empty($users['username'])):
                if($users['username'] == $_SESSION['username'] && $users['password'] == $_SESSION['password'] ):
                    // header('location: index.php');?
                    echo $users['username'];
                    echo "<br>";
                    echo $_SESSION['username'];
                    exit;

                else:
                    echo "ไม่สำเร็จ";
                endif;
            else:

            endif;
        endif;
    else:

    endif;
}
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
    </style>
</head>
<body>
    <div id="wrapper">
        <form action="" method="get">
            <div class="container-login">
                <section class="login-form">
                    <h3>Login | เข้าสู่ระบบ</h3>
                    <div class="form">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit" name="act" value="login">Login</button>
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