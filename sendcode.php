<title>Library App Catalog | Verify email</title>
<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in">


    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
<?php 
    if(isset($_GET['user_Id'])) {
      $user_Id = $_GET['user_Id'];
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
      $row = mysqli_fetch_array($fetch);
?>
          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1 bluetext"><b>Reset password</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center mb-4">You forgot your password? Here you can easily retrieve a new password.</p>
                <form action="processes.php" method="post" id="quickForm">
                  <input type="hidden" class="form-control mb-3" name="email" value="<?php echo $row['email']; ?>">
                  <input type="hidden" class="form-control mb-3" name="user_Id" value="<?php echo $user_Id; ?>">
                  <div class="form-group mb-3">
                    <img src="images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
                  </div>
                  <p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>
                  <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                  <div class="form-group">
                    <p style="margin-bottom: 0px;">Send code via email?</p>
                    <p><b><?php echo $row['email']; ?></b></p>
                  </div>

                  <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary" name="sendcode" style="width: 100%;">Continue</button>
                  </div>
                </form>
                <p class="mb-1 mt-2">
                  <a href="forgot-password.php" class="bluetext">Not you?</a>
                </p>
              </div>
            </div>
          </div>

<?php } else { ?>

          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary mt-5">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>500</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center mb-4">Oops! Something went wrong.</p>
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
