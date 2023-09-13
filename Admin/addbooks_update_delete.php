<div class="modal fade" id="update<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Update book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control form-control-sm"  placeholder="Enter Book code..." name="book_id" required value="<?php echo $row['book_id'] ?>">

          <div class="form-group">
            <label>Book code</label>
            <input type="text" class="form-control form-control-sm"  placeholder="Enter Book code..." name="book_code" required value="<?php echo $row['book_code'] ?>">
          </div>
          <div class="form-group">
            <label>Book name</label>
            <input type="text" class="form-control form-control-sm"  placeholder="Enter Book name..." name="book_name" required value="<?php echo $row['book_name'] ?>">
          </div>
          <div class="form-group">
            <label>Book code</label>
            <textarea class="form-control form-control-sm"  placeholder="Enter Book description..." name="book_description" id="" cols="30" rows="3"><?php echo $row['book_description'] ?></textarea>
          </div>
          <div class="form-group">
            <label>Book Author</label>
            <input type="text" class="form-control form-control-sm"  placeholder="Enter Book Author..." name="book_author" required value="<?php echo $row['book_author'] ?>">
          </div>
          <div class="form-group">
            <label>Date publish</label>
            <input type="number" class="form-control form-control-sm"  placeholder="Ex: 2000" name="book_publish" required value="<?php echo $row['book_publish'] ?>">
          </div>
          <div class="form-group">
            <label>Availability</label>
            <input type="number" class="form-control form-control-sm"  placeholder="Enter availability..." name="availability" required value="<?php echo $row['availability'] ?>">
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_book2" id="create_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>




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
        <button type="submit" class="btn bg-gradient-primary" name="delete_book2" id="delete_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
