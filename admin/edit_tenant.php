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
        <?php include 'includes/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <p style="color:red;"><b><b>Please choose a tenant to change his or her info from the table showing tenant
                information.</b></b></p>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Tenant</h1>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          House ID:
                        </td>
                        <td><input type='text' class='form-control form-control-user' name='id'
                            value="<?php echo @$_GET['id']; ?>" readonly style="width:300px;"></td>
                      </tr>

                      <tr>
                        <td>
                          Status:
                        </td>
                        <td>
                          <select class="custom-select" name="stat" style="width:300px;">
                            <option value="0">Payment Pending.</option>
                            <option value="1">Account Active.</option>
                            <option value="2">Contact the System Administrator.</option>
                            <option value="3">Contract has Expired.</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user ' type='submit' name='submit' value='Edit'
                            style="width:300px;">
                        </td>
                    </form>
                    <tr>
                  </tbody>
                  <?php
                  if (isset($_POST["submit"])) {
                    $id = $_POST['id'];
                    $stat = $_POST["stat"];

                    $sql1 = "UPDATE tenant SET status= '$stat' WHERE tenant_id = '$id'";
                    if (mysqli_query($con, $sql1)) {
                      echo "<script  toastr.success('Updated Successfully!!', 'Success');</script>";
                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "tenant_detail.php";</script>';
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




  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <?php include 'includes/script.php'; ?>
</body>

</html>