<?php 
	include '../config.php';

	// DELETE USER
	if(isset($_POST['delete_admin'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
			$count = mysqli_query($conn, "SELECT * FROM users WHERE user_type='Admin'");
			if(mysqli_num_rows($count) == 1) {
		      	$_SESSION['message'] = "Admin information has been deleted!";
		        $_SESSION['text'] = "Deleted successfully!";
		        $_SESSION['status'] = "success";
				header("Location: admin.php");
			} else {
				header('Location: ../logout.php');
			}
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: admin.php");
	      }
	}


	// DELETE users
	if(isset($_POST['delete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Student information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}


	

	// DELETE BOOK
	if(isset($_POST['delete_book'])) {
		$book_id = $_POST['book_id'];

		$delete = mysqli_query($conn, "DELETE FROM book WHERE book_id='$book_id'");
		 if($delete) {
	      	$_SESSION['message'] = "Book information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: book.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: book.php");
	      }
	}


	// DELETE CATEGORY
	if(isset($_POST['delete_category'])) {
		$cat_id = $_POST['cat_id'];

		$delete = mysqli_query($conn, "DELETE FROM category WHERE cat_id='$cat_id'");
		 if($delete) {
	      	$_SESSION['message'] = "Book category has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: category.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: category.php");
	      }
	}



	// DELETE BOOK BORROWER
	if(isset($_POST['remove_borrow_book'])) {
		$borrowed_id = $_POST['borrowed_id'];

		$delete = mysqli_query($conn, "DELETE FROM borrowed_book WHERE borrowed_id='$borrowed_id'");
		 if($delete) {
	      	$_SESSION['message'] = "Book borrower has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: borrowed_book.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: borrowed_book.php");
	      }
	}




	



?>
