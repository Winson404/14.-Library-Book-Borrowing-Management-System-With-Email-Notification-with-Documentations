<title>Library App Catalog | Dashboard</title>
<?php include 'navbar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">

          <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-primary">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT borrowed_id from borrowed_book WHERE user_id='$id' AND borrowed_status ='Approved'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Approved book</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book"></i>
              </div>
              <a href="borrowed_book.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-warning">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT borrowed_id from borrowed_book WHERE user_id='$id' AND borrowed_status ='Pending'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Borrowed book</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book"></i>
              </div>
              <a href="borrowed_book.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-success">
              <div class="inner">
                <?php
                  $users = mysqli_query($conn, "SELECT borrowed_id from borrowed_book WHERE user_id='$id' AND borrowed_status ='Returned'");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h3><?php echo $row_users; ?></h3>

                <p>Returned book</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book"></i>
              </div>
              <a href="borrowed_book.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          

        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
