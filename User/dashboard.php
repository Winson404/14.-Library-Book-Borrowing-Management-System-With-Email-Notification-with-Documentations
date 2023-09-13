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

          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-primary">
              <div class="inner">
                <?php
                  //$users = mysqli_query($conn, "SELECT borrow_Id from book_list_borrow WHERE stud_id='$id' AND status ='Approved'");
                  //$row_users = mysqli_num_rows($users);
                ?>
                <h3><?php //echo $row_users; ?></h3>

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
                 // $users = mysqli_query($conn, "SELECT borrow_Id from book_list_borrow WHERE stud_id='$id' AND status ='Pending'");
                  //$row_users = mysqli_num_rows($users);
                ?>
                <h3><?php// echo $row_users; ?></h3>

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
                 // $users = mysqli_query($conn, "SELECT borrow_Id from book_list_borrow WHERE stud_id='$id' AND status ='Returned'");
                  //$row_users = mysqli_num_rows($users);
                ?>
                <h3><?php //echo $row_users; ?></h3>

                <p>Returned book</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book"></i>
              </div>
              <a href="borrowed_book.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->



          <div class="col-md-6 mt-4">
              <div class="card-header">
                <canvas id="book" style="min-height: 300px; max-height: 300px; max-width: 100%;"></canvas>
              </div>
              <div class="card-footer">
                <h5 class="text-center">Borrowed book</h5>
              </div>
          </div>

          

        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
<script>
  $(function () {

    // BOOK *****************************
    var donutChartCanvas = $('#book').get(0).getContext('2d')
    var donutData        = {

    labels: [ 'Returned book', 'Approved book', 'Pending book'],
     <?php 
         

            $sql2 = mysqli_query($conn, "SELECT count(borrow_Id) AS returned FROM book_list_borrow WHERE stud_id='$id' AND status='Returned' ");
            $row2 = mysqli_fetch_array($sql2);

            $sql3 = mysqli_query($conn, "SELECT count(borrow_Id) AS approved FROM book_list_borrow WHERE stud_id='$id' AND status='Approved' ");
            $row3 = mysqli_fetch_array($sql3);

            $sql4 = mysqli_query($conn, "SELECT count(borrow_Id) AS pending FROM book_list_borrow WHERE stud_id='$id' AND status='Pending' ");
            $row4 = mysqli_fetch_array($sql4);

      echo " datasets: [ 
              { 
                data: [".$row2['returned'].", ".$row3['approved'].", ".$row4['pending']."], 
                backgroundColor : ['#f56954', '#1a75ff', '#ff8c1a'],
              } 
             ] ";
      ?>
    }

    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      // type: 'pie',
      data: donutData,
      options: donutOptions
    })


  })
</script>