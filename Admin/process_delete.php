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


	// DELETE BOOKLIST  - BOOKS_UPDATE_DELETE.PHP
	if(isset($_POST['delete_book'])) {
		$book_id = $_POST['book_id'];

		$delete = mysqli_query($conn, "DELETE FROM book_list WHERE book_id='$book_id'");
		 if($delete) {
	      	$_SESSION['message'] = "Book information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: books.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: books.php");
	      }
	}


	// DELETE BOOKLIST - ADDBOOKS_UPDATE_DELETE.PHP
	if(isset($_POST['delete_book2'])) {
		$book_id = $_POST['book_id'];

		$delete = mysqli_query($conn, "DELETE FROM book_list WHERE book_id='$book_id'");
		 if($delete) {
	      	$_SESSION['message'] = "Book information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: addbooks.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: addbooks.php");
	      }
	}
	



	// DELETE COURSE
	if(isset($_POST['delete_course'])) {
		$id = $_POST['id'];

		$delete = mysqli_query($conn, "DELETE FROM courses WHERE id='$id'");
		 if($delete) {
	      	$_SESSION['message'] = "Course has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: course.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: course.php");
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




	// DELETE BOOK BORROWER
	if(isset($_POST['remove_borrow_book2'])) {
		$borrow_Id = $_POST['borrow_Id'];

		$delete = mysqli_query($conn, "DELETE FROM book_list_borrow WHERE borrow_Id='$borrow_Id'");
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
