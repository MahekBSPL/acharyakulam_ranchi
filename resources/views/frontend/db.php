<?php
error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
$username = "acharya1_dev";
$password = "Ranchi@#2021$";
$db="acharya1_ranchi";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    
   // echo 'dev';
    die("Connection failed: " . mysqli_connect_error());
}
	ob_start();
	?>