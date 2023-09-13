<title>Library App Catalog | Change password</title>
<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in">

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
  <?php 
      if(isset($_GET['user_Id'])) {
      $user_Id = $_GET['user_Id'];
  ?>
          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h3 bluetext"><b>Create new password</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center mb-4">Please create new password.</p>
                <form action="processes.php" method="post" id="quickForm">
                  <input type="hidden" class="form-control" name="user_Id" value="<?php echo $user_Id; ?>">
                  <div class="form-group mb-3">
                    <label for=""><b>New password</b></label>
                    <input type="password" class="form-control" placeholder="New password" name="password" id="mynewpassword" minlength="8">
                  </div>
                  
                  <div class="form-group">
                    <label for=""><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Confirm new password" name="cpassword" id="cpassword" onkeyup="validate_password()" minlength="8">
                  </div>
                  <!-- FOR UNMATCHED PASSWORD -->
                  <div class="input-group mt-1 mb-3">
                    <small id="wrong_pass_alert" style="font-style: italic;"></small>
                  </div>
                  <div class="form-group">
                    <input type="checkbox" id="remember" onclick="myFunction()">
                    <label for="remember">Show password</label>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary" name="changepassword" id="changepassword" style="width: 100%;">Change password</button>
                  </div>
                </form>
                <p class="mb-1 mt-2">
                  <a href="login_student.php" class="bluetext">Student login</a> | <a href="login_admin.php" class="bluetext">Admin login</a>
                </p>
              </div>
            </div>
          </div>

<?php } else { ?>

          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary mt-5">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>404</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center mb-4">Oops! Page not found.</p>
                <br>
                <p>We could not find the page you were looking for.
                    Meanwhile, you may return to <a href="login_student.php">Student login</a> | <a href="login_admin.php">Admin login</a> page.
                </p>
                <br>
                <br>
                <br>
              </div>
            </div>
          </div>
          
<?php } ?>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>

