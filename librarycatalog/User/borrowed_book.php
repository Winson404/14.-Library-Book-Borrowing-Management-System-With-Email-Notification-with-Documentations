<title>Borrowed Books | Library Catalog</title>

<?php 
  include 'navbar.php';
  include '../sweetalert_messages.php'; 
?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Borrowed Books</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Borrowed Books</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <!--  <div class="d-flex">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Book name</th>
                    <th>Date borrowed</th>
                    <th>Date approved</th>
                    <th>Date returned</th>
                    <th>Status</th>
                  <!--   <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody id="users_data" >
                    
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM borrowed_book JOIN book ON borrowed_book.book_id=book.book_id WHERE borrowed_book.user_id='$id'");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>

                        <td class="text-center">
                          <?php if($row['date_borrowed'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-warning"><?php echo $row['date_borrowed']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row['date_approved'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row['date_approved']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row['date_returned'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row['date_returned']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row['borrowed_status'] == 'Pending'): ?>
                            <span class="badge bg-gradient-danger"><?php echo $row['borrowed_status']; ?></span>
                          <?php elseif($row['borrowed_status'] == 'Returned'): ?>
                            <span class="badge bg-gradient-primary"><?php echo $row['borrowed_status']; ?></span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row['borrowed_status']; ?></span>
                          <?php endif; ?>
                        </td>
<!-- 
                        <td>
                            <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['borrowed_id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
 -->
                    </tr>

                    <?php include 'borrowed_book_remove.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Book name</th>
                        <th>Date borrowed</th>
                        <th>Date approved</th>
                        <th>Date returned</th>
                        <th>Status</th>
                    <!--     <th>Action</th> -->
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 <?php include 'footer.php'; ?>



