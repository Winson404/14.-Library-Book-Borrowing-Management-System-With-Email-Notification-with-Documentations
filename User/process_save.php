<?php 
	include '../config.php';


	// BORROW BOOK (search-book.php)
	if(isset($_POST['borrow_book_search-book'])) {
		$book_id       = $_POST['book_id'];
		$user_id       = $_POST['user_id'];
		$fetch = mysqli_query($conn, "SELECT * FROM book_list_borrow WHERE book_id='$book_id' AND stud_id='$user_id'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "You already added this book to your borrowed book list.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header('Location: search-book.php');
		} else {
				$save = mysqli_query($conn, "INSERT INTO book_list_borrow (book_id, stud_id) VALUES ('$book_id', '$user_id')");
				if($save) {
        	$_SESSION['message'] = "Book has been successfully added to your borrowed book list/s.";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header('Location: search-book.php');
        } else {
          $_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header('Location: search-book.php');
        }
		}
	}





	// BORROW BOOK (booklist_borrow.php)
	if(isset($_POST['borrow_booklist'])) {
		$booklist_id   = $_POST['booklist_id'];
		$user_id       = $_POST['user_id'];
		$fetch = mysqli_query($conn, "SELECT * FROM book_list_borrow WHERE stud_id='$user_id' AND book_id='$booklist_id'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "You already added this book to your borrowed book list.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: booklist.php");
		} else {
				$save = mysqli_query($conn, "INSERT INTO book_list_borrow (stud_id, book_id) VALUES ('$user_id', '$booklist_id')");
				if($save) {
        	$_SESSION['message'] = "Book has been successfully added to your borrowed book list/s.";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: borrowed_book.php");
        } else {
          $_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: booklist.php");
        }
		}
	}




	// RATE BORROWED BOOK (booklist_borrow.php)
	if(isset($_POST['rate_book'])) {

		$book_id    = $_POST['book_id'];
		$stud_id    = $_POST['stud_id'];
		$ratings    = $_POST['rating'];
		$feedback   = $_POST['feedback'];
		$date_rated = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM ratings WHERE stud_id='$stud_id' AND book_id='$book_id' ");
		if(mysqli_num_rows($fetch) > 0) {
				$update = mysqli_query($conn, "UPDATE ratings SET ratings='$ratings', feedback='$feedback' WHERE stud_id='$stud_id' AND book_id='$book_id' ");
				if($update) {
        	$_SESSION['message'] = "Rated successfully.";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: borrowed_book.php");
        } else {
          $_SESSION['message'] = "Something went wrong while rating the book.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: booklist.php");
        }
		} else {
				$save = mysqli_query($conn, "INSERT INTO ratings (stud_id, book_id, ratings, feedback, date_rated) VALUES ('$stud_id', '$book_id', '$ratings', '$feedback', '$date_rated')");
				if($save) {
        	$_SESSION['message'] = "Rated successfully.";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: borrowed_book.php");
        } else {
          $_SESSION['message'] = "Something went wrong while rating the book.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: booklist.php");
        }
		}
	}









?>