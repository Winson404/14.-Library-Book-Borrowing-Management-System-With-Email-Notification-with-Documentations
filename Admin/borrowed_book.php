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
                        $sql2 = mysqli_query($conn, "SELECT * FROM book_list_borrow JOIN book_list ON book_list_borrow.book_id=book_list.book_id JOIN users ON book_list_borrow.stud_id=users.user_Id ORDER BY status");
                        while ($row2 = mysqli_fetch_array($sql2)) {
                      ?>
                      <tr>
                        <td><?php echo ' '.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].' '.$row2['suffix'].' '; ?></td>
                        <td><?php echo $row2['book_name']; ?></td>
                        <td class="text-center">
                          <?php if($row2['date_borrowed'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-warning"><?php echo $row2['date_borrowed']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row2['date_approved'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row2['date_approved']; ?></span>
                          <?php endif; ?>
                        </td>

                        <!-- Return Date-->
                        <td class="text-center">
                          <?php if($row2['date_approved'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: 
                            $date = $row2['date_approved'];
                            $dates = date('Y-m-d', strtotime($date. '+ 1 day'));
                            $time = '08:00:00';
                            $combinedDT = date('Y-m-d H:i:s', strtotime("$dates $time"));
                          ?>
                            <span class="badge bg-gradient-success"><?php echo $combinedDT; ?></span>
                          <?php endif; ?>
                        </td>

                         <!-- For fines-->
                         <td class="text-center">
                          <?php if($row2['date_returned'] == ''): 
                            $currentdate = date('Y-m-d H:i:s');
                            $date = $row2['date_approved'];
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
                          <?php if($row2['date_returned'] == ''): ?>
                            <span class="badge bg-gradient-dark">NA</span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row2['date_returned']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row2['status'] == 'Pending'): ?>
                            <span class="badge bg-gradient-danger"><?php echo $row2['status']; ?></span>
                          <?php elseif($row2['status'] == 'Returned'): ?>
                            <span class="badge bg-gradient-primary"><?php echo $row2['status']; ?></span>
                          <?php else: ?>
                            <span class="badge bg-gradient-success"><?php echo $row2['status']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td>
                            <a href="borrow-profile2.php?borrow_Id=<?php echo $row2['borrow_Id']; ?>" class="btn bg-gradient-primary btn-xs">View </a>
                            <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#approve2<?php echo $row2['borrow_Id']; ?>">Approve</button>
                            <button type="button" class="btn bg-gradient-warning btn-xs" data-toggle="modal" data-target="#return2<?php echo $row2['borrow_Id']; ?>">Return</button>
                            <button type="button" class="btn bg-gradient-danger btn-xs" data-toggle="modal" data-target="#delete2<?php echo $row2['borrow_Id']; ?>">Delete</button>
                        </td> 
                    </tr>

                    <?php include 'borrowed_booklist_delete.php'; } ?>

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



