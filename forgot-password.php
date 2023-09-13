<title>Library App Catalog | Forgot password</title>
<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in" class="mb-5">

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 mt-5">
            <div class="card card-outline card-primary mt-5">
              <div class="card-header text-center">
                <a href="#" class="h3 bluetext"><b>Find your account</b></a>
              </div>
              <div class="card-body">
                <p class="login-box-msg text-center mb-4">You forgot your password? Here you can easily retrieve a new password.</p>
                <form action="processes.php" method="post" id="quickForm">
                  
                  <div class="form-group">
                    <label for=""><b>Email</b></label>
                    <input type="email" class="form-control" placeholder="email@gmail.com" name="email"  id="email" onkeydown="validation()" onkeyup="validation()" required>
                  </div>
                  <!-- FOR INVALID EMAIL -->
                  <div class="input-group mt-1 mb-3">
                    <small id="text" style="font-style: italic;"></small>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary" name="search" id="usercreate" style="width: 100%;">Request new password</button>
                  </div>
                </form>
                <p class="mb-1 mt-2">
                  <a onclick="window.history.back();" type="button" class="bluetext">Login</a>
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'footer.php'; ?>

