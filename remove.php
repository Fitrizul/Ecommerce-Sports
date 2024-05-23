<?php
session_start();


// Check if the product is in the shoppiing cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
    header('location: shoppingCart.php');
    exit;
}

?>