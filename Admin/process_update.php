<?php 
		include '../config.php';

	  use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require '../vendor/PHPMailer/src/Exception.php';
		require '../vendor/PHPMailer/src/PHPMailer.php';
		require '../vendor/PHPMailer/src/SMTP.php';

	// UPDATE USER
	if(isset($_POST['update_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
		            if($save) {
                	$_SESSION['message'] = "Admin information has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: admin.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                }

		} else {

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
									header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_Id'");
							            if($save) {
					                	$_SESSION['message'] = "Admin information has been updated!";
								            $_SESSION['text'] = "Updated successfully!";
										        $_SESSION['status'] = "success";
														header("Location: admin.php");
					                } else {
					                  $_SESSION['message'] = "Something went wrong while updating the information.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: admin.php");
					                }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: admin.php");
                      }

				 }

		}

	}






	// CHANGE USER PASSWORD
	if(isset($_POST['password_admin'])) {

    	$user_Id     = $_POST['user_Id'];
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
								header("Location: admin.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: admin.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: admin.php");
    	}

    }





     // UPDATE users
	if(isset($_POST['update_user'])) {
		$couse_year = $_POST['couse_year'];
		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', level_section='$couse_year', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
		            if($save) {
			                $_SESSION['message']  = "User information has been updated!";
					            $_SESSION['text'] = "Updated successfully!";
							        $_SESSION['status'] = "success";
											header("Location: users.php");                          
		            } else {
			                $_SESSION['message'] = "Something went wrong while saving the information.";
					            $_SESSION['text'] = "Please try again.";
							        $_SESSION['status'] = "error";
											header("Location: users.php");
		            }

		} else {

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
									header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");

                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', level_section='$couse_year', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_Id'");
				           
							            if($save) {
					                	$_SESSION['message'] = "Student information has been updated!";
								            $_SESSION['text'] = "Updated successfully!";
										        $_SESSION['status'] = "success";
														header("Location: users.php");
					                } else {
					                  $_SESSION['message'] = "Something went wrong while updating the information.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: users.php");
					                }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: users.php");
                      }

				 }

		}
	}




	// CHANGE users PASSWORD
	if(isset($_POST['password_user'])) {

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
								header("Location: users.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: users.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: users.php");
    	}

    }





	// UPDATE ADMIN PROFILE
	if(isset($_POST['update_profile'])) {

		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];

		$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
    if($save) {
          $_SESSION['message']  = "Admin information has been updated!";
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
            	$_SESSION['message'] = "Admin profile has been updated!";
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




	// UPDATE BOOK - BOOKS_UPDATE_DELETE.PHP
	if(isset($_POST['update_book'])) {
		$book_id          = $_POST['book_id'];
		$course           = $_POST['course'];
		$book_code        = $_POST['book_code'];
		$book_name        = $_POST['book_name'];
		$book_description = $_POST['book_description'];
		$book_author      = $_POST['book_author'];
		$book_publish     = $_POST['book_publish'];
		$availability     = $_POST['availability'];

		$save = mysqli_query($conn, "UPDATE book_list SET book_code='$book_code', book_name='$book_name', book_description='$book_description', book_author='$book_author', book_publish='$book_publish', availability='$availability' WHERE book_id='$book_id' ");
			if($save) {
				$_SESSION['message'] = "Book has been updated.";
		        $_SESSION['text'] = "Success.";
		        $_SESSION['status'] = "success";
				header("Location: books.php");
			} else {
				$_SESSION['message'] = "Something went wrong while updating the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: books.php");
			}

	}



	// UPDATE BOOK - ADDBOOKS_UPDATE_DELETE.PHP
	if(isset($_POST['update_book2'])) {
		$book_id          = $_POST['book_id'];
		$course           = $_POST['course'];
		$book_code        = $_POST['book_code'];
		$book_name        = $_POST['book_name'];
		$book_description = $_POST['book_description'];
		$book_author      = $_POST['book_author'];
		$book_publish     = $_POST['book_publish'];
		$availability     = $_POST['availability'];

		$save = mysqli_query($conn, "UPDATE book_list SET book_code='$book_code', book_name='$book_name', book_description='$book_description', book_author='$book_author', book_publish='$book_publish', availability='$availability' WHERE book_id='$book_id' ");
			if($save) {
				$_SESSION['message'] = "Book has been updated.";
		        $_SESSION['text'] = "Success.";
		        $_SESSION['status'] = "success";
				header("Location: addbooks.php");
			} else {
				$_SESSION['message'] = "Something went wrong while updating the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: addbooks.php");
			}

	}
	

