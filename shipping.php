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
// Check if there are products in cart
if ($products_in_cart) {
    
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');
    //  Need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['product_id']];
    }
    $totalPrice = 6 + $subtotal;
}

//Check if all of the input shipping form has value
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['addressShip']) && isset($_POST['emailShip']) && isset($_POST['phoneShip'])) 
{

  $_SESSION['fname'] = $_POST['fname'];
  $_SESSION['lname'] = $_POST['lname'];
  $_SESSION['addressShip'] = $_POST['addressShip'];
  $_SESSION['emailShip'] = $_POST['emailShip'];
  $_SESSION['phoneShip'] = $_POST['phoneShip'];
  $_SESSION['addInfo'] = $_POST['addInfo'];
  $_SESSION['totalPrice'] = $totalPrice;

  
  header('location: payment.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="FitS">
  <meta name="author" content="FitS">
  <meta name="generator" content="FitS E-Commerce Website">

  <title>Shipping Form</title>

  <meta name="theme-name" content="FitS" />
  
  <!--Favicon-->
  <link rel="icon" href="images/logo2.png" type="image/x-icon" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid&#43;Serif:400%7cJosefin&#43;Sans:300,400,600,700 ">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css ">
  <link rel="stylesheet" href="plugins/themefisher-font/themefisher-font.min.css ">
  <link rel="stylesheet" href="plugins/slick/slick.min.css ">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/styleShipping.css" />
  
</head>

<body>

  <div class="preloader"></div>
  <!-- preloader end -->

  <!-- Navigate to the top of the page -->
  <button id="btnScrollToTop">
      <i class="fa fa-arrow-up"></i>
  </button>
  
  <!-- Navigation bar -->
  <header class="navigation sticky-top bg-white" style="font-family: 'Josefin Sans', sans-serif;">
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

    <div class="container my-5 py-5">


      <section>
        <!-- Shipping form -->
        <div class="row">
          <div class="col-md-8 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3" style="background-color: #f9a743; color:white;">
                <h5 class="mb-0 text-font text-uppercase" id="ship">Shipping address</h5>
              </div>
              <div class="card-body" style="background-color:#FAF9F6;">
              <form class="mb-2" method="post" id="shippingForm" name="shippingForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="fname" id="form11Example1" class="form-control" placeholder="First name" required/>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" name="lname" id="form11Example2" class="form-control" placeholder="Last name" required/>
                      </div>
                    </div>
                  </div>
    
                  <!-- Text input -->
                  <div class="form-outline mb-4">
                    <input type="text" name="addressShip" id="form11Example4" class="form-control" placeholder="Address" required/>
                  </div>
    
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="emailShip" id="form11Example5" class="form-control" placeholder="Email" required/>
                  </div>
    
                  <!-- Number input -->
                  <div class="form-outline mb-4">
                    <input type="text" name="phoneShip" id="form11Example6" class="form-control" placeholder="Phone" style="height: 40px;" required/>
                  </div>
    
                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="addInfo" id="form11Example7" placeholder="Additional information" rows="4"></textarea> 
                  </div>
    
                  <!-- Submit button -->
                  <div class="text-center">
                    <button type="submit" class="btn button-order col-md-10">Place Order</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Cart summary section -->
          <div class="col-md-4 mb-4 position-static">
            <div class="card mb-4">
              <div class="card-header py-3" style="background-color: white; float:left;">
                <h5 class="mb-0 text-font">Cart Summary
                  <a href="shoppingCart.php"><span class="float-end mt-1" style="font-size: 13px ; float:right">Edit</span></a>
                </h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <!-- Display all product in shopping cart -->
                  <?php foreach ($products as $product) {?>
                      <div class="col-5 col-lg-4 md-4 sm-4 xs-4">
                      <img src="<?=$product['image']?>" alt="<?=$product['name']?>"
                          class="rounded-3" style="width: 100px; height:100px;"  alt="Blue Jeans Jacket" />
                      </div>
                      <div class="col-7 col-lg-6 md-6 sm-6 xs-6 ms-3">
                        <span class="mb-0 text-price" >RM<?=$product['price']?>.00</span>
                        <p class="mb-0 text-descriptions"><?=$product['name']?> </p>
                        <span class="text-descriptions fw-bold" style="font-weight:bold;"><?=$product['colour']?></span>
                        <p class="text-descriptions mt-0">Quantity:<span
                            class="text-descriptions fw-bold" style="font-weight:bold;"><?=$products_in_cart[$product['product_id']]?></span>
                        </p>
                      </div>
                  <?php }?>

                </div>
                <div class="card-footer bg-transparent mt-4">
                  <ul>
                    <li
                      class="d-flex justify-content-between align-items-center border-0 px-0 pb-0 mb-2 text-muted">
                      Subtotal
                      <span>RM<?=$subtotal?>.00</span>
                    </li>
                    <li
                      class="d-flex justify-content-between align-items-center border-0 px-0 pb-0 mb-2 text-muted">
                      Shipping Price
                      <span>RM6.00</span>
                    </li>
                    <li
                      class="d-flex justify-content-between align-items-center px-0 fw-bold text-uppercase" style="font-weight:bold;">
                      Total to pay
                      <span>RM<?=$totalPrice?>.00</span>
                    </li>
                  </ul>
                </div>
    
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>


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

    <script type="text/javascript" src="js/mdb.min.js"></script>

    <!-- Footer section -->
    <footer style="font-family: 'Poppins', sans-serif">
      <div class="container2">
        <div class="row" id="foot">
          <div class="col" id="footerr" style="min-width: 400px;">
                <img src="images/logo4.png" alt="" class="logo">
                <p>
                    We provide a wide range of high-quality sportswear clothes and accessories
                    for online shopping on our website.
                </p>
                <div class="social" style="margin-top:-15px">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
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
</body>

</html>
