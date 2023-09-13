<title>Borrowed Books | Library App Catalog</title>

<?php 
  include 'navbar.php';
  include '../sweetalert_messages.php'; 
?>

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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Borrower name</th>
                    <th>Book name</th>
                    <th>Date borrowed</th>
                    <th>Date approved</th>
                    <th>Date to return</th>
                    <th>Fines</th>
                    <th>Date returned</th>
                    <th>Status</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data" >
                    
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM borrowed_book JOIN book ON borrowed_book.book_id=book.book_id JOIN users ON borrowed_book.user_id=users.user_Id");
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td><?php echo $row['title']; ?></td>
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

                        <!-- Return Date-->
                        <td class="text-center">
                          <?php if($row['date_approved'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: 
                            $date = $row['date_approved'];
                            $dates = date('Y-m-d', strtotime($date. '+ 1 day'));
                            $time = '08:00:00';
                            $combinedDT = date('Y-m-d H:i:s', strtotime("$dates $time"));
                          ?>
                            <span class="badge bg-gradient-success"><?php echo $combinedDT; ?></span>
                          <?php endif; ?>
                        </td>

                         <!-- For fines-->
                         <td class="text-center">
                          <?php if($row['date_returned'] == ''): 
                            $currentdate = date('Y-m-d H:i:s');
                            $date = $row['date_approved'];
                            $dates = date('Y-m-d', strtotime($date. '+ 1 day'));
                            $datez = date('Y-m-d', strtotime($date. '+ 2 day'));
                            $time = '08:00:00';
                            $combinedDT = date('Y-m-d H:i:s', strtotime("$datez $time"));
                            $combinedDTS = date('Y-m-d H:i:s', strtotime("$dates $time"));
                            if($combinedDT < $currentdate)
                            {
                              $diffdate1 = date_create($dates);
                              $diffdate2 = date_create($currentdate);
                              //compute difference of two dates
                              $diffs = date_diff($diffdate1, $diffdate2);
                              $diffsz = $diffs->format('%a');
                              $fines = $diffsz * 10;
                          ?>
                           <span class="badge bg-gradient-danger"><?php echo '₱'.$fines.'.00'; ?></span>
                          <?php } 
                          elseif($combinedDTS < $currentdate && $currentdate > $combinedDT){
                              
                              $datetimes1 = new DateTime($combinedDT);
                              $datetimes2 = new DateTime($currentdate);
                              $diffs = $datetimes1->diff($datetimes2);
                              $diff = $diffs->format(' %h');
                              $fines = $diff + 5;
                            
                          ?>
                             <span class="badge bg-gradient-danger"><?php echo '₱'.$fines.'.00';?></span>
                          <?php } elseif($date < $currentdate) { ?>
                            
                            <span class="badge bg-gradient-info">StandBy</span>
                          <?php } ?>

                          <?php else: ?>
                          <span class="badge bg-gradient-dark">NA</span> 
                          <?php
                           
                          endif; ?>
                        </td>

                       
                        <td class="text-center">
                          <?php if($row['date_returned'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row['date_returned']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row['borrowed_status'] == 'Pending'): ?>
                            <span class="badge bg-gradient-danger"><?php echo $row['borrowed_status']; ?></span>
                          <?php elseif($row['borrowed_status'] == 'Returned'): ?>
                            <span class="badge bg-gradient-primary"><?php echo $row['borrowed_status']; ?></span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row['borrowed_status']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td>
                            <a href="borrow-profile.php?borrowed_book_Id=<?php echo $row['borrowed_id']; ?>" class="btn bg-gradient-primary"><i class="fa-solid fa-eye"></i></a>
                            <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#approve<?php echo $row['borrowed_id']; ?>"><i class="fa-solid fa-square-check"></i></button>
                            <button type="button" class="btn bg-gradient-warning" data-toggle="modal" data-target="#return<?php echo $row['borrowed_id']; ?>"><i class="fa-solid fa-rotate-left"></i></button>
                            <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['borrowed_id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>

                    <?php include 'borrowed_book_approve.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Borrower name</th>
                        <th>Book name</th>
                        <th>Date borrowed</th>
                        <th>Date approved</th>
                        <th>Date to return</th>
                        <th>Fines</th>
                        <th>Date returned</th>
                        <th>Status</th>
                        <th>Tools</th>
                      </tr>
                  </tfoot>
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


 <?php //include 'book_add.php';  ?>
 <?php include 'footer.php'; ?>



