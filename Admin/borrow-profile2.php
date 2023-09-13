<title>Borrowed book info | Library App Catalog</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['borrow_Id']))
    $borrow_Id = $_GET['borrow_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM book_list_borrow JOIN book_list ON book_list_borrow.book_id=book_list.book_id JOIN users ON book_list_borrow.stud_id=users.user_Id WHERE borrow_Id='$borrow_Id'");
    $row = mysqli_fetch_array($fetch);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Borrowed book info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Borrowed book info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../images-users/<?php echo $row['image']; ?>"
                       alt="User profile picture"  style="height: 90px; width: 90px; border-radius: 50%;">
                </div>
                <h3 class="profile-username text-center"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?></h3>
                <p class="text-muted text-center"><?php echo $row['level_section']; ?></p>
                <a class="btn bg-gradient-primary btn-block">Profile</a>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header bg-gradient-primary">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted"><?php echo $row['address']; ?></p>
                <hr>
              </div>
            </div>

          </div>


          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#viewprofile" data-toggle="tab">Book borrower info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#updateprofile" data-toggle="tab">Book info</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="viewprofile">
                     <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                              <input type="text" class="form-control" value="<?php echo $row['gender']; ?>" readonly>
                            <!-- <select class="custom-select" name="gender" required disabled>
                                 <?php if($row['gender'] == 'Male'): ?>
                                      <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                                      <option value="Female">Female</option>
                                 <?php else: ?>
                                      <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                                      <option value="Male">Male</option>
                                <?php endif; ?>
                             </select>  -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Date of birth" class="col-sm-2 col-form-label">Date of birth</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="Date of birth" placeholder="Date of birth" value="<?php echo $row['dob']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="Age" placeholder="Age" value="<?php echo $row['age']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Address" placeholder="Address" value="<?php echo $row['address']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Contact number" placeholder="Contact number" value="<?php echo $row['contact']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Date registered" class="col-sm-2 col-form-label">Date registered</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="Date registered" placeholder="Date registered" value="<?php echo $row['date_registered']; ?>" readonly>
                        </div>
                      </div>
                  </div>


                  <div class="tab-pane" id="updateprofile">
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Book code</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $row['book_code']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Middle name" class="col-sm-2 col-form-label">Book title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $row['book_name']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Last name" class="col-sm-2 col-form-label">Book description</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $row['book_description']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Suffix" class="col-sm-2 col-form-label">Book Author</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $row['book_author']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Date of birth" class="col-sm-2 col-form-label">Availability</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $row['availability']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Date added</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo date("F d, Y", strtotime($row['book_publish'])); ?>" readonly>
                        </div>
                      </div>
                  </div>



                </div>
              </div>
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

<?php include 'footer.php'; ?>

