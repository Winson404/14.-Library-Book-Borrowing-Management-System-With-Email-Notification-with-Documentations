<?php 
		include '../config.php';

	  use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require '../vendor/PHPMailer/src/Exception.php';
		require '../vendor/PHPMailer/src/PHPMailer.php';
		require '../vendor/PHPMailer/src/SMTP.php';


	// UPDATE ADMIN PROFILE
	if(isset($_POST['update_profile'])) {

		$user_Id       = $_POST['user_Id'];
		$level_section = $_POST['level_section'];
		$courses       = $_POST['courses'];
		$firstname     = $_POST['firstname'];
		$middlename    = $_POST['middlename'];
		$lastname      = $_POST['lastname'];
		$suffix        = $_POST['suffix'];
		$gender        = $_POST['gender'];
		$dob           = $_POST['dob'];
		$age           = $_POST['age'];
		$contact       = $_POST['contact'];
		$email         = $_POST['email'];
		$address       = $_POST['address'];

		$fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_Id != '$user_Id' ");
		if(mysqli_num_rows($fetch) > 0) {
			$_SESSION['message'] = "Email already exists.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: profile.php");
		} else {
			$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', courses='$courses', level_section='$level_section', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
	    if($save) {
	          $_SESSION['message']  = "Profile information has been updated!";
	          $_SESSION['text'] = "Updated successfully!";
		        $_SESSION['status'] = "success";
						header("Location: profile.php");                          
	    } else {
	          $_SESSION['message'] = "Something went wrong while saving the information.";
	          $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: profile.php");
	    }
		}
	}


	// CHANGE ADMIN PASSWORD
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['message']  = "Password does not matched. Please try again";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: profile.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: profile.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: profile.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: profile.php");
    	}

    }




  // UPDATE ADMIN PROFILE
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

	  // Check if image file is a actual image or fake image
    $target_dir = "../images-users/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: profile.php");
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    $_SESSION['message']  = "Your file was not uploaded.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: profile.php");

    // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
     
            if($save) {
            	$_SESSION['message'] = "Profile has been updated!";
	            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
							header("Location: profile.php");
            } else {
              $_SESSION['message'] = "Something went wrong while updating the information.";
	            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: profile.php");
            }
        } else {
              $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: profile.php");
        }

		}
	}





?>