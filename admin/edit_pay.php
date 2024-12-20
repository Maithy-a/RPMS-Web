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

          <h1 class="h3 mb-2 text-gray-800">Edit Payment.</h1>
          <p style="color:red;"><b>Please choose a particular payment to change from the table below showing payment
              information.</b></p>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          Payment ID:
                        </td>
                        <td><input type='text' class='form-control form-control-user' style="width:300px;" name='id'
                            value="<?php echo @$_GET['id']; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td>
                          Payment From:
                        </td>
                        <td>
                          <select class="custom-select" name="from" id="terms" style="width:300px;">
                            <option value="January <?php echo date('Y'); ?>">January <?php echo date('Y'); ?></option>
                            <option value="February <?php echo date('Y'); ?>">February <?php echo date('Y'); ?></option>
                            <option value="March <?php echo date('Y'); ?>">March <?php echo date('Y'); ?></option>
                            <option value="April <?php echo date('Y'); ?>">April <?php echo date('Y'); ?></option>
                            <option value="May <?php echo date('Y'); ?>">May <?php echo date('Y'); ?></option>
                            <option value="June <?php echo date('Y'); ?>">June <?php echo date('Y'); ?></option>
                            <option value="July <?php echo date('Y'); ?>">July <?php echo date('Y'); ?></option>
                            <option value="August <?php echo date('Y'); ?>">August <?php echo date('Y'); ?></option>
                            <option value="September <?php echo date('Y'); ?>">September <?php echo date('Y'); ?>
                            </option>
                            <option value="October <?php echo date('Y'); ?>">October <?php echo date('Y'); ?></option>
                            <option value="November <?php echo date('Y'); ?>">November <?php echo date('Y'); ?></option>
                            <option value="December <?php echo date('Y'); ?>">December <?php echo date('Y'); ?></option>
                            <option value="January <?php echo date('Y') + 1; ?>">January <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="February <?php echo date('Y') + 1; ?>">February <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="March <?php echo date('Y') + 1; ?>">March <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="April <?php echo date('Y') + 1; ?>">April <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="May <?php echo date('Y') + 1; ?>">May <?php echo date('Y') + 1; ?></option>
                            <option value="June <?php echo date('Y') + 1; ?>">June <?php echo date('Y') + 1; ?></option>
                            <option value="July <?php echo date('Y') + 1; ?>">July <?php echo date('Y') + 1; ?></option>
                            <option value="August <?php echo date('Y') + 1; ?>">August <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="September <?php echo date('Y') + 1; ?>">September
                              <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="October <?php echo date('Y') + 1; ?>">October <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="November <?php echo date('Y') + 1; ?>">November <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="December <?php echo date('Y') + 1; ?>">December <?php echo date('Y') + 1; ?>
                            </option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          To:
                        </td>
                        <td>
                          <select class="custom-select" name="to" id="terms" style="width:300px;">
                            <option value="January <?php echo date('Y'); ?>">January <?php echo date('Y'); ?></option>
                            <option value="February <?php echo date('Y'); ?>">February <?php echo date('Y'); ?></option>
                            <option value="March <?php echo date('Y'); ?>">March <?php echo date('Y'); ?></option>
                            <option value="April <?php echo date('Y'); ?>">April <?php echo date('Y'); ?></option>
                            <option value="May <?php echo date('Y'); ?>">May <?php echo date('Y'); ?></option>
                            <option value="June <?php echo date('Y'); ?>">June <?php echo date('Y'); ?></option>
                            <option value="July <?php echo date('Y'); ?>">July <?php echo date('Y'); ?></option>
                            <option value="August <?php echo date('Y'); ?>">August <?php echo date('Y'); ?></option>
                            <option value="September <?php echo date('Y'); ?>">September <?php echo date('Y'); ?>
                            </option>
                            <option value="October <?php echo date('Y'); ?>">October <?php echo date('Y'); ?></option>
                            <option value="November <?php echo date('Y'); ?>">November <?php echo date('Y'); ?></option>
                            <option value="December <?php echo date('Y'); ?>">December <?php echo date('Y'); ?></option>
                            <option value="January <?php echo date('Y') + 1; ?>">January <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="February <?php echo date('Y') + 1; ?>">February <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="March <?php echo date('Y') + 1; ?>">March <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="April <?php echo date('Y') + 1; ?>">April <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="May <?php echo date('Y') + 1; ?>">May <?php echo date('Y') + 1; ?></option>
                            <option value="June <?php echo date('Y') + 1; ?>">June <?php echo date('Y') + 1; ?></option>
                            <option value="July <?php echo date('Y') + 1; ?>">July <?php echo date('Y') + 1; ?></option>
                            <option value="August <?php echo date('Y') + 1; ?>">August <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="September <?php echo date('Y') + 1; ?>">September
                              <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="October <?php echo date('Y') + 1; ?>">October <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="November <?php echo date('Y') + 1; ?>">November <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="December <?php echo date('Y') + 1; ?>">December <?php echo date('Y') + 1; ?>
                            </option>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user' style="width:300px;" type='submit'
                            name='submit' value='Submit'>
                        </td>
                    </form>
                    </tr>
                    
                    <?php
                    if (isset($_POST['submit'])) {
                      $id = $_POST['id'];
                      $from = $_POST['from'];
                      $to = $_POST['to'];

                      $sql1 = "UPDATE payment SET pay_from= '$from', pay_to= '$to' WHERE payment_id = '$id'";
                      if (mysqli_query($con, $sql1)) {
                        echo "<script>toastr.success('House deleted successfully!', 'Success');</script>";
                        echo "<script>toastr.error('Failed to delete house.', 'Error');</script>";
                        echo "<script>toastr.warning('Invalid ID.', 'Warning');</script>";
                        exit;
                      }
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