// UPDATE COURSE
if(isset($_POST['update_course'])) {
		$id = $_POST['id'];
		$course = $_POST['course'];

		$update = mysqli_query($conn, "UPDATE courses SET course='$course' WHERE id='$id'");
		if($update) {
				$_SESSION['message'] = "Course has been updated.";
        $_SESSION['text'] = "Success.";
        $_SESSION['status'] = "success";
				header("Location: course.php");
		} else {
				$_SESSION['message'] = "Something went wrong while updating course.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: course.php");
		}
}




	// APPROVE ACCOUNT - USERS_UPDATE_DELETE.PHP
	if(isset($_POST['approve_student_account'])) {
		$user_Id = $_POST['user_Id'];
		$name = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
		$row = mysqli_fetch_array($name);
		$row_name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];
		$email = $row['email'];

		$approve = mysqli_query($conn, "UPDATE users SET user_status='Confirmed' WHERE user_Id='$user_Id'");
		 if($approve) {

		 	  $subject = 'Account verified';
		      $message = '<p>Good day sir/maam '.$row_name.', this is to inform you that your account has been verified to the system. Thank you!</p>
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

		        	$_SESSION['message'] = "Student account has been verified";
			        $_SESSION['text'] = "Verification successful!";
			        $_SESSION['status'] = "success";
							header("Location: users.php");

			  } catch (Exception $e) { 
			  	$_SESSION['message'] = "Email not sent.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users.php");
			  } 

	      	
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}













	



	// APPROVE BORROWER
	if(isset($_POST['approve_borrow_book2'])) {
			$borrow_Id   = $_POST['borrow_Id'];
			$date_approved = date('Y-m-d');

			$update = mysqli_query($conn, "UPDATE book_list_borrow SET status='Approved', date_approved='$date_approved' WHERE borrow_Id='$borrow_Id'");
			if($update) {
					$availability = mysqli_query($conn, "SELECT * FROM book_list_borrow WHERE borrow_Id='$borrow_Id'");
					if(mysqli_num_rows($availability) > 0) {
						$row = mysqli_fetch_array($availability);
						$b_id = $row['book_id'];

						$get_avail_book = mysqli_query($conn, "SELECT * FROM book_list WHERE book_id='$b_id'");
						if(mysqli_num_rows($get_avail_book) > 0) {
							$row2 = mysqli_fetch_array($get_avail_book);

							$update2 = mysqli_query($conn, "UPDATE book_list SET availability=availability-1 WHERE book_id='$b_id'");
							if($update2) {
									$_SESSION['message'] = "Borrowed book has been approved.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "success";
									header("Location: borrowed_book.php");
							} else {
									$_SESSION['message'] = "Something went wrong while approving book borrowed.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: borrowed_book.php");
							}

						} else {
							$_SESSION['message'] = "Book cannot be found";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: borrowed_book.php");
						}
					} else {
							$_SESSION['message'] = "Book cannot be found";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: borrowed_book.php");
					}
			} else {
				$_SESSION['message'] = "Something went wrong while approving book borrowed.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: borrowed_book.php");
			}	

	}



// RETURN BOOK 
if(isset($_POST['return_borrow_book2'])) {
			$borrow_Id   = $_POST['borrow_Id'];
			$date_returned = date('Y-m-d');

			$update = mysqli_query($conn, "UPDATE book_list_borrow SET status='Returned', date_returned='$date_returned' WHERE borrow_Id='$borrow_Id'");
			if($update) {
					$availability = mysqli_query($conn, "SELECT * FROM book_list_borrow WHERE borrow_Id='$borrow_Id'");
					if(mysqli_num_rows($availability) > 0) {
						$row = mysqli_fetch_array($availability);
						$b_id = $row['book_id'];

						$get_avail_book = mysqli_query($conn, "SELECT * FROM book_list WHERE book_id='$b_id'");
						if(mysqli_num_rows($get_avail_book) > 0) {
							$row2 = mysqli_fetch_array($get_avail_book);

							$update2 = mysqli_query($conn, "UPDATE book_list SET availability=availability+1 WHERE book_id='$b_id'");
							if($update2) {
									$_SESSION['message'] = "Borrowed book has been returned.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "success";
									header("Location: borrowed_book.php");
							} else {
									$_SESSION['message'] = "Something went wrong while approving book borrowed.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: borrowed_book.php");
							}

						} else {
							$_SESSION['message'] = "Book cannot be found";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: borrowed_book.php");
						}
					} else {
							$_SESSION['message'] = "Book cannot be found";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: borrowed_book.php");
					}
			} else {
				$_SESSION['message'] = "Something went wrong while approving book borrowed.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: borrowed_book.php");
			}	

	}


?>



