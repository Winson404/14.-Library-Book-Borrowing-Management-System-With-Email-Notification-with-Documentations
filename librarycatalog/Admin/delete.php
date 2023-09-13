<?php
$con = mysqli_connect("localhost","root","","library_catalog");
$id=$_REQUEST['id'];
$query = "DELETE FROM courses WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: course.php"); 
?>