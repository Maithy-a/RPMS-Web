<!DOCTYPE html>
<html lang="en">
<?php
include("includes/session.php");
?>
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

          <!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Add House</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" cellspacing="0">
                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          House Name:
                        </td>
                        <td><input type='text' class='form-control form-control-user' style="width:300px;" name='name'
                            required></td>
                      </tr>

                      <tr>
                        <td>
                          Is there a compartment?
                        </td>
                        <td>
                          <select class="custom-select" name="compartment" id="terms" style="width:300px;" required>
                            <option value="Yes" id="1">Yes</option>
                            <option value="No" id="2">No</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Cost of the House:
                        </td>
                        <td>
                          <select class="custom-select" name="cost" id="terms" style="width:300px;" required>
                            <option value="50000" id="1"> Ksh. 50,000/=</option>
                            <option value="60000" id="2">Ksh. 60,000/=</option>
                            <option value="70000" id="4">Ksh. 70,000/=</option>
                            <option value="80000" id="4">Ksh. 80,000/=</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user ' style="width:300px;" type='submit'
                            name='submit' value='Add the House'></td>
                    </form>
                    <tr>
                  </tbody>
                  <?php
                  if (isset($_POST["submit"])) {
                    $house = $_POST['name'];
                    $compartment = $_POST["compartment"];
                    $cost = $_POST['cost'];
                    $status = "Empty";
                    $sql = "INSERT INTO house VALUES (' ','$house','$compartment','$cost','$status')";
                    mysqli_query($con, $sql);
                    mysqli_close($con);
                    echo "<script>toastr.success('The house has been added successfully!', 'Success');</script>";
                    echo '<style>body{display:none;}</style>';
                    echo '<script>window.location.href = "house_detail.php";</script>';
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