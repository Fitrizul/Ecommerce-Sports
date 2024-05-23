<?php 

session_start();
include "config.php";

//Condition statement if the input has been submitted
if (isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['message'])) 
{

  //Initialize variable which take from the input form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  //Insert row into the database
  $sql = "INSERT INTO contact(name, email, message) VALUES('$name', '$email', '$message')";
  $result = mysqli_query($conn, $sql);

  //If insert successful redirect to the contact submit page
  if ($result) 
  {
      header('location: contactSubmit.php');
	    exit();
  }
  //Fail condition that redirect to the contact page
  else 
  {
	    header('Location: contact.php');
		  exit();
  }
}
?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid&#43;Serif:400%7cJosefin&#43;Sans:300,400,600,700 ">
    <link rel="stylesheet" href="plugins/themefisher-font/themefisher-font.min.css ">
    <link rel="stylesheet" href="plugins/slick/slick.min.css ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css "> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/styleContact.css">
    
    <!--Favicon-->
    <link rel="icon" href="images/logo2.png" type="image/x-icon">

    <title>Contact</title>
  </head>
  <body id="contactP">

    <div class="preloader"></div>

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

              <!-- Navbar section visible for login users -->
              <?php
              if (empty($_SESSION['id'])){

              ?>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Sign Up</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
              <!-- Navbar section visible for guest user -->
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

  <div class="backgroundContent" style="line-height: 2;">
    <div class="content" >
      
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mr-auto" style="top: -50px;">
            <!-- Title header -->
            <div class="mb-5">
              <h3 class="text-white mb-4">Contact Us</h3>
              <p class="text-white">At FitS, we are dedicated to make your online shopping experience with<br> us a pleasure. For additional information or questions, please contact us<br>via telephone or email us.</p>
            </div>
            <!-- Contact description -->
            <div class="row">
              <div class="col-md-6">
                <h3 class="text-white h5 mb-3">Malacca</h3>
                <ul class="list-unstyled mb-5">
                  <li class="d-flex text-white mb-2">
                    <span class="mr-3"><span class="icon-map"></span></span>No 32, Jalan Perawan 3, Taman Bukit Rambai, 75250 Malacca
                  </li>
                  <li class="d-flex text-white mb-2" id="contactP"><span class="mr-3"><span class="icon-phone"></span></span> +60 17 619 3230</li>
                  <li class="d-flex text-white" id="contactP"><span class="mr-3"><span class="icon-envelope-o"></span></span> fitS@contact.com </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Contact form -->
          <div class="col-lg-6">
            <div class="box">
              <h3 class="heading">Send us a message</h3>
              <form class="mb-5" method="post" id="contactForm" name="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12 form-group">
                    <label for="message" class="col-form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="4"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="Send Message" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="icons">
    <ul>
        <a href="https://www.facebook.com/" target="_blank"><li class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
        <a href="https://twitter.com/" target="_blank"><li class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
        <a href="https://www.youtube.com/" target="_blank"><li class="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></li></a>
        <a href="https://www.linkedin.com/" target="_blank"><li class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
        <a href="https://www.instagram.com/" target="_blank"><li class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></li></a>
    </ul>
  </div>
  
  <!-- Javascript links -->
  <script>
    const btnScrollToTop = document.querySelector("#btnScrollToTop");

    btnScrollToTop.addEventListener("click", function() {
    
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });

  </script>

      <script src="plugins/jquery/jquery.js"></script>

      <script src="plugins/slick/slick.min.js"></script>

      <script src="js/script.js"></script>

      <script src="js/shoppingCart.js"></script>
    
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/main.js"></script>
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