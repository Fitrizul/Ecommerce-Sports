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

// Fetching all products from database
$sql = "Select * from products";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_assoc($result);

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');
    // Need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the product price subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['product_id']];
    }
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) 
{
  // Loop through the post data to update the quantities for every product in cart
  foreach ($_POST as $k => $v) {
      if (strpos($k, 'quantity') !== false && is_numeric($v)) {
          $id = str_replace('quantity-', '', $k);
          $quantity = (int)$v;
          // Validate product in the cart
          if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
              // Update new quantity
              $_SESSION['cart'][$id] = $quantity;
          }
      }
  }
  // Prevent form resubmission...
  header('location: shoppingCart.php');
  exit;
}

if (isset($_POST['checkout']) && isset($_SESSION['cart'])) 
{
  header('location: shipping.php'); // Redirect to shipping page
  exit;
}


?>
<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Shopping Cart</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="FitS">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="FitS">
  <meta name="generator" content="FitS E-Commerce Website">
  
  <!-- theme meta -->
  <meta name="theme-name" content="FitS" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid&#43;Serif:400%7cJosefin&#43;Sans:300,400,600,700 ">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css ">
  <link rel="stylesheet" href="plugins/themefisher-font/themefisher-font.min.css ">
  <link rel="stylesheet" href="plugins/slick/slick.min.css ">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Stylesheets -->
  <link href="css/style2.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="icon" href="images/logo2.png" type="image/x-icon">

</head><body id="body">
  
<!-- preloader start -->
<div class="preloader"></div>
<!-- preloader end -->

<!-- Navigate to the top of the page -->
<button id="btnScrollToTop">
    <i class="fa fa-arrow-up"></i>
</button>

<!-- Navigation bar -->
<header class="navigation sticky-top bg-white">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="index.php"> <img src="images/logo2.png" alt="FitS" width="70px" height="45px">
      </a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto mr-n0 mr-md-n3">

        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#!" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop<i class="tf-ion-chevron-down"></i></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="productsJerseys.php">Jerseys</a></li>
              <li><a class="dropdown-item" href="productsPants.php">Pants</a></li>
              <li><a class="dropdown-item" href="productsSlippers.php">Slippers</a></li>
              <li><a class="dropdown-item" href="productShoes.php">Shoes</a></li>
              <li><a class="dropdown-item" href="productsBags.php">Bags</a></li>
              <li><a class="dropdown-item" href="productsEquipment.php">Equipment</a></li>       
            </ul>
          </li>
          <!-- Navbar section visible for login users -->
           <?php
          if (isset($_SESSION['id'])){
          ?>
          
            <li class="nav-item">
              <a class="nav-link" href="myOrder.php">Orders</a>
            </li>
          <?php 
          }
          ?>

          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <!-- Navbar section visible for guest user -->
          <?php
          if (empty($_SESSION['id'])){

          ?>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Sign Up</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
          <?php 
          }
          else{
          ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
          <?php 
          }
          ?>
          
          <div class="link-icons">
            <a href="shoppingCart.php">
					    <i class="fas fa-shopping-cart" title="Shopping Cart"></i>
              <?php $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?>
              <span><?php echo $num_items_in_cart; ?></span>
				    </a>
          </div>
        </ul>
      </div>
    </nav>
  </div>
</header>

