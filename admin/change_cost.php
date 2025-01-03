<!DOCTYPE html>
<html lang="en">
<?php
include("includes/session.php");
include("../conn.php");
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
            <div class="card-header py-3">
              <h1 class="h4 text-gray-800">Add New House</h1>
            </div>
            <div class="card-body">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row g-3 mb-3">
                  <!-- House Name -->
                  <div class="col-md-6">
                    <label for="houseName" class="form-label">House Name</label>
                    <input type="text" id="houseName" name="name" class="form-control" placeholder="Enter house name"
                      required>
                  </div>

                  <!-- Compartment -->
                  <div class="col-md-6">
                    <label for="compartment" class="form-label">Compartment</label>
                    <select id="compartment" name="compartment" class="form-select" required>
                      <option value="" disabled selected>Select compartment availability</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <!-- Cost of the House -->
                  <div class="col-md-6">
                    <label for="cost" class="form-label">Monthly Rent (Ksh)</label>
                    <select id="cost" name="cost" class="form-select" required>
                      <option value="" disabled selected>Select rent amount</option>
                      <option value="50000">50,000</option>
                      <option value="60000">60,000</option>
                      <option value="70000">70,000</option>
                      <option value="80000">80,000</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" name="submit" class="btn btn-outline-success">Add House</button>
                </div>
              </form>
            </div>
          </div>

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
                      toastr.success('The house has been added successfully!', 'Success');
                      setTimeout(function() { window.location.href = 'house_detail.php'; }, 2000);
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