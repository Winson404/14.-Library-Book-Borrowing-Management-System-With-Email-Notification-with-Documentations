<?php 
    include 'config.php';
    if(isset($_SESSION['admin_Id'])) {
      header('Location: Admin/dashboard.php');
    } elseif(isset($_SESSION['user_Id'])) {
      header('Location: User/profile.php');
    } else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Library Catalog Website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/Library-icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<style>
  div nav ul li a.bluetext:hover{
    color: #3399ff;
  }
  .bluetext:hover {
    opacity: .8;
    color: #3399ff;
  }
  .bluetext {
    color: #3399ff;
  }
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><img src="images/logo.jpg" alt=""> <a href="index.php" style="color: #3399ff;">Library</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="images/logo.jpg" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php" style="color: #3399ff;">Home</a></li>
          <li><a href="index.php?#about" class="bluetext">About</a></li>
          <!--<li><a href="books.php" class="bluetext">Books</a></li> -->
          <li><a href="login.php">Login</a></li>
          <!-- <li class="dropdown"><a href="#" class="bluetext" style="color: black;"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="bluetext" >
              <li><a href="login_student.php" style="color: #3399ff;">Student login</a></li>
              <li><a href="login_admin.php" style="color: #3399ff;">Admin login</a></li>
            </ul>
          </li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="login.php" class="get-started-btn" style="background-color: #3399ff;">Login</a> -->

    </div>
  </header><!-- End Header -->

  <?php } ?>

  <?php include 'sweetalert_messages.php'; ?>