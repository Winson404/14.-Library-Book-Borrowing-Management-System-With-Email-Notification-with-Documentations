<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<?php 
    if(isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $fetch = mysqli_query($conn, "SELECT * FROM book JOIN category ON book.category_id=category.cat_id  WHERE book.book_id='$book_id'");
    $row_book = mysqli_fetch_array($fetch);
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h2 class="text-center display-4" style="font-weight: bold;">
            <a href="search.php">
                <span class="text-primary">L</span>
                <span class="text-danger">I</span>
                <span class="text-warning">B</span>
                <span class="text-primary">R</span>
                <span class="text-success">A</span>
                <span class="text-danger">R</span>
                <span class="text-warning">Y</span>
            </a>
        </h2>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="search-book.php" method="POST">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Shelf location:</label>
                                    <select class="select2" data-placeholder="Shelf location" id="shelf" style="width: 100%;" onchange="myFunction()">
                                    <!-- <select class="select2" multiple="multiple" data-placeholder="Shelf location" style="width: 100%;" name="shelf-location"> -->
                                        <option selected>Select shelf location</option>
                                        <?php  
                                            $fetch = mysqli_query($conn, "SELECT * FROM book");
                                            while($row = mysqli_fetch_array($fetch)) {
                                        ?>
                                        <option value="<?php echo $row['shelf_location']; ?>"><?php echo $row['shelf_location']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- PASSING VALUE ON CHANGE -->
                                    <input type="hidden" class="form-control form-control-lg" id="as_is_shelf" name="shelf_location">
                                    <!-- END PASSING VALUE ON CHANGE -->
                                </div>
                            </div>
                         
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Book category:</label>
                                    <select class="select2" style="width: 100%;" id="category" onchange="myFunctiontwo()">
                                        <option selected>Select category</option>
                                         <?php  
                                            $fetch = mysqli_query($conn, "SELECT * FROM category");
                                            while($row = mysqli_fetch_array($fetch)) {
                                        ?>
                                            <option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- PASSING VALUE ON CHANGE -->
                                    <input type="hidden" class="form-control form-control-lg" id="as_is_category" name="book_category">
                                    <!-- END PASSING VALUE ON CHANGE -->
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Catalog number:</label>
                                    <select class="select2" style="width: 100%;" id="catalog-number" onchange="myFunctionthree()">
                                        <option selected>Select catalog number</option>
                                        <?php  
                                            $fetch = mysqli_query($conn, "SELECT * FROM book");
                                            while($row = mysqli_fetch_array($fetch)) {
                                        ?>
                                        <option value="<?php echo $row['catalog_number']; ?>" ><?php echo $row['catalog_number']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- PASSING VALUE ON CHANGE -->
                                    <input type="hidden" class="form-control form-control-lg" id="as_is_catalog-number" name="catalog_number" >
                                    <!-- END PASSING VALUE ON CHANGE -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Search book..." name="book_title">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default" name="search-book">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="../images-book/<?php echo $row_book['image']; ?>" alt="book-image" width="280">
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right"><?php echo $row_book['catalog_number']; ?></div>
                                        <h5 class="text-primary"><?php echo $row_book['title']; ?></h5>
                                        <p class="mb-0" style="text-align: justify;"><?php echo $row_book['description']; ?></p>
                                        <p class="mb-0" style="text-align: justify;"><span class="text-success">Available: </span><?php echo $row_book['availability']; ?></p>
                                        <a type="button" class="float-right badge badge-success" data-toggle="modal" data-target="#borrow<?php echo $row_book['book_id']; ?>" style="font-size: 13px;">Borrow book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Borrow book (book-info.php) -->
    <div class="modal fade" id="borrow<?php echo $row_book['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Borrow book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
            </button>
          </div>
      
          <div class="modal-body">
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control form-control-sm" value="<?php echo $row_book['book_id']; ?>" name="book_id">
              <input type="hidden" class="form-control form-control-sm" value="<?php echo $id; ?>" name="user_id">
              <h6 class="text-center">Borrow this book?</h6>
          </div>
          <div class="modal-footer alert-light">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
            <button type="submit" class="btn bg-gradient-primary" name="borrow_book" id="delete_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    


<?php } else { include '404.php'; } ?>

  </div>

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

<?php include 'footer.php'; ?>

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