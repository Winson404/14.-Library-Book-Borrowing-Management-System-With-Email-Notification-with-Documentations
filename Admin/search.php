<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mt-5">
      <div class="container-fluid">
        <h2 class="text-center">
            <img src="../images/slsu.png" alt="" width="250">
        </h2>
        <h2 class="text-center display-2" style="font-weight: bold;">
            <a href="">
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
        </div>
    </section>
  </div>

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