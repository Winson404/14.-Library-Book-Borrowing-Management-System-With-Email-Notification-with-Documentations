<?php 
	include '../config.php';


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