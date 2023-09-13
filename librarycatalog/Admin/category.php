<title>Category | Library Catalog</title>

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
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                    <th>#</th>
                    <th>Category name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM category");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td>
                            <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['cat_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['cat_id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                      </tr>

                    <?php include 'category_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Category name</th>
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


 <?php include 'category_add.php';  ?>
 <?php include 'footer.php'; ?>



