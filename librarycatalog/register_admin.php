<title>Library App Catalog | Admin registration</title>
<?php include 'navbar.php';?>
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
                <a href="#" class="h1 bluetext"><b>Administrator registration</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center">Register a new membership</p>
                <form action="processes.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
            
                  <div class="col-lg-4 mb-3">
                      <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label>Middle name</label>
                        <input type="text" class="form-control"  placeholder="Middle name" name="middlename" required onkeyup="lettersOnly(this)">
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                      <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-group">
                      <label>Suffix name</label>
                      <input type="text" class="form-control"  placeholder="Jr./Sr." name="suffix" onkeyup="lettersOnly(this)">
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gender" required>
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
                  <div class="col-lg-3 mb-3">
                      <div class="form-group">
                        <span class="text-dark"><b>Age</b></span>
                        <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" name="age" readonly>
                      </div>
                  </div>
                  <div class="col-auto form-group col-lg-4 mb-3">
                      <label for="contact">Contact number</label>
                      <div class="input-group">
                        <div class="input-group-text">+63</div>
                        <input type="tel" class="form-control " pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10">
                      </div>
                    </div>
                    <div class="col-lg-5 mb-3">
                        <div class="form-group">
                          <label>Email address</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()">
                          <small id="text" style="font-style: italic;"></small>
                        </div>
                    </div>

                  <div class="col-lg-12 mb-3">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control"  placeholder="Address" name="address" required>
                      </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control"  placeholder="Password" name="password" required id="password" minlength="8">
                      </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                      <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required id="cpassword" onkeyup="validate_password()" minlength="8">
                        <small id="wrong_pass_alert" style="font-style: italic;"></small>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file form-control" name="fileToUpload" onchange="getImagePreview(event)" required>
                      </div>
                  </div>
                  <!-- LOAD IMAGE PREVIEW -->
                  <div class="col-lg-6 ">
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
                  <button type="submit" name="create_admin" class="btn btn-primary" id="usercreate">Submit</button>
                </div>
                <p>I already have an account? <a href="login_admin.php" class="text-center bluetext">Login here!</a></p>
                </form>

            </div>
          </div>

        </div>


      </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>
