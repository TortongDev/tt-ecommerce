<?php

require_once "../../../autoload_class.php";
$connection = new Connection(true);
require_once "./checkAdmin.php";
$checkadmin = new checkAdmin;
$checkadmin->checkLoginAdmin();
$login = isset($_POST['login']) ? htmlspecialchars(trim($_POST['login'])) : '';

if($login == 'success'):
 
    $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
    $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';
    $sql_admin = "SELECT * FROM  authen_admin WHERE 1=1 AND authen_username = ? AND authen_password = ? ";
    $stmt_admin = $connection->pdo->prepare($sql_admin);
    $stmt_admin->execute(array($username,$password));
    if($stmt_admin->rowCount() > 0):
        while($read = $stmt_admin->fetch()):
            $_SESSION['AUTHEN_USER_ID'] = $read['authen_user_id'];
            header("Location: index.php");
        endwhile;
    else:
        echo "login false";
    endif;

else:
    echo "login sfalse";

endif;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit" name="login" value="success">
    </form>
</body>
</html>
<?php

$connection = null;
exit;
?>