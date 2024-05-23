<?php
session_start();
include "config.php";

//Condition to determine if user is already login
if (isset ($_SESSION['id']))
{

        //Condition to determine if there is product id
        if (isset ($_POST['product_id']))
        {
            include "config.php";

            //Convert string to integer
            $product_id = (int)$_POST['product_id'];
            $quantity = (int)$_POST['quantity'];

            //Fetching selected product from database same with product id
            $sql = "Select * from products where product_id = $product_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result); 

            //Condition to determine if cart is in the session
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    // Update the quantity if the product exists in cart
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    // Add the product to the cart 
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                // Add the first product to cart when there are no products in cart
                $_SESSION['cart'] = array($product_id => $quantity);
            }
            // Prevent form resubmission...
            if($row['category'] == "Jerseys")
            {
                header('location: productsJerseys.php');
                exit;
            }
            elseif($row['category'] == "Pants")
            {
                header('location: productsPants.php');
                exit;
            }
            elseif($row['category'] == "Slippers")
            {
                header('location: productsSlippers.php');
                exit;
            }
            elseif($row['category'] == "Shoes")
            {
                header('location: productShoes.php');
                exit;
            }
            elseif($row['category'] == "Bags")
            {
                header('location: productsBags.php');
                exit;
            }
            elseif($row['category'] == "Equipment")
            {
                header('location: productsEquipment.php');
                exit;
            }
        }
}
//Redirect to the login page
else
{
    header('location: login.php');
    exit;
}


?>