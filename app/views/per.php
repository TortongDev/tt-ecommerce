<?php
session_start();
require_once "./checkAdmin.php";
$checkAdmin = new checkAdmin;
$checkAdmin->checkAdmin();
echo "Hello Per.php"; 
?>