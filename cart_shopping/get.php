<?php
session_start();
function displayCart() {
    if (empty($_SESSION['cart'])) {
        echo "Your cart is empty.";
    } else {
        foreach ($_SESSION['cart'] as $product_id => $product) {
            echo "ProductID: {$product['product_id']},Product: {$product['name']}, Price: {$product['price']}, Quantity: {$product['quantity']}<br>";
        }
    }
}
displayCart();
?>