<?php
include("includes/session.php");
include("../conn.php"); // db connection
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

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
          <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
              <h1 class="h4 text-gray-800">Tenant Management</h1>
            </div>
            <div class="card-body">

              <div class="alert alert-warning" role="alert">
                <strong>Note:</strong> Please select a tenant to edit their information from the table below.
              </div>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row g-3 mb-4">
                  <!-- House ID -->
                  <div class="col-md-6">
                    <label for="houseId" class="form-label">House ID</label>
                    <input type="text" id="houseId" name="id" class="form-control" 
                      value="<?php echo @$_GET['id']; ?>" readonly>
                  </div>

                  <!-- Status -->
                  <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="stat" class="form-select">
                      <option value="0">Payment Pending</option>
                      <option value="1">Account Active</option>
                      <option value="2">Contact the System Administrator</option>
                      <option value="3">Contract has Expired</option>
                    </select>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                  <button type="submit" name="submit" class="btn btn-success">Update Status</button>
                </div>
              </form>

              <?php
              if (isset($_POST["submit"])) {
                $id = mysqli_real_escape_string($con, $_POST['id']);
                $stat = mysqli_real_escape_string($con, $_POST["stat"]);

                $sql1 = "UPDATE tenant SET status= '$stat' WHERE tenant_id = '$id'";
                if (mysqli_query($con, $sql1)) {
                  echo "<script>
                          toastr.success('Tenant status updated successfully!', 'Success');
                          setTimeout(function() { window.location.href = 'tenant_detail.php'; }, 2000);
                        </script>";
                } else {
                  echo "<script>
                          toastr.error('Error updating tenant status. Please try again.', 'Error');
                        </script>";
                }
              }
              ?>

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
