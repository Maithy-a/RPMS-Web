<?php
include("includes/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

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
        <?php include 'includes/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->


          <!-- DataTable-->
          <div class="card shadow-sm mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">House</h1>
            </div>

            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <div class="alert alert-warning" role="alert">
                    <strong>Note:</strong> Please choose a house to change from the table below.
                  </div>

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          House ID:
                        </td>
                        <td><input type='text' class='form-control form-control-user' name='id'
                            value="<?php echo @$_GET['id']; ?>" readonly></td>
                      </tr>

                      <tr>
                        <td>
                          Status:
                        </td>
                        <td>
                          <input type='text' class='form-control form-control-user' name='stat' value="Empty" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user ' type='submit' name='submit' value='Edit'>
                        </td>
                    </form>
                    <tr>
                  </tbody>
                  <?php
                  if (isset($_POST["submit"])) {
                    $id = $_POST['id'];
                    $stat = $_POST["stat"];

                    $query = "SELECT * FROM contract WHERE house_id = '$id' ";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);
                    do {
                      $tid = $row['tenant_id'];

                      $row = mysqli_fetch_assoc($result);
                    } while ($row);


                    $sql1 = "UPDATE house SET status= '$stat' WHERE house_id = '$id'";
                    if (mysqli_query($con, $sql1)) {
                      $sql = "UPDATE contract SET status = 'Inactive' WHERE tenant_id = '$tid'";
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