<title>Library App Catalog | Login</title>
<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in">

    <section id="courses" class="courses mt-5">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">

            <div class="col-lg-4">
              <div class="card card-outline card-primary">
                <div class="card-header text-center">
                  <a href="#" class="h1 bluetext"><b>Student login</b></a>
                </div>
                <div class="card-body">
                  <p class="login-box-msg text-center mb-4">Sign in to start your session</p>
                  <form action="processes.php" method="post" id="quickForm">
                    
                    <div class="form-group">
                      <label for=""><b>Email</b></label>
                      <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" >
                    </div>
                    <!-- FOR INVALID EMAIL -->
                    <div class="input-group mt-1 mb-3">
                      <small id="text" style="font-style: italic;"></small>
                    </div>
                    <div class="form-group">
                      <label for=""><b>Password</b></label>
                      <input type="password" class="form-control" placeholder="Password" id="password" name="password" minlength="8" required>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" id="remember" onclick="loginFunction()">
                      <label for="remember">Show password</label>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                      <button type="submit" class="btn btn-primary" name="login_student" id="login" style="width: 100%;">Sign In</button>
                    </div>
                  </form>
                  <p class="mb-1 mt-2">
                    <a href="forgot-password.php" class="bluetext">I forgot my password</a>
                  </p>
                  <p class="mb-0">
                    <a href="register_student.php" class="text-center bluetext">Register a new membership</a>
                  </p>
                </div>
              </div>
            </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>
