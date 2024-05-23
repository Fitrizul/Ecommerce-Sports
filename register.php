<?php

include "config.php";

// Register authentication
if (isset($_POST['username']) && isset($_POST['email'])
    && isset($_POST['password'])) 
{
	//Manipulate input data
	function validate($data)
	{
       $data = trim($data); // Remove string whitespace
	   $data = stripslashes($data); // Remove string
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$user_data = 'uname='. $uname. '&email='. $email;

	// If condition empty string
	if (empty($uname) and empty($email) and empty($pass)) 
	{
		header("Location: register.php?error=Please fill out this form&$user_data");
	    exit();
	}
	else if (empty($uname) and empty($email)) 
	{
		header("Location: register.php?error=User Name and Email is required&$user_data");
	    exit();
	}
	else if (empty($uname) and empty($pass)) 
	{
		header("Location: register.php?error=User Name and Password is required&$user_data");
	    exit();
	}
	else if (empty($email) and empty($pass)) 
	{
		header("Location: register.php?error=Email and Password is required&$user_data");
	    exit();
	}
	else if (empty($uname)) 
	{
		header("Location: register.php?error=User Name is required&$user_data");
	    exit();
	}
	else if(empty($email))
	{
        header("Location: register.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($pass))
	{
        header("Location: register.php?error=Password is required&$user_data");
	    exit();
	}
	// Success condition
	else
	{
		// Fetching if user data is already in the database
	    $sql = "SELECT * FROM users WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

		// Matching result
		if (mysqli_num_rows($result) > 0) 
		{
			header("Location: register.php?error=Username already exists!&$user_data"); // Redirect to home user page
	        exit();
		}
		else 
		{
		   // Insert new user into the database
           $sql2 = "INSERT INTO users(username, email, password) VALUES('$uname', '$email', '$pass')";
           $result2 = mysqli_query($conn, $sql2);

           if ($result2) 
           {
           	 header("Location: register.php?success=Your account has been created successfully");
	         exit();
           }
           else 
           {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}

?>

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

	<title>Register</title>

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		.row
		{
			background: white;
			border-radius: 30px;
			box-shadow: 12px 12px 22px grey;
		}
		
		img
		{
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;

		}
		.btn1
		{
			border: none;
			outline:  none;
			height: 50px;
			width: 100%;
			background-color: black;
			color: white;
			border-radius: 4px;
			font-weight: bold;
		}
		.btn1:hover
		{
			background: white;
			border: 1px solid;
			color: black;
		}

		.col-lg-7
		{
			text-align: center;
			margin: auto
		}
		.error 
		{
   			background: #F2DEDE;
   			color: #A94442;
   			padding: 10px;
   			width: 58%;
   			border-radius: 5px;
   			margin: auto;
   			
		}

		.success 
		{
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
					<img src="images/adidasShoes.png" style="width:465px;height: 710px;">
				</div>
				<div class="col-lg-7 px-5 my-3" >			
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<h1 class="font-weight-bold pt-5 pb-3">Register</h1>
						<h4 class="mb-5">Sign up a new account</h4>
						<!--Error message -->
                        <?php if (isset($_GET['error']))
						      { ?>
     						    <p class="error"><?php echo $_GET['error']; ?></p>
     					<?php } ?>

     					<?php if (isset($_GET['success'])) 
     					  	  { ?>
               				    <p class="success"><?php echo $_GET['success']; ?></p>
          				<?php } ?>
          				<div class="form-row">
							<div class="col-lg-7">
                                <?php if (isset($_GET['uname'])) 
                                      { ?>  
                                            <input type="text" 
                                                    name="username" 
                                                    placeholder="User Name"
                                                    value="<?php echo $_GET['uname']; ?>" 
                                                    class="form-control mt-4 mb-2 p-3"><br>
                                <?php }
                                      else
                                      { ?>
                                            <input type="text" 
                                                    name="username" 
                                                    placeholder="User Name" 
                                                    class="form-control mt-4 mb-2 p-3"><br>
                                <?php } ?>
							</div>	
						</div>
						<div class="form-row">
							<div class="col-lg-7">
                                <?php if (isset($_GET['email'])) 
								      { ?>
               							 <input type="email" 
                      							name="email" 
                      							placeholder="Email-adress"
                      							value="<?php echo $_GET['email']; ?>" 
                      							class="form-control my-2 p-3"><br>
                      			<?php }
                      			 	  else
                      			 	  { ?>
               							 <input type="email" 
                      							name="email" 
                      							placeholder="Email-adress" 
                      							class="form-control my-2 p-3"><br>
         						<?php } ?>	
							</div>	
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<input type="password" 
									   name="password" 
									   placeholder="Password" 
									   class="form-control my-2 p-3 mb-4">
							</div>	
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<button type="submit" class="btn1 mt-3 mb-4">Register</button>
							</div>	
						</div>
						<!--  Button link redirect to register page -->
						<p>Already have an account? <a href="login.php">Log in here</a></p>
					</form>
		
	</section>
</body>
</html>