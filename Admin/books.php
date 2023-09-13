<title>Library Catalog | Manage Book</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Book</li>
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
                <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
                <a href="export.php?export=managebook" class="btn btn-sm bg-success float-right mr-2"><i class="fa-solid fa-file-excel"></i> Export</a>
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
                            $result = $conn->query("SELECT * FROM `book_list` ORDER BY book_name");
                                while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['book_code']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['book_description']; ?></td>
                                <td><?php echo $row['book_author']; ?></td>
                                <td><?php echo $row['book_publish']; ?></td>
                                <td><?php echo $row['availability']; ?></td>
                                <td>
                                    <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#update<?php echo $row['book_id']; ?>">Update</button>
                                    <button type="button" class="btn bg-gradient-danger btn-xs" data-toggle="modal" data-target="#delete<?php echo $row['book_id']; ?>">Delete</button>
                                </td>
                                
                            </tr>
                            <?php include 'books_update_delete.php'; } ?>
                            
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

<?php include 'books_add.php'; include 'footer.php'; ?>
