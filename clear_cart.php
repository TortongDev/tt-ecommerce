<?php
session_start();

if(isset($_GET['cls']) == '1'){
    unset($_SESSION['CART']);
    header("Location: ./checkout_cart.php");
    exit;

}
?>