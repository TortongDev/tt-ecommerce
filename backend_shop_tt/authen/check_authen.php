<?php
session_start();

require_once "../class/Connection.php";

$username = isset($_GET['USERNAME']) ? htmlspecialchars(trim($_GET['USERNAME'])) : '';
$password = isset($_GET['PASSWORD']) ? htmlspecialchars(trim($_GET['PASSWORD'])) : '';

$DB = new Connection(true);
$sql_authen_users = "SELECT AUTHEN_USERNAME , FIRST_NAME , AUTHEN_STATUS FROM AUTHEN_USERS WHERE 1=1 AND AUTHEN_USERNAME = ? AND AUTHEN_PASSWORD = ?";
$STMT_AUTHEN_USERS = $DB->pdo->prepare($sql_authen_users);
$STMT_AUTHEN_USERS->execute(array($username,$password));
$AUTHEN_USERS = $STMT_AUTHEN_USERS->rowCount();


$check = array();

    if(!empty($AUTHEN_USERS)):
        while ($F_USERS = $STMT_AUTHEN_USERS->fetch()):
            $_SESSION['AUTHEN_PERMISSION']  = 'USER';
            $_SESSION['USERNAME']           = $F_USERS['AUTHEN_USERNAME'];
            $_SESSION['FIST_NAME']          = $F_USERS['FIRST_NAME'];
            $check['USERNAME']   = $F_USERS['AUTHEN_USERNAME'];
            $check['FIRST_NAME'] = $F_USERS['FIRST_NAME'];
            

        endwhile;
        // exit;
    else:
        session_destroy();
        header('Location: login.php');
       exit;
    endif;


    $permission = isset($_SESSION['AUTHEN_PERMISSION']) ? htmlspecialchars(trim($_SESSION['AUTHEN_PERMISSION'])) : '';
    switch ($permission) {
    case 'USER':
        if($_SESSION['USERNAME'] == $check['USERNAME'] && $_SESSION['FIST_NAME'] == $check['FIRST_NAME']):
           
        else:
            header('Location: login.php');
            exit;
        endif;
        
        break;
    case 'ADMIN':

        break;
    default:
        break;
    }
    // var_dump($check);
    // exit;




?>