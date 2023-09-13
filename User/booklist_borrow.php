<!-- APPROVE BOOK-->
<div class="modal fade" id="borrow<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Borrow Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['book_id']; ?>" name="booklist_id">
          <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="user_id">
          <h6 class="text-center">Are you gonna borrow this book?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="borrow_booklist"><i class="fa-solid fa-floppy-disk"></i> Confirm</button>
      </div>
        </form>
    </div>
  </div>
</div>





<!-- VIEW RATINGS BOOK-->
<div class="modal fade" id="view_rate<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Book ratings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          $ave = mysqli_query($conn, "SELECT AVG(ratings) AS average_rating FROM ratings WHERE book_id = '$rate_book_id'");
          $ave_rate = mysqli_fetch_array($ave);
        ?>
        <h4 class="text-bold"><?php echo ucwords($row['book_name']); ?></h4>
        <p class="result">Ratings: 
        
        <?php
          $average_rating = $ave_rate['average_rating']; // Assuming the value is already assigned

          if ($average_rating >= 1 && $average_rating <= 5) {
              $rounded_rating = min(floor($average_rating), 5);
              $fraction = $average_rating - $rounded_rating;

              echo number_format($average_rating, 1);

              // Display stars for rounded rating
              for ($i = 1; $i <= $rounded_rating; $i++) {
                  echo ' <i class="fa-solid fa-star text-warning"></i>';
              }

              // Display partially colored star if fraction is between 0.1 and 0.9
              if ($fraction >= 0.1 && $fraction <= 0.9) {
                  echo ' <i class="fa-solid fa-star-half text-warning"></i>';
              }
          }
          ?>
        </p>

        <div class="form-group mt-5" style="min-height: 200px; max-height:200px; overflow: auto;">
          <span class="text-bold m-0">Feedbacks:</span>
          <hr>
          <?php 
            $get_rate = mysqli_query($conn, "SELECT * FROM ratings WHERE book_id='$rate_book_id'");
            if(mysqli_num_rows($get_rate) > 0) {
              while ($r_rate = mysqli_fetch_array($get_rate)) { ?>
                <p class="text-justify"><i class="fa-solid fa-comment"></i>: <?php echo $r_rate['feedback']; ?> <br>
                  <span class="text-xs text-muted font-italic"><?php echo $r_rate['date_rated']; ?></span>
                </p>
          <?php }
            } else {
          ?>
            <p class="text-justify">No ratings yet.</p>
          <?php
            }
          ?>
          
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
      </div>
    </div>
  </div>
</div>






<!-- RATE BOOK-->
<div class="modal fade" id="rate<?php echo $row['book_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Rate Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['book_id']; ?>" name="book_id">
          <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="stud_id">
          <h4 class="text-center mb-4">Was this page helpful?</h4>

            <div class="rateyo d-block m-auto" id= "rating"
               data-rateyo-rating="0"
               data-rateyo-num-stars="5"
               data-rateyo-score="3">
             </div>
             <br>
            <p class="result text-center" style="margin-left: 5px;">Ratings: 0</p>
            <input type="hidden" class="form-control" name="rating">

            <div class="form-group mt-3">
              <span class="text-bold m-0">Feedback</span>
              <textarea name="feedback" class="form-control" placeholder="Describe your experience (Optional)" cols="30" rows="2"></textarea>
            </div>


      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="rate_book"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
