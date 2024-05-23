<?php

    session_start();
    include "config.php";

    // Get product Id which takes from product list page
    $prodid = $_GET['productId'];

    // Fetching selected product into database
    $sql = "Select * from products where product_id = $prodid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);      
?>
<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Product - <?php echo $row['name']; ?></title>

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

  <!-- Stylesheets -->
  <link href="css/style2.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--Favicon-->
  <link rel="icon" href="images/logo2.png" type="image/x-icon">

</head>

  <body id="body">
  
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


  <section class="section">
    <div class="container">
      <div class="product-under">
          <div class="row">
              <div class="col-md-5 mb-4 mb-md-0">
              <!-- Image slider -->
              <?php 
                  if($row['category'] == "Shoes")
                  {
              ?>
                      <div class="product-image-slider mt-5">
                        <div class="productImage" data-image="<?php echo $row['image']; ?>">
                          <img class="img-fluid w-100" src="<?php echo $row['image']; ?>" alt="image1">
                        </div>

                        <div data-image="<?php echo $row['image2']; ?>">
                          <img class="img-fluid w-100" src="<?php echo $row['image2']; ?>" alt="image2">
                        </div>
                      </div>
              <?php
                  }
                  else
                  {     
              ?>
                      <div class="product-image-slider">
                        <div  class="productImage" data-image="<?php echo $row['image']; ?>">
                          <img class="img-fluid w-100" src="<?php echo $row['image']; ?>" alt="image1">
                        </div>

                        <div data-image="<?php echo $row['image2']; ?>">
                          <img class="img-fluid w-100" src="<?php echo $row['image2']; ?>" alt="image2">
                        </div>
                      </div>
              <?php
                  }
              ?>
              </div>
              <div class="col-lg-6 col-md-7 offset-lg-1">
                <h1 class="productName mb-4"><?php echo $row['name']; ?></h1>
                <p><strong>Product Color: </strong><?php echo $row['colour']; ?></p>
                <p class="price py-4">RM<span class="priceValue"><?php echo $row['price']; ?></span>.00</p>
                <!-- Product form to add into shopping cart -->
                <form action="cart.php" method="post">
                      <input type="number" class="form" id="quantity" name="quantity" placeholder="Quantity" min="1" max="20" required>
                      <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                      <input type="submit" value="Add To Cart" class="mb-5 addToCart">
                </form>
                <div class="content">
                  <p><?php echo $row['productDescription']; ?></p>
                </div>
              </div>
          </div>
      </div>
    </div>
  </section>

  <!-- Javascript links -->
  <script src="plugins/jquery/jquery.js"></script>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>

  <script src="plugins/slick/slick.min.js"></script>

  <script src="js/script.js"></script>

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

<script src="js/shoppingCart2.js"></script>