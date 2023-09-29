<?php

require_once "./autoload_class.php";
require_once "./checkAdmin.php";

//
$connection = new Connection(true);
$checkadmin = new checkAdmin;
$checkadmin->checkLoginAdmin();


$login = isset($_POST['login']) ? htmlspecialchars(trim($_POST['login'])) : '';
if($login == 'success'):
    $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
    $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';
    $sql_admin = "SELECT * FROM  authen_admin WHERE 1=1 AND authen_username = ? AND authen_password = ? ";
    $stmt_admin = Connection::$pdo->prepare($sql_admin);
    $stmt_admin->execute(array($username,$password));
    if($stmt_admin->rowCount() > 0):
        while($read = $stmt_admin->fetch()):
            $_SESSION['AUTHEN_ADMIN_ID'] = $read['authen_user_id'];
            header("Location: index.php");
        endwhile;
    else:
    endif;

else:

endif;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authen</title>
    <style>
        html,body {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12pt;
            font-family: 'Niramit', sans-serif;
        }
        input[name='username'],input[name='password']{
            width: 100%;
            font-size: 1.3rem;
            height: 40px;
            border-radius: 3px;
            border: 1px solid silver;
            outline: none;
           
        }
        input[name='username']:focus,input[name='password']:focus{
            border: 1px solid gray;
           
        }
        .container-authen {
            width: 500px;
            height: fit-content;
            margin: auto;
            border: 1px solid silver;
            border-radius: 3px;
            padding: 10px;
        }
        form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap:10px;
        }
        input[name=login] {
            padding: 10px;
            background-color: #008b76;
            border-radius: 3px;
            color: white;
            outline: none;
            border: 0px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[name=login]:hover {
            opacity: 0.8;
        }
        .text-center {
            text-align: center;
        }
    </style>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container-authen">
        <div class="title-authen">
            <h2 class="text-center">Authen Backend</h2>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <input type="submit" name="login" value="success">
        </form>
    </div>
 
</body>
</html>
<?php

$connection = null;
exit;
?>