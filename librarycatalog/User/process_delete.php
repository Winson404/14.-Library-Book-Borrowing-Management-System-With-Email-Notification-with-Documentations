<?php 
	include '../config.php';

	// DELETE USER
	if(isset($_POST['delete_admin'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Admin information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: admin.php");
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
	      	$_SESSION['message'] = "User information has been deleted!";
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


	// DELETE BORROWED BOOK
	if(isset($_POST['remove_borrow_book'])) {
		$borrowed_id = $_POST['borrowed_id'];

		$delete = mysqli_query($conn, "DELETE FROM borrowed_book WHERE borrowed_id='$borrowed_id'");
		 if($delete) {
	      	$_SESSION['message'] = "Book has been removed from the list.";
	        $_SESSION['text'] = "Removed successfully!";
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