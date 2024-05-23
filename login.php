<?php 
session_start(); 
include "config.php";

// Login authentication
if (isset($_POST['uname']) && isset($_POST['password'])) 
{

	//Manipulate input data
	function validate($data)
	{
       $data = trim($data); // Remove string whitespace
	   $data = stripslashes($data); // Remove string
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	// If condition empty string
    if (empty($uname) and empty($pass)) 
	{
		header("Location: login.php?error=Please fill out this form");
	    exit();
	}
	else if (empty($uname)) 
	{
		header("Location: login.php?error=User Name is required");
	    exit();
	}
	else if(empty($pass))
	{
        header("Location: login.php?error=Password is required");
	    exit();
	}
	// Success condition
	else
	{
		// Fetching selected user from database
		$sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		// Matching result
		if (mysqli_num_rows($result) === 1) 
		{
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) 
            {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
				
            	header("Location: index.php"); // Redirect to home user page
		        exit();
            }
            else
            {
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}
		else
		{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}

?>

<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="FitS">
  	<meta name="generator" content="FitS E-Commerce Website">
  	<meta name="theme-name" content="FitS" />

	<!--Favicon-->
  	<link rel="icon" href="images/logo2.png" type="image/x-icon">


	<title>Login</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="js/bootstrap.js"></script>
</head>

<!-- Internal stylesheet -->
<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body
		{
			background: rgb(219, 226, 226);
		}
		.row{
			background: white;
			border-radius: 30px;
			box-shadow: 12px 12px 22px grey;
		}
		
		img{
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;

		}
		.btn1{
			border: none;
			outline:  none;
			height: 50px;
			width: 100%;
			background-color: black;
			color: white;
			border-radius: 4px;
			font-weight: bold;
		}
		.btn1:hover{
			background: white;
			border: 1px solid;
			color: black;
		}
		.error {
   			background: #F2DEDE;
   			color: #A94442;
   			padding: 10px;
   			width: 58%;
   			border-radius: 5px;
   			margin: auto;
   			
		}
		.col-lg-7
		{
			text-align: center;
			margin: auto
		}
		.success {
   			background: #D4EDDA;
   			color: #40754C;
   			padding: 10px;
   			width: 58%;
   			border-radius: 5px;
   			margin: auto;
		}
	</style>
<body>

	<!-- Form section -->
	<section class="Form my-4 mx-5">
		<div class="container">
			<div class="row g-0">
				<div class="col-lg-5">
					<img src="Images/nikeShoes2.jpeg" style="width:465px;height: 710px;">
				</div>
				<div class="col-lg-7 px-5 pt-5 my-5" >
					<h1 class="font-weight-bold py-3">Login</h1>
					<h4 class="mb-5">Sign into your account</h4>
					<!--Error message -->
                    <?php if (isset($_GET['error'])) 
								      { ?>
     									<p class="error"><?php echo $_GET['error']; 
     								  ?></p>
     							<?php } ?>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="form-row">
							<div class="col-lg-7"> 
								<input type="text" 
									   name="uname"
									   placeholder="User Name" 
									   class="form-control mt-4 my-5 p-4">
							</div>	
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<input type="password" 
									   name="password"
									   placeholder="Password" 
									   class="form-control mt-4 my-5 p-4">
							</div>	
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<button type="submit" class="btn1 mt-3 mb-5">Login</button>
							</div>	
						</div>
						<!--  Button link redirect to register page -->
						<p>Don't have an account? <a href="register.php">Register here</a></p>
					</form>
				</div>
		
	</section>
</body>
</html>