<section class="section2">
    <div class="container">
        <div class="cart content-wrapper">

            <h1>Shopping Cart</h1>
            <!-- Shopping cart form which can functionally update the quantity of the product or remove it from the cart -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Product</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Empty shopping cart -->
                        <?php if (empty($products)){ ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                        </tr>
                        <?php }else{?>
                        <!-- Loop through each product in shopping cart for display -->
                        <?php foreach ($products as $product) {?>
                        <tr>
                            <td class="img">
                                <a href="product-details2.php?productId=<?=$product['product_id']?>">
                                    <img src="<?=$product['image']?>" width="75" height="75" alt="<?=$product['name']?>">
                                </a>
                            </td>
                            <td>
                                <a href="product-details2.php?productId=<?=$product['product_id']?>" style="color: #f9a743;"><?=$product['name']?></a>
                                <br>
                                <a href="remove.php?remove=<?=$product['product_id']?>" class="remove" name="remove">Remove</a>
                            </td>
                            <td class="price">RM<span id="priceValue"><?=$product['price']?></span></td>
                            <td class="quantity">
                                <input type="number" id="quantity" name="quantity-<?=$product['product_id']?>" value="<?=$products_in_cart[$product['product_id']]?>" placeholder="Quantity" min="1" required>
                            </td>
                            <td class="price" id="priceTotal">RM<?=$product['price'] * $products_in_cart[$product['product_id']]?></td>
                        </tr>
                        <?php }}?>
                        <?php if (empty($products)){ ?>
                            <br><br>
                        <?php }?>
                        <br>
                    </tbody>
                </table>
                <div class="subtotal">
                    <span class="text">Subtotal</span>
                    <span class="price">RM<?=$subtotal?></span>
                </div>
                <div class="buttons">
                    <input type="submit" value="Update" name="update">
                    <input type="submit" value="Checkout" name="checkout">
                </div>
            </form>
        </div>
    </div>
</section>

<script src="plugins/jquery/jquery.js"></script>

<script src="plugins/bootstrap/bootstrap.min.js"></script>

<script src="plugins/slick/slick.min.js"></script>

<script src="js/script.js"></script>

<script src="js/shoppingCart.js"></script>

<div class="icons">
  <ul>
      <a href="https://www.facebook.com/" target="_blank"><li class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
      <a href="https://twitter.com/" target="_blank"><li class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
      <a href="https://www.youtube.com/" target="_blank"><li class="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></li></a>
      <a href="https://www.linkedin.com/" target="_blank"><li class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
      <a href="https://www.instagram.com/" target="_blank"><li class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></li></a>
  </ul>
</div>

<script>
  const btnScrollToTop = document.querySelector("#btnScrollToTop");

  btnScrollToTop.addEventListener("click", function() {

  $("html, body").animate({ scrollTop: 0 }, "slow");
});
</script>


</body>
</html>

<!-- Footer section -->
<footer style="font-family: 'Poppins', sans-serif">
    <div class="container2">
      <div class="row">
         <div class="col" id="company" style="min-width: 400px;">
              <img src="images/logo4.png" alt="" class="logo">
              <p>
                  We provide a wide range of high-quality sportswear clothes and accessories
                  for online shopping on our website.
              </p>
              <div class="social" style="margin-top:-15px">
                  <a href="https://www.facebook.com/" ><i class="fab fa-facebook"></i></a>
                  <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                  <a href="https://www.youtube.com/" ><i class="fab fa-youtube"></i></a>
                  <a href="https://twitter.com/" ><i class="fab fa-twitter"></i></a>
                  <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
              </div>
          </div>

          <div class="col" id="services">
            <h3>Quick Link</h3>
            <div class="links">
              <a href="index.php">Home</a>
              <a href="productsJerseys.php">Shop</a>
              <a href="about.php">About Us</a>
              <a href="contact.php">Contact</a>
            </div>
          </div>

          <div class="col" id="useful-links">
            <h3>Category</h3>
            <div class="links">
              <a href="productsJerseys.php">Jerseys</a>
              <a href="productsPants.php">Pants</a>
              <a href="productShoes.php">Shoes</a>
              <a href="productsBags.php">Bags</a>
            </div>
          </div>

          <div class="col" id="contact" style="margin-top:10px">
            <h3>Contact</h3>
            <div class="contact-details" style="width:220px;">
              <i class="fa fa-location-arrow"></i>
              <p>No 32, Jalan Perawan 3, <br> Taman Bukit Rambai,<br> 75250 Malacca</p>
            </div>
            <div class="contact-details">
              <i class="fa fa-phone"></i>
              <p>+017 619 3230</p>
            </div>
          </div>
      </div>
    </div>
</footer>

