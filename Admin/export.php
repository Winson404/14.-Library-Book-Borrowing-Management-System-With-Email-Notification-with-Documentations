<?php

include("../config.php");
include("XLSXLibrary.php");

if(isset($_GET['export'])) {

  $export = $_GET['export'];
  if($export == 'book') {

      $book = [ ['No.', 'Book code', 'Book title', 'Description', 'Author', 'Date published', 'Availability'] ];
      
      $date = date("F d, Y h:i A");
      $id = 0;
      $sql = "SELECT * FROM book_list ORDER BY book_name";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
          $id++;
          $book = array_merge($book, array(array($id, $row['book_code'], ucwords($row['book_name']), ucwords($row['book_description']), ucwords($row['book_author']), $row['book_publish'], $row['availability'])));
        }
      } else {
        $_SESSION['message'] = "No record found in the database.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: addbooks.php");
      }
      $xlsx = SimpleXLSXGen::fromArray($book);
      $xlsx->downloadAs('Book records - '.$date.'.xlsx'); // This will download the file to your local system
      // $xlsx->saveAs('resident.xlsx'); // This will save the file to your server
      echo "<pre>";
      print_r($book);
      header('Location: addbooks.php');

  } else {

      $book = [ ['No.', 'Book code', 'Book title', 'Description', 'Author', 'Date published', 'Availability'] ];

      $date = date("F d, Y h:i A");
      $id = 0;
      $sql = "SELECT * FROM book_list ORDER BY book_name";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
          $id++;
          $book = array_merge($book, array(array($id, $row['book_code'], ucwords($row['book_name']), ucwords($row['book_description']), ucwords($row['book_author']), $row['book_publish'], $row['availability'])));
        }
      } else {
        $_SESSION['message'] = "No record found in the database.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: books.php");
      }
      $xlsx = SimpleXLSXGen::fromArray($book);
      $xlsx->downloadAs('Book records - '.$date.'.xlsx'); // This will download the file to your local system
      // $xlsx->saveAs('resident.xlsx'); // This will save the file to your server
      echo "<pre>";
      print_r($book);
      header('Location: books.php');

  }

}


?>