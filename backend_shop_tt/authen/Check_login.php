<?php
session_start();

$_SESSION['AUTHEN_PERMISSION'] = 'USER';
$_SESSION['USERNAME'] = 'KITTITHAT101';
$_SESSION['FIST_NAME'] = 'KITTITHAT';

$permission = isset($_SESSION['AUTHEN_PERMISSION']) ? htmlspecialchars(trim($_SESSION['AUTHEN_PERMISSION'])) : '';
switch ($permission) {
    case 'USER':
        if($_SESSION['USERNAME'] !== 'KITTITHAT101' && $_SESSION['FIST_NAME'] !== 'KITTITHAT'):
            // header('Location: login.php');
            // exit;
        else:
            header('Location: index.php');
        endif;
        
        break;
    case 'ADMIN':

        break;
    default:
        break;
}

?>