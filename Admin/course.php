<title>Courses | Library Catalog</title>

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
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
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
                <table id="example111" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course</th>
                    <th scope="col">Date created</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                      <?php 
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM courses");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row["course"]; ?></td>
                        <td><?php echo date("F d, Y", strtotime($row["date_added"])); ?></td>
                        <td>
                          <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#update<?php echo $row['id']; ?>">Update</button>
                          <button type="button" class="btn bg-gradient-danger btn-xs" data-toggle="modal" data-target="#delete<?php echo $row['id']; ?>">Delete</button>
                        </td>
                      </tr>

                    <?php include 'courses_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course</th>
                        <th scope="col">Date created</th>
                        <th scope="col">Action</th>
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


 <?php include 'courses_add.php';  ?>
 <?php include 'footer.php'; ?>



