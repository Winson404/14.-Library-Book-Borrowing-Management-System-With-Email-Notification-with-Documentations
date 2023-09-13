<title>Library Catalog | Course</title>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<?php include 'navbar.php'; 
$con = mysqli_connect("localhost","root","","library_catalog");

if (isset($_POST['submit']))
  {
    $course = $_POST['course'];
    $trn_date = date("Y-m-d H:i:s");

    $query = "INSERT into `courses` (course, adlaw) VALUES ('$course','$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo("<script>window.location = 'course.php';</script>");
        }
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">
          <form action="" method="POST">
           
            <div class="form-check col-lg-3 style="padding-right:50px">
              <input type="text" class="form-check-input" id="exampleCheck1" name="course">
              <label class="form-check-label" for="exampleCheck1"></label>
              </div>
              <br><br><center>
            <button type="submit" class="btn btn-primary" name="submit">Add Course</button>
            </center>
          
          </form>

        </div>
      </div>
    </section>
<center><table class="table col-lg-6">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course</th>
      <th scope="col">Date Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $count=1;
    $sel_query="SELECT * from courses ORDER BY id asc";
    $result = mysqli_query($con,$sel_query);
    while($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["course"]; ?></td>
    <td align="center"><?php echo $row["adlaw"]; ?></td>
    <td align="center"><button class="btn-danger"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></button></td>
  </tr>
<?php $count++; } ?>
  </tbody>
</table>
</center>

</div>
