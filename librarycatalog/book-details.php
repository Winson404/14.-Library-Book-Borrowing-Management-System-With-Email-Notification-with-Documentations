<?php include 'navbar.php'; ?>
<?php 
    if(isset($_GET['book_id']))
      $book_id = $_GET['book_id'];
    $fetch = mysqli_query($conn, "SELECT * FROM book JOIN category ON book.category_id=category.cat_id WHERE book_id='$book_id'");
    $row = mysqli_fetch_array($fetch);
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in" style="background-color: #3399ff;">
      <div class="container" >
        <h2>Book Details</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="images-book/<?php echo $row['image']; ?>" class="img-fluid" alt="">
            <h3><?php echo $row['title']; ?></h3>
            <p>
              <?php echo $row['description']; ?>
            </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Book category</h5>
              <p><?php echo $row['cat_name']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Catalog number</h5>
              <p><a href="#"><?php echo $row['catalog_number']; ?></a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Shelf location</h5>
              <p><?php echo $row['shelf_location']; ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Available book</h5>
              <p><?php echo $row['availability']; ?></p>
            </div>

            <hr>

            <h5 style="background-color: #3399ff;" class="text-center p-2 rounded" ><a class="text-white" href="login.php">Borrow book</a></h5>

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->


  </main><!-- End #main -->

<?php include 'footer.php'; ?>