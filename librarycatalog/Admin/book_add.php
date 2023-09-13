<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Create book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">

          <div class="row">
          
          <div class="col-lg-6">
            <div class="form-group">
              <label>Book category</label>
              <select class="form-control form-control-sm" name="category" required>
                <option selected disabled>Select catgory</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM category");
                  while ($row = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Book title</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter book title..." name="title" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Book description</label>
                <textarea id="" class="form-control form-control-sm" cols="30" rows="3" placeholder="Enter book description..." name="description" required></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <label>Catalog number</label>
                  <input type="text" class="form-control form-control-sm"  placeholder="Enter catalog number..." name="catalog" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Availability</label>
                <input type="number" class="form-control form-control-sm"  placeholder="Enter availability..." name="availability" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Shelf location</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Enter shelf-location..." name="location" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file form-control-sm" name="fileToUpload" onchange="getImagePreview(event)" required>
              </div>
            </div>
             <!-- LOAD IMAGE PREVIEW -->
            <div class="col-lg-6">
              <div class="form-group" id="preview">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="create_book" id="create_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
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


