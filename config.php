<?php

//Initialize database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itemsports";

//Create a connection with selected database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) 
{
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}