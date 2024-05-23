<?php 

session_start();
include "config.php";

function pdo_connect_mysql() {
  
  $DATABASE_HOST = 'localhost';
  $DATABASE_USER = 'root';
  $DATABASE_PASS = '';
  $DATABASE_NAME = 'itemsports';
  try {
    return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
  } catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
  }
}

$pdo = pdo_connect_mysql();

// Fetching all product from database
$sql = "Select * from products";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_assoc($result);

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();

if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) 
{
  
  // Initialize variable take from the input
  $firstName = $_SESSION['fname'];
  $lastName = $_SESSION['lname'];
  $addressShip = $_SESSION['addressShip'];
  $emailShip = $_SESSION['emailShip'];
  $phoneShip = $_SESSION['phoneShip'];
  $addInformation = $_SESSION['addInfo'];
  
  $user_id = $_SESSION['id'];
  
  // Initialize empty array
  $product_name = [];
  $product_image = [];
  $product_price = [];
  $order_quantity = [];

  // Insert product in shopping cart to product array
  foreach ($products as $product)
  {
    $product_name[] = $product['name'];
    $product_image[] = $product['image'];
    $product_price[] = strval($product['price']);
    $order_quantity[] = strval($products_in_cart[$product['product_id']]);
  }

  $productName = implode("\n", $product_name);
  $productImage = implode("\n", $product_image);
  $productPrice = implode("\n", $product_price);
  $orderQuantity = implode("\n", $order_quantity);


  $order_totalPrice = $_SESSION['totalPrice'];
  $order_status = "Pending";

  $_SESSION['priceProduct'] = $productPrice;

  // Insert order details into database
  $sql2 = "INSERT INTO ordersport(user_id, product_name, product_image, product_price, order_quantity, order_totalPrice, order_status) VALUES('$user_id', '$productName', '$productImage', '$productPrice', '$orderQuantity', '$order_totalPrice', '$order_status')";
  $result2 = mysqli_query($conn, $sql2);

  // Insert shipping details into database
  $sql3 = "INSERT INTO shipping(firstName, lastName, address, emailCust, phoneNumber, addInfo) VALUES('$firstName', '$lastName', '$addressShip', '$emailShip', '$phoneShip', '$addInformation')";
  $result3 = mysqli_query($conn, $sql3);

  // Redirect to finish payment page
  if ($result2 && $result3) 
  {
        header("Location: finishPayment.php");
	    exit();

  }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="description" content="FitS">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <meta name="author" content="FitSs">
        <meta name="generator" content="FitS E-Commerce Website">
        <meta name="theme-name" content="FitS" />

        <title>Payment</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/stylePayment.css">

        <!--Favicon-->
        <link rel="icon" href="images/logo2.png" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <!--Payment Form -->
            <form method="post" id="paymentForm" name="paymentForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col">
                        <h3 class="title">Billing Address</h3>
                        <div class="inputBox">
                            <span>Full Name:</span>
                            <input type="text" name="namePayment" placeholder="Ahmad Fitri" required>
                        </div>
                        <div class="inputBox">
                            <span>Email:</span>
                            <input type="email" name="email" placeholder="example@example.com" required>
                        </div>
                        <div class="inputBox">
                            <span>Address :</span>
                            <input type="text" name="addressPayment" placeholder="Home" required>
                        </div>
                        <div class="inputBox">
                            <span>City :</span>
                            <input type="text" name="cityPayment" placeholder="Shah Alam" required>
                        </div>
                        <div class="flex">
                            <div class="inputBox">
                                <span>State :</span>
                                <input type="text" name="statePayment" placeholder="Selangor" required>
                            </div>
                            <div class="inputBox">
                                <span>Zip code :</span>
                                <input type="text"name="zipPayment"  placeholder="12345" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="title">Payment</h3>
                        <div class="inputBox">
                            <span>Cards accepted :</span>
                            <img src="images/card_img.png" alt="Cards Accepted">
                        </div>
                        <div class="inputBox">
                            <span>Name on card :</span>
                            <input type="text" name="cardName" placeholder="Mr. Ahmad Fitri" required>
                        </div>
                        <div class="inputBox">
                            <span>Credit card number :</span>
                            <input type="text" name="cardNumber" placeholder="1111-2222-3333-4444" required>
                        </div>
                        <div class="inputBox">
                            <span>Expiration month :</span>
                            <input type="text" name="expirateMonth" placeholder="January" required>
                        </div>
                        <div class="flex">
                            <div class="inputBox">
                                <span>Expiration year :</span>
                                <input type="number" name="expirateYear" placeholder="2022" required>
                            </div>
                            <div class="inputBox">
                                <span>CVV :</span>
                                <input type="text" name="cvvCode" placeholder="123"required >
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" name="submit" value="proceed to checkout" class="submit-btn">
            </form>
        </div>
    </body>
</html>