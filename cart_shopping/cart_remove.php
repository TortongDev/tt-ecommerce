<?php
session_start();
$product_id_to_remove = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; // Replace with the actual product ID you want to remove

// Check if the product is in the cart
if (isset($_SESSION['cart'][$product_id_to_remove])) {
    // Remove the product from the cart
    unset($_SESSION['cart'][$product_id_to_remove]);
    
    // Optionally, you can also update the cart and display a message
    // indicating that the product has been removed.
    
    // For example, you can redirect the user to the cart page or refresh the current page.
    header('Location: get.php'); // Replace with the appropriate URL
    exit();
} else {
    // Product not found in the cart; you can display an error message or handle it as needed.
}


?>