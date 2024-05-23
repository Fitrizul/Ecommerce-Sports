<?php 

session_start();
?>
<!DOCTYPE html>


<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Home</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="FitS">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="FitSs">
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

</head>

<body id="body">
  
  <!-- preloader start -->
  <div class="preloader"></div>

  <!-- Navigate to the top of the page -->
  <button id="btnScrollToTop">
      <i class="fa fa-arrow-up"></i>
  </button>

  <!-- Navigation bar -->
  <header class="navigation sticky-top bg-white">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php"> <img src="images/logo2.png" alt="FitS">
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
  <!-- Hero section -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center mb-5 mb-md-0">
          <img class="img-fluid" src="images/Jerseys/PumaJerseyBlack.jpg" alt="">
        </div>
        <div class="col-md-6 align-self-center text-center text-md-left">
          <div class="block">
            <h1 class="font-weight-bold mb-4 font-size-60">Performance Meets Fashion</h1>
            <p class="mb-4">Experience the fusion of cutting-edge technology and trendy designs with our sportswear range, ensuring you look and perform your best.</p>
            
            <a href="productsJerseys.php" class="btn btn-main">Shop Now</a>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Features section -->
  <section class="section" id="features">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="heading">
            <h2>Our Core Features</h2>
          </div>
        </div>
        <div class="col-md-4">
          <!-- Feature 1 -->
          <div class="mb-40 text-center text-md-left">
            <i class="d-inlin-block h2 mb-10 fa fa-soccer-ball-o" style="font-size:25px;"></i>
            <h4 class="font-weight-bold mb-2">Sportswear Products</h4>
            <p>We provide on variety of sportswear products for purchase, like jerseys, pants, and shoes.</p>
          </div>
          <!-- Feature 2 -->
          <div class="mb-40 text-center text-md-left">
            <i class="d-inlin-block h2 mb-10 fa fa-tags" style="font-size:25px;"></i>
            <h4 class="font-weight-bold mb-2">Popular Brands</h4>
            <p>Our products consist of sportswear brands that are popular worldwide.</p>
          </div>
          
        </div>
        <div class="col-md-4 text-center align-self-center mb-4 mb-md-0">
          <img class="img-fluid" src="images/Equipment/AdidasUclClubBall.jpg" alt="Adidas Ucl Club Ball">
        </div>
        <div class="col-md-4">
            <!-- Feature 3 -->
          <div class="mb-40 text-center text-md-left">
            <i class="d-inlin-block h2 mb-10 fa fa-shirtsinbulk" style="font-size:26px;"></i>
            <h4 class="font-weight-bold mb-2">Responsive Ordering</h4>
            <p>We can ensure our responsive interface during purchase makes it easier for customers.</p>
          </div>
          <!-- Feature 4 -->
          <div class="mb-40 text-center text-md-left">
            <i class="d-inlin-block h2 mb-10 fa fa-credit-card" style="font-size:25px;"></i>
            <h4 class="font-weight-bold mb-2">Easy Payment</h4>
            <p>We have a payment gateway that accepts any type of debit or credit card brand.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero sub-section -->
  <section class="bg-orange section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center mb-5 mb-lg-0">
          <img class="img-fluid" src="images/bags/AdidasClassicBadgeBackpackBlack.png" alt="">
        </div>
        <div class="col-md-6 align-self-center text-center text-md-left">
          <div class="content">
            <h2 class="subheading text-white font-weight-bold mb-10">Find Your Perfect Fit, Every Time</h2>
            <p class="text-white" style="font-size:20px;">Browse through our extensive range of different category of sportswear like jerseys, pants, slippers shoes and sports equipment, available in a variety of sizes and styles, ensuring you find the ideal fit for your unique needs.
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product feature section -->
  <section class="feature-list section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>Why Choose Our Products</h2>
          </div>
        </div>
      </div>
      <!-- Product 1 -->
      <div class="row mb-40">
        <div class="col-md-6 text-center mb-5 mb-lg-0">
          <img class="img-fluid" src="images/pants/AdidasShortsBlack.jpg" alt="">
        </div>
        <div class="col-md-6 align-self-center text-center text-md-left">
          <div class="content">
            <h4 class="subheading">Adidas Short Black</h4>
            <p>This product is made with Primegreen, a series of high-performance recycled materials. The clean design makes it easy to add team details and squad numbers.</p>
          </div>
        </div>
      </div>
      <!-- Product 2 -->
      <div class="row mb-40">
        <div class="col-md-6 order-md-1 order-2 align-self-center text-center text-md-left">
          <div class="content">
            <h4 class="subheading">Nike Shoes White</h4>
            <p>Take those first steps on your running journey in the Nike White Downshifter 12. Made from at least 20% recycled content by weight, it has a supportive fit and stable ride, with a lightweight feel that easily transitions from your workout to hangout. </p>
          </div>
        </div>
        <div class="col-md-6 order-md-2 order-1 text-center mb-5 mb-lg-0">
          <img class="img-fluid" src="images/Shoes/NikeShoesWhite2.jpg" alt="">
        </div>
      </div> 
    </div>
  </section>

  <!-- Product gallery section -->
  <section class="gallery" id="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>Checkout Our All Products</h2>
          </div>
          <div class="product-slider">
            <!-- Product gallery 1 -->
            <div class="block">
              <div class="gallery-overlay">
                <a href="productsJerseys.php" class="gallery-popup">
                  <i class="tf-ion-plus-round"></i>
                </a>
              </div>
              <img class="img-fluid" src="images/Jerseys/PumaJerseyBlue.jpg" alt="Puma Jersey Blue">
            </div>
            <!-- Product gallery 2 -->
            <div class="block">
              <div class="gallery-overlay">
                <a href="productsPants.php" class="gallery-popup">
                  <i class="tf-ion-plus-round"></i>
                </a>
              </div>
              <img class="img-fluid" src="images/Pants/AdidasPantsBottomBlack.jpg" alt="Adidas Pants Bottom Black">
            </div>
            <!-- Product gallery 3 -->
            <div class="block">
              <div class="gallery-overlay">
                <a href="productsSlippers.php" class="gallery-popup">
                  <i class="tf-ion-plus-round"></i>
                </a>
              </div>
              <img class="img-fluid" src="images/Slippers/NBSlideswhite.jpg" alt="NB Slides White">
            </div>
            <!-- Product gallery 4 -->
            <div class="block">
              <div class="gallery-overlay">
                <a href="productShoes.php" class="gallery-popup">
                  <i class="tf-ion-plus-round"></i>
                </a>
              </div>
              <img class="img-fluid" src="images/shoes/NikeShoesWhite.jpg" alt="Nike Shoes White" style="margin-top:70px">
            </div>
            <!-- Product gallery 5 -->
            <div class="block">
              <div class="gallery-overlay">
                <a href="productsBags.php" class="gallery-popup">
                  <i class="tf-ion-plus-round"></i>
                </a>
              </div>
              <img class="img-fluid" src="images/Bags/AdidasClassicBadgeBackpackBlack.jpg" alt="Adidas Classic Backpack Black">
            </div>
            <!-- Product gallery 6 -->
            <div class="block">
              <div class="gallery-overlay">
                <a href="products/product-5/" class="gallery-popup">
                  <i class="tf-ion-plus-round"></i>
                </a>
              </div>
              <img class="img-fluid" src="images/Equipment/NikePitchWhite.jpg" alt="Nike Pitch White">
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Contact section -->
  <section class="call-to-action section bg-opacity" style="background-image: url('images/nikeTraining.png');">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 text-center mx-auto">
          <h2 class="subheading text-white">Get Product Updates</h2>
          <p class="text-white">Email us and you will receive regular updates and exclusive content directly in your inbox.</p>
          <div class="input-group">
            <form action="index.php" method="post" class="w-100" name="mc-embedded-subscribe-form">
              <input type="email" id="email" class="form-control" name="email" placeholder="Your Email Address Here"
                required>
              <button class="btn btn-main btn-submit" type="submit" name="subscribe">Subscribe</button>
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="" tabindex="-1">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Product review section-->
  <section class="testimonials section" id="testimonial">
    <div class="container">
      
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="heading">
            <h2>Products Review</h2>
          </div>
        </div>
        <!-- Testimonial 1 -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0 text-center">
          <div class="testimonial-block">
            <i class="tf-ion-quote"></i>
            <p>I've been a loyal customer of this website for my Nike shoe needs, and they never disappoint. The selection is fantastic, with a wide range of styles available. The ordering process is smooth and hassle-free, and the shipping is always prompt. The Nike shoes I've bought from here have always been authentic and of the highest quality. It's my go-to destination for all things Nike!</p>
            <div class="author-details">
              <img src="images/avatar3.png" alt="Emily Sofia">
              <h4>Emily Sofia</h4>
            </div>
          </div>
        </div>
        <!-- Testimonial 2 -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0 text-center">
          <div class="testimonial-block">
            <i class="tf-ion-quote"></i>
            <p>I recently purchased an Adidas jersey from this website, and I'm thrilled with my purchase. The quality of the jersey is outstanding, with excellent stitching and attention to detail. The fabric is comfortable and breathable, making it perfect for both casual wear and sporting activities. I highly recommend this website for all your Adidas jersey needs!</p>
            <div class="author-details">
              <img src="images/avatar2.jpg" alt="Daniel Rice">
              <h4>Daniel Rice</h4>
            </div>
          </div>
        </div>
        <!-- Testimonial 3 -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0 text-center">
          <div class="testimonial-block">
            <i class="tf-ion-quote"></i>
            <p>I recently purchased a Puma backpack from this website, and I'm extremely satisfied with my purchase. The bag is not only stylish but also incredibly functional. It has ample storage space with multiple compartments, allowing me to organize my belongings easily.If you're in need of a reliable and fashionable backpack, I highly recommend checking out this website!</p>
            <div class="author-details">
              <img src="images/avatar1.jpeg" alt="Kevin Brad">
              <h4>Kevin Brad</h4>
            </div>
          </div>
        </div>        
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