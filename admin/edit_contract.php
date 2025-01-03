<?php
include("includes/session.php");
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
              <h1 class="h4 text-gray-800">Edit Contract</h1>
            </div>
            <div class="card-body">

              <!-- Alert -->
              <div class="alert alert-warning" role="alert">
                <strong>Note:</strong> Please select a contract to edit from the table below.
              </div>

              <!-- Form -->
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row g-3">
                  
                  <!-- Tenant ID -->
                  <div class="col-md-6">
                    <label for="tenantId" class="form-label">Tenant ID</label>
                    <input type="text" id="tenantId" name="id" class="form-control" 
                      value="<?php echo @$_GET['id']; ?>" readonly required >
                  </div>

                  <!-- House Price Dropdown -->
                  <div class="col-md-6">
                    <label for="housePrice" class="form-label">Select House Price</label>
                    <select id="housePrice" name="price" class="form-select" required>
                      <option value="" disabled selected>Select Price</option>
                      <option value="50000">Ksh. 50,000</option>
                      <option value="60000">Ksh. 60,000</option>
                      <option value="70000">Ksh. 70,000</option>
                      <option value="80000">Ksh. 80,000</option>
                    </select>
                  </div>

                  <!-- House Selection -->
                  <div class="col-md-6">
                    <label for="houseSelect" class="form-label">House Selection</label>
                    <select id="houseSelect" name="house" class="form-select" required>
                      <!-- Dynamic options should be loaded here -->
                    </select>
                  </div>

                  <!-- Contract Duration -->
                  <div class="col-md-6">
                    <label for="durationSelect" class="form-label">Contract Duration</label>
                    <select id="durationSelect" name="duration" class="form-select" required>
                      <option value="3">3 months</option>
                      <option value="6">6 months</option>
                      <option value="12">12 months</option>
                    </select>
                  </div>

                  <!-- Payment Terms -->
                  <div class="col-md-6">
                    <label for="termsSelect" class="form-label">Payment Terms</label>
                    <select id="termsSelect" name="term" class="form-select">
                      <option value="1">1 term</option>
                      <option value="2">2 terms</option>
                      <option value="4">4 terms</option>
                    </select>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-4 text-end">
                  <button type="submit" name="submit" class="btn btn-success">Update Contract</button>
                </div>
              </form>

              <?php
              if (isset($_POST["submit"])) {
                $id = mysqli_real_escape_string($con, $_POST['id']);
                $house = (int) $_POST["house"];
                $dur = (int) $_POST['duration'];
                $term = (int) $_POST['term'];
                $price = (int) $_POST['price'];
                $stat = "Active";
                $total_rent = $dur * $price;
                $rent_term = $total_rent / $term;
                $date_sign = date("Y-m-d H:i:s");
                $contract = 'Occupied';

                $end = date('Y-m-t', strtotime('+' . ($dur - 1) . ' month'));
                $start = date('Y-m-01', strtotime((date('d') >= 27 ? '+1 month' : 'now')));

                $query = "UPDATE contract SET 
                  house_id = '$house', 
                  duration_month = '$dur', 
                  total_rent = '$total_rent', 
                  terms = '$term', 
                  rent_per_term = '$rent_term', 
                  start_day = '$start', 
                  end_day = '$end', 
                  date_contract_sign = '$date_sign' 
                  WHERE tenant_id = '$id' AND status = '$stat'";
                
                if (mysqli_query($con, $query)) {
                  mysqli_query($con, "UPDATE house SET status = 'Empty' WHERE house_id = (SELECT house_id FROM contract WHERE tenant_id = '$id')");
                  mysqli_query($con, "UPDATE house SET status = '$contract' WHERE house_id = '$house'");
                  echo "<script>
                          toastr.success('Contract updated successfully!', 'Success');
                          setTimeout(function() { window.location.href = 'contract_detail.php'; }, 2000);
                        </script>";
                } else {
                  echo "<script>
                          toastr.error('Error updating contract. Please try again.', 'Error');
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

  <?php include 'includes/script.php'; ?>

</body>
</html>
