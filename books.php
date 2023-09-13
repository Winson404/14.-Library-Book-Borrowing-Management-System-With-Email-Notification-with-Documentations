<?php include 'navbar.php'; ?>

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="background-color: #3399ff;">
      <div class="container">
        <h2>Books</h2>
        <p>a set of written sheets of skin or paper or tablets of wood or ivory. : a set of written, printed, or blank sheets bound together between a front and back cover. an address book. : a long written or printed literary composition. reading a good book. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-12 mt-5 mb-4 mt-lg-0 contact">
          <form  method="post" role="form">
            <div class="form-group mt-3  d-flex">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Search Book title, category, catalog number ..." required>
              <button style="margin-left: 10px; background-color: #3399ff;" class="btn btn-success rounded-pill float-right" type="submit" name="search">Search</button>
            </div>
          </form>
        </div>
<style>
  .course-content h3 a.bluetext:hover {
    color: #3399ff;
  }
</style>
<?php 
    if(isset($_POST['search'])) {
        $subject = $_POST['subject'];
        $search = mysqli_query($conn, "SELECT * FROM book JOIN category ON book.category_id=category.cat_id WHERE title LIKE '%".$subject."%' || cat_name LIKE '%".$subject."%' || catalog_number LIKE '%".$subject."%' || shelf_location LIKE '%".$subject."%' ");

        if(mysqli_num_rows($search) > 0) {
          while($row = mysqli_fetch_array($search)) {
?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5">
                          <div class="course-item">
                            <img src="images-book/<?php echo $row['image']; ?>" width="100%" alt="..." height="240">
                            <div class="course-content">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 style="background-color: #3399ff;"><a href="login.php" class="text-white">Available: <?php echo $row['availability']; ?></a></h4>
                                <p class="price"><?php echo $row['catalog_number']; ?></p>
                              </div>

                              <h3><a href="book-details.php?book_id=<?php echo $row['book_id']; ?>" class="bluetext"><?php echo $row['title']; ?></a></h3>
                              <div style="min-height: 70px;">
                                <p><?php echo custom_echo($row['description'], 100); ?></p>
                              </div>
                              <div class="trainer d-flex justify-content-center align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                  <h4 style="background-color: #3399ff;"><a href="login.php" class="text-white">Borrow Book</a></h4>
                                </div>
                                <!-- <div class="trainer-profile d-flex align-items-center">
                                  <span>Available</span>
                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                  <i class="bx bx-heart"></i>&nbsp;
                                  <?php //echo $row['availability']; ?>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </div> <!-- End Course Item-->
  <?php } } else { ?>

                <h3 class="text-center mb-5 py-5">No record found.</h3>

  <?php } } else { ?>

                  <?php 
                    $fetch = mysqli_query($conn, "SELECT * FROM book JOIN category ON book.category_id=category.cat_id ORDER BY book_id DESC");
                    while($row = mysqli_fetch_array($fetch)) {
                  ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5">
                            <div class="course-item">
                              <img src="images-book/<?php echo $row['image']; ?>" width="100%" alt="..." height="240">
                              <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <h4 style="background-color: #3399ff;"><a href="login.php" class="text-white">Available: <?php echo $row['availability']; ?></a></h4>
                                  <p class="price"><?php echo $row['catalog_number']; ?></p>
                                </div>

                                <h3><a href="book-details.php?book_id=<?php echo $row['book_id']; ?>" class="bluetext"><?php echo $row['title']; ?></a></h3>
                                <div style="min-height: 70px;">
                                  <p><?php echo custom_echo($row['description'], 100); ?></p>
                                </div>
                                <div class="trainer d-flex justify-content-center align-items-center">
                                  <div class="trainer-profile d-flex align-items-center">
                                    <h4 style="background-color: #3399ff;"><a href="login.php" class="text-white">Borrow Book</a></h4>
                                  </div>
                                  <!-- <div class="trainer-profile d-flex align-items-center">
                                    <span>Available</span>
                                  </div>
                                  <div class="trainer-rank d-flex align-items-center">
                                    <i class="bx bx-heart"></i>&nbsp;
                                    <?php //echo $row['availability']; ?>
                                  </div> -->
                                </div>
                              </div>
                            </div>
                          </div> <!-- End Course Item-->
                  <?php } ?>

  <?php } ?>

        </div>

      </div>
    </section><!-- End Courses Section -->

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