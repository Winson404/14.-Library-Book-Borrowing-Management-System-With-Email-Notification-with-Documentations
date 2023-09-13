<title>Library Catalog | Book lists</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book lists</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Book lists</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              </div>
              <div class="card-body">
                    <table class="table table-stripped table-bordered mx-0" id="example111">
                        <thead class="thead-success">
                            <tr>
                                <th >Book Code</th>
                                <th>Book Title</th>
                                <th>Book Description</th>
                                <th>Book Author</th>
                                <th>Year Publish</th>
                                <th>Availability</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $result = $conn->query("SELECT * FROM book_list WHERE availability != 0 ORDER BY book_name");
                                while($row = $result->fetch_assoc()) {

                                  $rate_book_id = $row['book_id'];
                                  $check_rate = mysqli_query($conn, "SELECT * FROM ratings WHERE book_id='$rate_book_id' ");
                            ?>
                            <tr>
                                <td><?php echo $row['book_code']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['book_description']; ?></td>
                                <td><?php echo $row['book_author']; ?></td>
                                <td><?php echo $row['book_publish']; ?></td>
                                <td><?php echo $row['availability']; ?></td>
                                <td>
                                   <button type="button" class="btn bg-gradient-primary btn-xs" data-toggle="modal" data-target="#borrow<?php echo $row['book_id']; ?>">Borrow</button>

                                   <?php if(mysqli_num_rows($check_rate) > 0): ?>
                                    <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#view_rate<?php echo $row['book_id']; ?>">Ratings</button>
                                   <?php else: ?>
                                    <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#view_rate<?php echo $row['book_id']; ?>" disabled>Ratings</button>
                                   <?php endif; ?>
                                </td>
                                
                            </tr>
                            <?php include 'booklist_borrow.php'; } ?>
                            
                        </tbody>
                    </table>

                    

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
