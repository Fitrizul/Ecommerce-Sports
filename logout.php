<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['cart']);
// Redirect to the guest home page
header("Location: index.php");
exit();
?>