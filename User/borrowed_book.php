<title>Borrowed Books | Library Catalog</title>

<?php 
  include 'navbar.php';
  include '../sweetalert_messages.php'; 

?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Borrowed Books</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Borrowed Books</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <!--  <div class="d-flex">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table class="table table-stripped table-bordered mx-0" id="example111">
                    <thead class="thead-success">
                        <tr>
                            <th>Book name</th>
                            <th>Date borrowed</th>
                            <th>Date approved</th>
                            <th>Date returned</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $result = $conn->query("SELECT * FROM book_list_borrow JOIN book_list ON book_list_borrow.book_id=book_list.book_id WHERE availability != 0 ORDER BY book_name");
                            while($row = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['book_name']; ?></td>
                            <td class="text-center">
                              <?php if($row['date_borrowed'] == ''): ?>
                                <span class="badge bg-gradient-dark">NA</span>
                              <?php else: ?>
                                <span class="badge bg-gradient-warning"><?php echo $row['date_borrowed']; ?></span>
                              <?php endif; ?>
                            </td>

                            <td class="text-center">
                              <?php if($row['date_approved'] == ''): ?>
                                <span class="badge bg-gradient-dark">NA</span>
                              <?php else: ?>
                                <span class="badge bg-gradient-success"><?php echo $row['date_approved']; ?></span>
                              <?php endif; ?>
                            </td>

                            <td class="text-center">
                              <?php if($row['date_returned'] == ''): ?>
                                <span class="badge bg-gradient-dark">NA</span>
                              <?php else: ?>
                                <span class="badge bg-gradient-success"><?php echo $row['date_returned']; ?></span>
                              <?php endif; ?>
                            </td>

                            <td class="text-center">
                              <?php if($row['status'] == 'Pending'): ?>
                                <span class="badge bg-gradient-danger"><?php echo $row['status']; ?></span>
                              <?php elseif($row['status'] == 'Returned'): ?>
                                <span class="badge bg-gradient-primary"><?php echo $row['status']; ?></span>
                              <?php else: ?>
                                <span class="badge bg-gradient-success"><?php echo $row['status']; ?></span>
                              <?php endif; ?>
                            </td>

                            <td class="text-center">
                              <?php if($row['status'] == 'Returned'): ?>
                                <button type="button" class="btn bg-gradient-primary btn-xs" data-toggle="modal" data-target="#rate<?php echo $row['book_id']; ?>">Rate</button>
                              <?php else: ?>
                                <button type="button" class="btn bg-gradient-primary btn-xs" data-toggle="modal" data-target="#rate<?php echo $row['book_id']; ?>" disabled>Rate</button>
                              <?php endif; ?>
                            </td>
                           
                            
                        </tr>
                        <?php include 'booklist_borrow.php'; } ?>
                        
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 <?php include 'footer.php'; ?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Ratings: '+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>