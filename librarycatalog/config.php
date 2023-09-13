<?php
		session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_catalog";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
