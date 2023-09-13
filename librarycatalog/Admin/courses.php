<?php
$con = mysqli_connect("localhost","root","","library_catalog");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
  	if (isset($_POST['submit']))
	{
		$course = $_POST['course'];
		$trn_date = date("Y-m-d H:i:s");

		$query = "INSERT into `courses` (course, adlaw) VALUES ('$course','$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
	}
  }




?>