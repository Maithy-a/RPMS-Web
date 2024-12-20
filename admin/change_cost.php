<?php
include("includes/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
      <?php include 'includes/topbar.php';?>
      <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Houses</h1>

          <!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          Previous Cost: Eg; 50000 <span style="color:red;"><b><b>(No commas nor spaces)</b></b></span>
                        </td>
                        <td>Ksh. <input type='text' class='form-control form-control-user' name='prev' required></td>
                      </tr>

                      <tr>
                        <td>
                          New Cost: Eg; 50000 <span style="color:red;"><b><b>(No commas nor spaces)</b></b></span>
                        </td>
                        <td>
                          Ksh. <input type='text' class='form-control form-control-user' name='new' required>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user ' type='submit' name='submit' value='Change'>
                        </td>
                    </form>
                    <tr>
                  </tbody>
                  <?php
                  if (isset($_POST["submit"])) {
                    $prev = $_POST['prev'];
                    $new = $_POST["new"];
                    if (!is_numeric($prev) || !is_numeric($new)) {
                      echo "<script type='text/javascript'>alert('The input shold be in numbers.');</script>";
                    } else {
                      $sql = "UPDATE house SET rent_per_month= '$new' WHERE rent_per_month = '$prev'";
                      mysqli_query($con, $sql);
                      mysqli_close($con);
                      echo "<script type='text/javascript'>alert('Updated Successfully!!!');</script>";
                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "house_detail.php";</script>';
                      exit;
                    }



                  }
                  ?>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'includes/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <?php include 'includes/script.php'; ?>

</body>

</html>