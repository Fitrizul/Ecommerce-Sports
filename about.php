<?php 

session_start();
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- ** Plugins Needed for the Project ** -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid&#43;Serif:400%7cJosefin&#43;Sans:300,400,600,700 ">
    <link rel="stylesheet" href="plugins/themefisher-font/themefisher-font.min.css ">
    <link rel="stylesheet" href="plugins/slick/slick.min.css ">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/styleAbout.css">

    <!--Favicon-->
    <link rel="icon" href="images/logo2.png" type="image/x-icon">

    <title>About Us</title>
  </head>

  <body id="contactP">

    <!-- Navigate to the top of the page -->
    <button id="btnScrollToTop">
      <i class="fa fa-arrow-up"></i>
    </button>

    <div class="preloader"></div>

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

    <div class="section" style="font-family: 'Poppins', sans-serif;" id="section1">
      <div class="container">
          <!-- Title header -->
          <div class="title">
              <h1 style="margin-top:70px;">About Us</h1>
          </div>
          <!-- Business description -->
          <div class="content">
              <div class="article">
                  <h3>Welcome to fitS ecommerce shop, where we provide a wide range of high-quality athletic apparel and 
                      accessories for individuals who are passionate about staying active and performing at their best.
                      As a brief of history, our business has started in operational since 2015 in Malacca. </h3>
                  <p>Today, we are proud to offer a vast selection of sportswear and accessories that cater
                    to a variety of athletic pursuits, from yoga and running to weightlifting and team sports.
                    We are passionate about helping our customers achieve their fitness goals, and we look forward
                    to continuing to serve the sportswear ecommerce community for years to come.</p>
                  <div class="button">
                      <a href="">Read More</a>
                  </div>
              </div>
          </div>
          
          <div class="image-section">
              <img src="images/aboutImage2.jpg">
          </div>
          <!-- Business social media links -->
          <div class="social">
              <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
              <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
          </div>
      </div>

      <!-- Our team section -->
      <section class="team">
          <div class="container">
              <h1 id="team">OUR TEAM</h1>
              <div class="row">
                  <!-- Person 1 -->
                  <div class="col-lg-3 col-md-6 col-sm-12 profile text-center">
                      <div class="img-box">
                          <img src="images/Profile.jpg" class="img-fluid">
                              <ul>
                                  <a href="https://www.facebook.com/" target="_blank"><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                                  <a href="https://twitter.com/" target="_blank"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                                  <a href="https://www.linkedin.com/" target="_blank"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                              </ul>                            
                      </div>
                      <h2>Fitri Zulkifli</h2>
                      <h3>Founder / CEO</h3>
                  </div>
                  <!-- Person 2 -->
                  <div class="col-lg-3 col-md-6 col-sm-12 profile text-center">
                      <div class="img-box">
                          <img src="images/profile2New.jpg" class="img-fluid">
                              <ul>
                                  <a href="https://www.facebook.com/" target="_blank"><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                                  <a href="https://twitter.com/" target="_blank"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                                  <a href="https://www.linkedin.com/" target="_blank"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                              </ul>                            
                      </div>
                      <h2>David James</h2>
                      <h3>Marketing Head</h3>
                  </div>
                  <!-- Person 3 -->
                  <div class="col-lg-3 col-md-6 col-sm-12 profile text-center">
                      <div class="img-box">
                          <img src="images/profile3New.jpg" class="img-fluid">
                              <ul>
                                  <a href="https://www.facebook.com/" target="_blank"><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                                  <a href="https://twitter.com/" target="_blank"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                                  <a href="https://www.linkedin.com/" target="_blank"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                              </ul>                            
                      </div>
                      <h2>Emma Catherine</h2>
                      <h3>Product Head</h3>  
                  </div>
                  <!-- Person 4 -->
                  <div class="col-lg-3 col-md-6 col-sm-12 profile text-center">
                      <div class="img-box">
                          <img src="images/profile8New.jpg" class="img-fluid">
                              <ul>
                                  <a href="https://www.facebook.com/" target="_blank"><li><i class="fa fa-facebook" aria-hidden="true"></i></li></a>
                                  <a href="https://twitter.com/" target="_blank"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                                  <a href="https://www.linkedin.com/" target="_blank"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                              </ul>                            
                      </div>
                      <h2>Arjun Kapur</h2>
                      <h3>Business Analyst</h3>
                  </div>
              </div>
          </div>
      </section>

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
              <div class="social2" style="margin-top:-15px">
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


