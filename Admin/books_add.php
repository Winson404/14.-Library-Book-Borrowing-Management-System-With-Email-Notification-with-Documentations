<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Add book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Book code</label>
            <input type="text" class="form-control form-control-sm"  placeholder="Enter Book code..." name="book_code" required>
          </div>
          <div class="form-group">
            <label>Book name</label>
            <input type="text" class="form-control form-control-sm"  placeholder="Enter Book name..." name="book_name" required>
          </div>
          <div class="form-group">
            <label>Book code</label>
            <textarea class="form-control form-control-sm"  placeholder="Enter Book description..." name="book_description" id="" cols="30" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label>Book Author</label>
            <input type="text" class="form-control form-control-sm"  placeholder="Enter Book Author..." name="book_author" required>
          </div>
          <div class="form-group">
            <label>Date publish</label>
            <input type="number" class="form-control form-control-sm"  placeholder="Ex: 2000" name="book_publish" required>
          </div>
          <div class="form-group">
            <label>Availability</label>
            <input type="number" class="form-control form-control-sm"  placeholder="Enter availability..." name="availability" required>
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


