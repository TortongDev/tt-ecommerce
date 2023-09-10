<?php
session_start();

unset($_SESSION['CART'][$_GET['id']]);

header("Location: ./checkout_cart.php");
exit;
?>