<?php 

	include 'config.php'; 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'vendor/PHPMailer/src/Exception.php';
	require 'vendor/PHPMailer/src/PHPMailer.php';
	require 'vendor/PHPMailer/src/SMTP.php';


	// STUDENT LOGIN
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {
				$row = mysqli_fetch_array($check);
				$user_type = $row['user_type'];
				$status = $row['user_status'];
				if($status == 'Confirmed') {
					if($user_type == 'User') {
						$_SESSION['user_Id'] = $row['user_Id'];
						header("Location: User/dashboard.php");
					} else {
						$_SESSION['admin_Id'] = $row['user_Id'];
						header("Location: Admin/dashboard.php");
					}
				} else {
					$_SESSION['message'] = "Only verified account can login to the system.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header("Location: login.php");
				}
				
		} else {
				$_SESSION['message'] = "Incorrect password.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header("Location: login.php");
		}
	}




  // STUDENT REGISTRATION
	if(isset($_POST['create_user'])) 
	{

		$student_Id	     = $_POST['student_Id'];
		$level_section   = $_POST['level_section'];
		$courses         = $_POST['courses'];
		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$address         = $_POST['address'];
		$email           = $_POST['email'];
		$contact         = $_POST['contact'];
		$password        = md5($_POST['password']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);
		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email) > 0 ) {
					$_SESSION['message']  = "Email is already taken.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header("Location: register_student.php");            
		}  else {

					// Check if image file is a actual image or fake image
					$target_dir = "images-users/";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
							// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
					{
						$_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
								$_SESSION['text'] = "Please try again.";
								$_SESSION['status'] = "error";
									header("Location: register_student.php");
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0)
					{
					$_SESSION['message']  = "Your file was not uploaded.";
							$_SESSION['text'] = "Please try again.";
							$_SESSION['status'] = "error";
								header("Location: register_student.php");
					// if everything is ok, try to upload file
					} else {

						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						
							$save = mysqli_query($conn, "INSERT INTO users (student_Id, firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, courses, level_section, image, date_registered) VALUES ('$student_Id', '$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$courses', '$level_section', '$file','$date_registered')");

							if($save) {

								$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
														if(mysqli_num_rows($check)===1) {
																$row = mysqli_fetch_array($check);
																$_SESSION['user_Id'] = $row['user_Id'];
																header("Location: User/dashboard.php");
														} else {
																$_SESSION['message'] = "Account does not exist.";
															$_SESSION['text'] = "Please try again.";
															$_SESSION['status'] = "error";
																header("Location: register_student.php");
														}

							} else {
								$_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
													$_SESSION['text'] = "Please try again.";
													$_SESSION['status'] = "error";
														header("Location: register_student.php");
							}
						} else {
							$_SESSION['message'] = "There was an error uploading your file.";
												$_SESSION['text'] = "Please try again.";
												$_SESSION['status'] = "error";
													header("Location: register_student.php");
						}
				}
		}

	}





	// REGISTER ADMIN
	if(isset($_POST['create_admin'])) {
		$user_type			 = 'Admin';
		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
      $_SESSION['message'] = "Email is already taken.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: register_admin.php");
		} else {

			if($password != $cpassword) {
        $_SESSION['message'] = "Password does not matched.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: register_admin.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: register_admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: register_admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered, user_type) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered', '$user_type')");

                            if($save) {
									          	$_SESSION['message'] = "Admin information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: register_admin.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
									            $_SESSION['text'] = "Please try again.";
											        $_SESSION['status'] = "error";
															header("Location: register_admin.php");
									          }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: register_admin.php");
                      }
				 }

			}

		}

	}





	// SEARCH EMAIL - FORGOT-PASSWORD.PHP
	if(isset($_POST['search'])) {
	      $email = mysqli_real_escape_string($conn, $_POST['email']);
	      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	      if(mysqli_num_rows($fetch) > 0) {
	      	$row = mysqli_fetch_array($fetch);
	      	$user_Id = $row['user_Id'];
	      	header("Location: sendcode.php?user_Id=".$user_Id);
	      } else {
	      		$_SESSION['message'] = "Email does not exists in the database.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				    header("Location: forgot-password.php");
	      }
	}




	// SEND CODE - SENDCODE.PHP
	if(isset($_POST['sendcode'])) {

	    $email   = $_POST['email'];
	    $user_Id = $_POST['user_Id'];
	    $key     = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

	    $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE email='$email' AND user_Id='$user_Id'");
	    if($insert_code) {

	      $subject = 'Verification code';
	      $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$key.'</b>. Please do not share this code to other people. Thank you!</p>
	      <p>You can change your password by just clicking it <a href="http://localhost/librarycatalog/changepassword.php?user_Id='.$user_Id.'">here!</a></p> 
	      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

	      $mail = new PHPMailer(true);                            
	      try {
	        //Server settings
	        $mail->isSMTP();                                     
	        $mail->Host = 'smtp.gmail.com';                      
	        $mail->SMTPAuth = true;                             
	        $mail->Username = 'tatakmedellin@gmail.com';     
	        $mail->Password = 'nzctaagwhqlcgbqq';              
	        $mail->SMTPOptions = array(
	        'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
	        )
	        );                         
	        $mail->SMTPSecure = 'ssl';                           
	        $mail->Port = 465;                                   

	        //Send Email
	        $mail->setFrom('tatakmedellin@gmail.com');

	        //Recipients
	        $mail->addAddress($email);              
	        $mail->addReplyTo('tatakmedellin@gmail.com');

	        //Content
	        $mail->isHTML(true);                                  
	        $mail->Subject = $subject;
	        $mail->Body    = $message;

	        $mail->send();

	        	$_SESSION['message'] = "Verification code has been sent to your email.";
			    	$_SESSION['text'] = "Code has been sent";
		    		$_SESSION['status'] = "success";
						header("Location: verifycode.php?user_Id=".$user_Id."&&email=".$email);

		  } catch (Exception $e) { 
		  	$_SESSION['message'] = "Email not sent.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header("Location: sendcode.php?user_Id=".$user_Id);
		  } 
		} else {
				$_SESSION['message'] = "Something went wrong while generating verification code through email.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header("Location: sendcode.php?user_Id=".$user_Id);
		} 
	}




	// VERIFY CODE - VERIFYCODE.PHP
	if(isset($_POST['verify_code'])) {
	    $user_Id = $_POST['user_Id'];
	    $email   = $_POST['email'];
	    $code    = mysqli_real_escape_string($conn, $_POST['code']);
	    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND verification_code='$code' AND user_Id='$user_Id'");
	    if(mysqli_num_rows($fetch) > 0) {
			header("Location: changepassword.php?user_Id=".$user_Id);
		} else {
			$_SESSION['message'] = "Verification code is incorrect.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: verifycode.php?user_Id=".$user_Id."&&email=".$email);
		}
	}




	// CHANGE PASSWORD - CHANGEPASSWORD.PHP
	if(isset($_POST['changepassword'])) {
		$user_Id   = $_POST['user_Id'];
		$cpassword = md5($_POST['cpassword']);

		$update = mysqli_query($conn, "UPDATE users SET password='$cpassword' WHERE user_Id='$user_Id' ");
		if($update) {
			$_SESSION['message'] = "Password has been changed.";
		    $_SESSION['text'] = "Please login to your account";
		    $_SESSION['status'] = "success";
			header("Location: login.php");
		} else {
			$_SESSION['message'] = "Something went wrong while updating your password.";
		    $_SESSION['text'] = "Please try again";
		    $_SESSION['status'] = "error";
			header("Location: changepassword.php?user_Id=".$user_Id);
		}
	}




?>