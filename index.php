<?php include 'navbar.php'; ?>

<style>
  a.btn-get-started {
    background-color: #3399ff;
  }
  .body{
    background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url("..//librarycatalog/images/librarryyyyyyy.jpg");
    /* background-image:url("..//librarycatalog/images-users/librarryyyyyyy.jpg"); */
    background-repeat: no-repeat;
    background-size:cover;
  }
</style>

  <!-- ======= Hero Section ======= -->
  <div class="body">
    <!-- <section id="hero" class="d-flex justify-content-center align-items-center"> -->
  <section id="hero" class="d-flex justify-content-center align-items-center"  style="background-image: url('images/librarryyyyyyy.jpg');">

      <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <h1>Learning Today,<br>Leading Tomorrow</h1>
        <!-- <a href="login.php" class="btn-get-started">Get Started</a> -->
      </div>
    </section><!-- End Hero -->
  </div>


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <?php 
            // Query to get the top three most borrowed books
            $sql = mysqli_query($conn, "SELECT blb.book_id, bl.book_code, bl.book_name, bl.book_description,  bl.book_author, COUNT(*) AS borrow_count 
              FROM book_list_borrow blb
              JOIN book_list bl ON blb.book_id = bl.book_id
              GROUP BY blb.book_id 
              ORDER BY borrow_count DESC 
              LIMIT 3");

            if (mysqli_num_rows($sql) > 0) { ?>
              <div class="col-12 section-bg mb-4">
                <h2>Top 3 Most Borrowed Books</h2>
              </div>
            <?php while ($row = mysqli_fetch_assoc($sql)) { ?>  
              <div class="col-4">
                <h4><?php echo ucwords($row['book_name']); ?> <span class="text-muted font-italic" style="font-size:20px">by: <?php echo $row['book_author']; ?></span></h4>
                <p style="text-indent: 30px;" class="text-justify"><?php echo $row['book_description']; ?></p>
              </div>
            <?php
                    // echo "Book ID: " . $row['book_id'] . "<br>";
                    // echo "Borrow Count: " . $row['borrow_count'] . "<br><br>";
                }
            } else {
                echo "No books found.";
            }

          ?>

          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>


          <div class="col-12 section-bg">
            <h2>About</h2>
          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="images/librarryyyyyyy.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            
            <p class="fst-italic">
              Libraries are a great place to find information 
              since they have a wide variety of materials available,
              including book, papers, journals and much more. 
              Borrowing books is one of the key services that libraries provide. 
              Especially for people who only have mobile phones, the current method, 
              which consists of web applications, is ineffective and not very accessible.
              The current system is ineffective at managing all the responsibilities
              a library should handle to provide better services to its users. Users of the library might have trouble locating, recognizing, choosing, and receiving the resources they required.
            </p>
            <!--
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            </p>
 -->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="7000" data-purecounter-duration="1" class="purecounter" style="color: #3399ff;"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter" style="color: #3399ff;"></span>
            <p>Courses</p>
          </div>
<!--
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter" style="color: #3399ff;"></span>
            <p>Trainers</p>
          </div>
-->
        </div>

      </div>
    </section><!-- End Counts Section -->
    

    <!-- ======= Popular Courses Section ======= -->
    <!--
    <section id="books" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Books</h2>
          <p>Available Books</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

<style>
  .course-content h3 a.bluetext:hover {
    color: #3399ff;
  }
</style>
  
     ======= Trainers Section ======= -->
    <!--
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Walter White</h4>
                <span>Web Development</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>--><!-- End Trainers Section -->
  







    <!-- ======= Breadcrumbs ======= -->
    <!-- <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div>

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Cebu Philippines</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>erwin@gmail.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+639359428963</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>
      </div>
    </section> -->



  </main><!-- End #main -->

<?php include 'footer.php'; ?>
<?php 

  function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

?>
<script>
    function myFunction() {
        var x = document.getElementById("shelf").value;
        document.getElementById("as_is_shelf").value = x;
    }

    function myFunctiontwo() {
        var x = document.getElementById("category").value;
        document.getElementById("as_is_category").value = x;
    }

    function myFunctionthree() {
        var x = document.getElementById("catalog-number").value;
        document.getElementById("as_is_catalog-number").value = x;
    }
</script>