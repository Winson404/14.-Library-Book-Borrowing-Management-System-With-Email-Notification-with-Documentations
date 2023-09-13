<?php 
	include '../config.php';

	// SAVE ADMIN
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
			header("Location: admin.php");
		} else {

			if($password != $cpassword) {
        $_SESSION['message'] = "Password does not matched.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: admin.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered, user_type) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered', '$user_type')");

                            if($save) {
									          	$_SESSION['message'] = "Admin information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: admin.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
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

	}








	// SAVE users
	if(isset($_POST['create_user'])) {
		$couse_year			 = $_POST['couse_year'];
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
			header("Location: users.php");
		} else {

			if($password != $cpassword) {
        $_SESSION['message'] = "Password does not matched.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: users.php");
			} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, level_section, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$couse_year', '$file','$date_registered')");

                            if($save) {
									          	$_SESSION['message'] = "Student information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: users.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
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

	}





	// CREATE COURSE
	if(isset($_POST['create_course'])) {

		$course = $_POST['course'];
		$fetch = mysqli_query($conn, "SELECT * FROM courses WHERE course='$course'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "Courses already exists.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: course.php");
		} else {
				$save = mysqli_query($conn, "INSERT INTO courses (course) VALUES ('$course')");
				if($save) {
					$_SESSION['message'] = "Course has been saved.";
	        $_SESSION['text'] = "Success.";
	        $_SESSION['status'] = "success";
					header("Location: course.php");
				} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: course.php");
				}	
		}

	}





	// CREATE BOOK
	if(isset($_POST['create_book'])) {

		$course           = $_POST['course'];
		$book_code        = $_POST['book_code'];
		$book_name        = $_POST['book_name'];
		$book_description = $_POST['book_description'];
		$book_author      = $_POST['book_author'];
		$book_publish     = $_POST['book_publish'];
		$availability     = $_POST['availability'];

		$fetch = mysqli_query($conn, "SELECT * FROM book_list WHERE book_name='$book_name'");
		if(mysqli_num_rows($fetch) > 0) {
			$_SESSION['message'] = "Book already exists.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: books.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO book_list (book_code, book_name, book_description, book_author, book_publish, availability) VALUES ('$book_code', '$book_name', '$book_description', '$book_author', '$book_publish', '$availability')");
			if($save) {
				$_SESSION['message'] = "Book has been saved.";
		        $_SESSION['text'] = "Success.";
		        $_SESSION['status'] = "success";
				header("Location: books.php");
			} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: books.php");
			}	
		}

	}







	// IMPORT CSV FILES
	if(isset($_POST['importSubmit'])){
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream',
    'text/csv','application/excel','application/vnd.msexcel','text/plain');

    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes )){

        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            while(($line =fgetcsv($csvFile) ) !== FALSE) {
                $bookcode = $line[0];
                $bookname = $line[1];
                $bookdescription = $line[2];
                $booktauthor = $line[3];
                $bookpublish = $line[4];
                $bookavailable = $line[5];

                $prevQuery = "SELECT book_id FROM book_list WHERE book_name = '".$line[1]."'";
                $prevResult = $conn->query($prevQuery);

                if($prevResult->num_rows > 0 ) {
                    $conn->query("UPDATE book_list SET book_code = '$bookcode', book_name = '$bookname', book_description = '$bookdescription', book_author = '$booktauthor', book_publish = '$bookpublish', availability='$bookavailable'");
                } else {
                    $conn->query("INSERT INTO book_list(book_code, book_name, book_description, book_author, book_publish, availability)
                    VALUES ('$bookcode', '$bookname', '$bookdescription', '$booktauthor', '$bookpublish', '$bookavailable' )");
                }
            }

            fclose($csvFile);
            $_SESSION['message'] = "CSV File successfully imported.";
		        $_SESSION['text'] = "Import successfully.";
		        $_SESSION['status'] = "success";
						header("Location: addbooks.php");
        } else {
            $_SESSION['message'] = "CSV File failed to import.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: addbooks.php");
        }
    }else{
        $_SESSION['message'] = "Invalid CSV File.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: addbooks.php");
    }
}


?>
