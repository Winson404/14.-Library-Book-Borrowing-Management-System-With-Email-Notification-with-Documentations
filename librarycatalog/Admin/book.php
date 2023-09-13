<title>Manage Books | Library Catalog</title>

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
            <h1>Manage Books</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Books</li>
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
                <div class="d-flex">
                  <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Book category</th>
                    <th>Catalog number</th>
                    <th>Book name</th>
                    <th>Shelf-Location</th>
                    <th>Available book</th>
                    <th>Views</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM book JOIN category ON book.category_id=category.cat_id");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?> 
                    <tr>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['catalog_number']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['shelf_location']; ?></td>
                        <td><?php echo $row['availability']; ?></td>
                        <td>
                            <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#view<?php echo $row['book_id']; ?>"><i class="fa-solid fa-eye"></i></button>
                            <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['book_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            
                        </td> 
                    </tr>

                    <?php include 'book_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Book category</th>
                        <th>Catalog number</th>
                        <th>Book name</th>
                        <th>Shelf-Location</th>
                        <th>Available book</th>
                        <th>Actions</th>
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


 <?php include 'book_add.php';  ?>
 <?php include 'footer.php'; ?>



