<?php
include("index.php");
include("script.php");
$servername = "localhost";
$username = "root";
$password = "Abcd1234";
$dbname = "LTA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}



?>