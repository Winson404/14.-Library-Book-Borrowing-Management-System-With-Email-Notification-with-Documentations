<title>Library Catalog | Upload CSV</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload CSV</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Upload CSV</li>
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
                <div class="row d-flex justify-content-start">
                    <div class="col-2">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="formToggle('importFrm');"><span class="bi bi-cloud-plus-fill"> </span>Import CSV</a>
                    </div>
                    <div class="col-8">
                        <div class="upload bg-light p-1" id="importFrm" style="display:none;">
                            <form action="process_save.php" method="post" enctype="multipart/form-data" id="uploadFrm" class="form-vertical">
                                <div class="form-group">
                                    <div class=" d-flex">
                                        <input type="file" name="file" id="file" class="form-control" required>
                                        <input type="submit" class="btn btn-success ml-2" name="importSubmit" value="Upload">
                                    </div>
                                </div>
                            </form>  
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="export.php?export=book" class="btn btn-sm bg-success float-right mr-2"><i class="fa-solid fa-file-excel"></i> Export</a>
                    </div>

                </div>

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
                            <?php include 'addbooks_update_delete.php'; } ?>
                            
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

<script>

    setTimeout(function(){
        document.getElementById("alert").style.display = "none";
    }, 3000);



    function formToggle(ID){
        var element = document.getElementById(ID);
        if(element.style.display === "none"){
            element.style.display = "block";
        } else{
            element.style.display = "none";
        }
    }

</script>