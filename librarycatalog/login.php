<title>Library App Catalog | Login</title>
<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in">

    <section id="courses" class="courses mt-5">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
<?php 
    if(isset($_POST['changepassword'])) {
    $user_Id = $_POST['user_Id'];
    $cpassword = md5($_POST['cpassword']);
    $update = mysqli_query($conn, "UPDATE users SET password='$cpassword' WHERE user_Id='$user_Id'");
      if($update) {
        $_SESSION['message'] = "Password has been changed. Please login to your account.";
        $_SESSION['text'] = "Successfully changed";
        $_SESSION['status'] = "success";
        include 'sweetalert_messages.php';
        echo '<script>window.history.go(+1); </script>';
  ?>
          <div class="col-lg-4">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Login</b></a>
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
                    <input type="checkbox" id="remember" onclick="myFunction()">
                    <label for="remember">Show password</label>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-success" name="login" id="login" style="width: 100%;">Sign In</button>
                  </div>
                </form>
                <p class="mb-1 mt-2">
                  <a href="forgot-password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                  <a href="register.php" class="text-center">Register a new membership</a>
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
                    Meanwhile, you may return to <a href="login.php">login</a> page.
                </p>
                <br>
                <br>
                <br>
              </div>
            </div>
          </div>
          
<?php } } else { ?>

          <div class="col-lg-4">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Login</b></a>
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
                    <input type="checkbox" id="remember" id="remember" onclick="myFunction()">
                    <label for="remember">Show password</label>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-success" name="login" id="login" style="width: 100%;">Sign In</button>
                  </div>
                </form>
                <p class="mb-1 mt-2">
                  <a href="forgot-password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                  <a href="register.php" class="text-center">Register a new membership</a>
                </p>
              </div>
            </div>
          </div>

<?php } ?>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>



<script>

  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('login').disabled = false;
        document.getElementById('login').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('login').disabled = true;
        document.getElementById('login').style.opacity = (0.4);
        
    }
  }
</script>