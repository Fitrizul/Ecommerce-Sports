<?php 

session_start();
unset($_SESSION['cart'])
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

        <!-- ** Plugins Needed for the Project ** -->
        <link rel="stylesheet" href="fonts/icomoon/style.css">
	    <link rel="stylesheet" href="css/owl.carousel.min.css">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid&#43;Serif:400%7cJosefin&#43;Sans:300,400,600,700 ">
	    <link rel="stylesheet" href="plugins/themefisher-font/themefisher-font.min.css ">
	    <link rel="stylesheet" href="plugins/slick/slick.min.css ">


        <title>Check Out</title>
        
        <link rel="stylesheet" href="css/finishPay.css">

        <!--Favicon-->
        <link rel="icon" href="images/logo2.png" type="image/x-icon">
    </head>
    <body>
    	<div class="preloader"></div>
        <div class="container">
            <!-- Successful card-->
        	<div class="popup">
        		<img src="images/tick.png">
        		<h2 style="margin-bottom: 25px;">Thank you for purchase!</h2>
        		<p>Your have successfully make payment</p>
        		<a href="index.php"><button type="button">Return Homepage</button></a>
        	</div>
        </div>
    </body>
</html>