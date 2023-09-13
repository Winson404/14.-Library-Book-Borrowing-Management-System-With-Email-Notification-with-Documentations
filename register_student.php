<title>Library App Catalog | Student registration</title>
<?php include 'navbar.php'; ?>

<style>
  div.row div label {
    margin-bottom: 0px;
    font-weight: bold;
  }
</style>
  <main id="main" data-aos="fade-in">

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-9 mt-5">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1 bluetext"><b>Student registration</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center">Register a new membership</p>
                <form action="processes.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="row">  
                    <div class="col-lg-4">
                        <label>Student ID</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="student_Id" placeholder="Student ID" required>
                        </div>
                    </div>  
                    <div class="col-lg-4">
                        <label>Year level</label>
                        <div class="input-group mb-3">
                          <select class="form-control form-select" name="level_section" required>
                            <option selected disabled>Select year level</option>
                            <option value="1st year">1st year</option>
                            <option value="2nd year">2nd year</option>
                            <option value="3rd year">3rd year</option>
                            <option value="4th year">4th year</option>
                           </select> 
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <label>Course</label>
                        <div class="input-group mb-3">
                          <select class="form-control form-select" name="courses" required>
                            <option selected disabled>Select Course</option>
                          <?php
                            $query=mysqli_query($conn, "SELECT * from courses ORDER BY id asc");
                            while($row2 = mysqli_fetch_assoc($query)) { ?>
                              <option value="<?php echo $row2["course"]; ?>"><?php echo $row2["course"]; ?></option>
                             <?php } ?>
                           </select> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>First name</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="firstname" placeholder="First name" required onkeyup="lettersOnly(this)">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Middle name</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="middlename" placeholder="Middle name"  onkeyup="lettersOnly(this)">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Last name</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="lastname" placeholder="Last name" required onkeyup="lettersOnly(this)">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Suffix</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="suffix" placeholder="Suffix">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Sex</label>
                        <div class="input-group mb-3">
                          <select class="form-control form-select" name="gender" required>
                              <option selected disabled>Select gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select> 
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-group">
                          <span class="text-dark"><b>Date of Birth</b></span>
                          <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()">
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-group">
                          <span class="text-dark"><b>Age</b></span>
                          <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" name="age" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label>Address</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="address" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Email address</label>
                        <div class="input-group">
                          <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()">
                        </div>
                        <small id="text"></small>
                    </div>
                    <div class="col-auto form-group col-lg-6 mb-3">
                        <label>Contact number</label>
                        <div class="input-group">
                          <div class="input-group-text">+63</div>
                          <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "Contact Number" required maxlength="10">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Password</label>
                        <div class="input-group">
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password" required minlength="8" onkeypress="validate_password()">
                        </div>
                        <small id="length"></small>
                    </div>
                    <div class="col-lg-6 ">
                        <label>Confirm password</label>
                        <div class="input-group ">
                          <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password_confirm_password()" required minlength="8">
                        </div>
                        <small id="wrong_pass_alert"></small>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label>Upload image</label>
                        <div class="input-group mb-3">
                          <input type="file" class="form-control" name="fileToUpload" onchange="getImagePreview(event)" required >
                        </div>
                    </div>
                    <!-- LOAD IMAGE PREVIEW -->
                    <div class="col-lg-6 mt-3">
                        <div class="form-group" id="preview">
                        </div>
                    </div>
                </div>
                <div class="row d-none">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                </div>
                <hr>
                <div class="social-auth-links text-center">
                  <button type="submit" name="create_user" class="btn btn-primary" id="usercreate">Submit</button>
                </div>
                <!-- <p>I already have an account? <a href="login.php" class="text-center bluetext">Login here!</a></p> -->
                </form>

            </div>
          </div>

        </div>


      </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>

