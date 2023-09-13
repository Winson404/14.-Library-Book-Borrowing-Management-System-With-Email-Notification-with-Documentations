<title>Library App Catalog | Verify code</title>
<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in">

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
<?php 
    if(isset($_GET['user_Id']) && isset($_GET['email'])) {

    $user_Id = $_GET['user_Id'];
    $email   = $_GET['email'];
?>
          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h3 bluetext"><b>Enter security code</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center mb-4">Please check your email for a message with your code. Your code is 6 numbers long.</p>
                <form action="processes.php" method="post" id="quickForm">
                  <input type="hidden" class="form-control mb-3" value="<?php echo $user_Id; ?>" name="user_Id">
                  <input type="hidden" class="form-control mb-3" value="<?php echo $email; ?>" name="email">
                  <div class="form-group">
                    <label for=""><b>Enter verification code</b></label>
                    <input type="number" class="form-control" placeholder="Enter verification code" name="code" minlength="6" maxlength="6" required>
                  </div>
                  <div class="form-group">
                    <p class="mt-1">We sent your code to: <b><?php echo $email; ?></b></p>
                  </div> 
                  <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary" name="verify_code" style="width: 100%;">Continue</button>
                  </div>
                </form>
                <p class="mb-1 mt-2">
                  <a href="sendcode.php?user_Id=<?php echo $user_Id; ?>" class="mt-1 bluetext">Didn't get a code?</a>
                </p>
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
