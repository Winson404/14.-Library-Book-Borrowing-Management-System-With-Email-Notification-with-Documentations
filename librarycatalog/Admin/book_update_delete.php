<div class="modal fade" id="view<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> View book information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
  
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">

          <div class="row">
            <!-- LOAD IMAGE PREVIEW -->
            <div class="col-lg-12 mb-3 d-flex justify-content-center">
                <img src="../images-book/<?php echo $row['image']; ?>" alt="" width="100" height="100" style="border-radius: 50%;">
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Book category</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter book title..." name="title" readonly value="<?php echo $row['cat_name']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Book title</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter book title..." name="title" readonly value="<?php echo $row['title']; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Book description</label>
                <textarea id="" class="form-control form-control-sm" cols="30" rows="2" placeholder="Enter book description..." name="description" readonly><?php echo $row['description']; ?></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <label>Catalog number</label>
                  <input type="text" class="form-control form-control-sm"  placeholder="Enter catalog number..." name="catalog" readonly value="<?php echo $row['catalog_number']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Availability</label>
                <input type="number" class="form-control form-control-sm"  placeholder="Enter availability..." name="availability" readonly value="<?php echo $row['availability']; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Shelf location</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter shelf-location..." name="location" readonly value="<?php echo $row['shelf_location']; ?>">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="button" class="btn bg-gradient-primary" data-dismiss="modal" data-toggle="modal" data-target="#update<?php echo $row['book_id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>






<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Update book information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
  
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control form-control-sm" value="<?php echo $row['book_id']; ?>" name="book_id">
          <div class="row">
            
            <div class="col-lg-6">
            <div class="form-group">
              <label>Book category</label>
              <select class="form-control form-control-sm" name="category" required>
                <option selected disabled>Select catgory</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM category");
                  while ($row2 = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row2['cat_id']; ?>" <?php if($row['category_id'] == $row2['cat_id']) { echo 'selected'; } ?>><?php echo $row2['cat_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Book title</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter book title..." name="title" required value="<?php echo $row['title']; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Book description</label>
                <textarea id="" class="form-control form-control-sm" cols="30" rows="3" placeholder="Enter book description..." name="description" required><?php echo $row['description']; ?></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <label>Catalog number</label>
                  <input type="text" class="form-control form-control-sm"  placeholder="Enter catalog number..." name="catalog" required value="<?php echo $row['catalog_number']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Availability</label>
                <input type="number" class="form-control form-control-sm"  placeholder="Enter availability..." name="availability" required value="<?php echo $row['availability']; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Shelf location</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter shelf-location..." name="location" required value="<?php echo $row['shelf_location']; ?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file form-control-sm" name="fileToUpload" onchange="update_getImagePreview(event)" >
              </div>
            </div>
             <!-- LOAD IMAGE PREVIEW -->
            <div class="col-lg-12">
              <div class="form-group" id="update_preview">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_book" id="update_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
   function update_getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('update_preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }

</script>





<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Delete book information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
  
      <div class="modal-body">
        <form action="process_delete.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control form-control-sm" value="<?php echo $row['book_id']; ?>" name="book_id">
          <h6 class="text-center">Are you sure you want to delete this book record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_book" id="delete_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


