<?php 

session_start();

include "config.php";


  $userid = $_SESSION['id'];
  $sql = "Select * from ordersport where user_id = $userid";
  $result = mysqli_query($conn, $sql);
  $count = 0;
?>

<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <title>My Orders</title>

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
  <link href="css/styleMyOrder.css" rel="stylesheet">
  
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

  <!-- Order list section -->
  <section class="section2">
    <div class="container">
      <div class="cart content-wrapper">
        <h1>My Orders</h1>
          <!-- Check condition if order list is in the database -->
          <?php
          if (mysqli_num_rows($result) > 0) 
          { 
          ?>
            <table>
              <thead>
                <tr>
                  <td>No</td>
                  <td>Product</td>
                  <td style="width: 250px;"></td>
                  <td style="text-align: center;">Price</td>
                  <td style="text-align: center;">Quantity</td>
                  <td>Total</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody style="line-height: 2.0;">
                <?php
                  while($row = mysqli_fetch_assoc($result))
                  {    
                    $imageArray = explode("\n", $row['product_image']); //Split array of image into a newline
                    $count = $count + 1;
                  ?>
                    <tr>
                      <td class="price" valign="top" style="padding-top: 0px; line-height: 5.2;">
                        <span style="padding-left : 6px;color: #000000;"><?php echo $count; ?></span>
                      </td>
                      <td class="img">
                        <?php
                          $countImage = 0;
                          foreach ($imageArray as $imagesArray) {
                          // Step 3: Display the data
                        ?>
                            <img src="<?php echo $imagesArray; ?>" width="75" height="75" style="margin-bottom: 15px;">
                            <?php
                                $countImage = $countImage + 1;
                          }
                        ?>
                      </td>
                      <td  valign="top" style="padding-top: 17px; line-height: 5.2;">
                        <span style="color: #f9a743;"><?php echo nl2br($row['product_name']); ?></span>
                        <br>          
                      </td>
                      <td valign="top" class="price" style="text-align: center;padding-top: 17px; line-height: 5.2;"><span id="priceValue"><?php echo nl2br($row['product_price']); ?></span></td>
                      <td valign="top" class="price" style="text-align: center;padding-top: 17px; line-height: 5.2;"><span id="priceValue"><?php echo nl2br($row['order_quantity']); ?></span></td>
                      <!-- Manipulate padding space -->
                      <?php 
                        if ($countImage > 1) { ?>
                          <td valign="bottom" style="padding-bottom:55px; color: #000000; font-weight: bold" class="price" id="priceTotal"> <?php echo "RM " . $row['order_totalPrice']; ?></td>
                      <?php 
                            if ($row['order_status'] == "Pending") { ?>
                              <td valign="bottom" class="price" id="priceTotal" style="padding-bottom:55px; color: #FF0000;"><?php echo $row['order_status']; ?></td>
                              <?php
                            }
                            else if ($row['order_status'] == "Completed") { ?>
                              <td valign="bottom" class="price" id="priceTotal" style="padding-bottom:55px; color: #006400.;"><?php echo $row['order_status']; ?></td>
                            <?php
                            }
                        } 
                        else { ?>
                          <td valign="top" style="padding-top: 44px;color: #000000; font-weight: bold" class="price" id="priceTotal"><?php echo "RM " . $row['order_totalPrice']; ?></td>
                        <?php 
                            if ($row['order_status'] == "Pending") { ?>
                              <td valign="top" class="price" id="priceTotal"  style="color: #FF0000;padding-top: 44px;"><?php echo $row['order_status']; ?></td>
                            <?php
                            }
                            else if ($row['order_status'] == "Completed") { ?>
                              <td valign="top" class="price" id="priceTotal"  style="color: #006400; padding-top: 44px;"><?php echo $row['order_status']; ?></td>
                            <?php
                            }
                            } ?>
                    </tr>
                  <?php 
                  }
                  ?>
              </tbody>
            </table>
          <?php
          }
          else 
          {?>
            <table>
              <thead>
                <tr>
                  <td>No</td>
                  <td>Product</td>
                  <td style="width: 250px;"></td>
                  <td style="text-align: center;">Price</td>
                  <td style="text-align: center;">Quantity</td>
                  <td>Total</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody style="line-height: 2.0;">
                <tr>
                  <td colspan="7" style="text-align:center;">There is currently no order that has been placed</td>
                </tr>
              </tbody>
            </table>
            <br><br><br><br><br><br>
          <?php
          }
          ?>
                          
      </div>
    </div>
  </section>
  
  <!-- Javascript links -->

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

<!--Footer section -->
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