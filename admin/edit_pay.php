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

          <div class="card shadow-sm mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Edit Payment.</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <div class="alert alert-warning" role="alert">
                      <strong>Note:</strong> Please choose a particular payment to change from the table below showing
                      payment
                      information.
                    </div>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateForm()">
                      <tr>
                      <td>
                        Payment ID:
                      </td>
                      <td>
                        <input type='text' class='form-control form-control-user' name='id' required
                        value="<?php echo @$_GET['id']; ?>" readonly>
                        </td>
                      </tr>
                      <tr>
                      <td>
                        Payment From:
                      </td>
                      <td>
                        <input type="date" class="form-control form-control-user" name="from" required
                        placeholder="YYYY-MM-DD" value="">
                      </td>
                      </tr>
                      <tr>
                      <td>
                        To:
                      </td>
                      <td>
                        <input type="date" class="form-control form-control-user" name="to" required placeholder="YYYY-MM-DD"
                        value="">
                      </td>
                      </tr>

                      <tr>
                      <td></td>
                      <td><input class='btn btn-outline-success btn-user' type='submit' name='submit' value='Submit'>
                      </td>
                    </form>

                    <script>
                      function validateForm() {
                      var from = document.forms[0]["from"].value;
                      var to = document.forms[0]["to"].value;
                      if (from == "" || to == "") {
                        toastr.error("Both 'Payment From' and 'To' fields must be filled out", "Error");
                        return false;
                      }
                      return true;
                      }
                    </script>

                    </tr>

                    <?php
                    if (isset($_POST['submit'])) {
                      $id = $_POST['id'];
                      $from = $_POST['from'];
                      $to = $_POST['to'];

                      $sql1 = "UPDATE payment SET pay_from= '$from', pay_to= '$to' WHERE payment_id = '$id'";
                      if (mysqli_query($con, $sql1)) {
                        echo "<script>toastr.success('Payment updated successfully!', 'Success');</script>";
                      } else {
                        echo "<script>toastr.error('Failed to update payment.', 'Error');</script>";
                      }
                      exit;
                    }
                    ?>

                  </tbody>
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