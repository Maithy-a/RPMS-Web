<!DOCTYPE html>
<html lang="en">
<?php
include("includes/session.php");
include("../conn.php"); // Database connection 
?>
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
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Add House</h1>
            </div>
            <div class="card-body">

              <div class="alert alert-warning" role="alert">
                <strong>Note:</strong> Please choose a tenant to change the contract information.
              </div>

              <div class="table-responsive">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <table class="table table-borderless" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>House Name:</td>
                        <td><input type="text" class="form-control form-control-user" placeholder="Example: A1,B1,C1,B3"
                            name="name" required></td>
                      </tr>
                      <tr>
                        <td>Is there a compartment?</td>
                        <td>
                          <select class="form-control custom-select" name="compartment" required>
                            <option value="" disabled selected>Select Compartment</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Cost of the House:</td>
                        <td>
                          <select class="custom-select form-control-user" name="cost" required>
                            <option value="" disabled selected>Select rent amount</option>
                            <option value="50000">Ksh. 50,000/=</option>
                            <option value="60000">Ksh. 60,000/=</option>
                            <option value="70000">Ksh. 70,000/=</option>
                            <option value="80000">Ksh. 80,000/=</option>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td><input class="btn btn-outline-success btn-user" type="submit" name="submit"
                            value="Add the House"></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
                <?php
                if (isset($_POST["submit"])) {
                  // Collect input data
                  $house_name = mysqli_real_escape_string($con, $_POST['name']);
                  $compartment = mysqli_real_escape_string($con, $_POST["compartment"]);
                  $cost = mysqli_real_escape_string($con, $_POST['cost']);
                  $status = "Empty"; // Default status
                
                  // Insert data into the database
                  $sql = "INSERT INTO house (house_name, compartment, rent_per_month, status) 
                          VALUES ('$house_name', '$compartment', '$cost', '$status')";

                  if (mysqli_query($con, $sql)) {
                    echo "<script>
                            toastr.success('The house has been added successfully, see house details to confirm!', 'Success');
                            setTimeout(function() { window.location.href = 'add_house.php'; }, 2000);
                          </script>";
                  } else {
                    echo "<script>
                            toastr.error('Error: Unable to add house. Please try again.', 'Error');
                          </script>";
                  }

                  mysqli_close($con);
                }
                ?>
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