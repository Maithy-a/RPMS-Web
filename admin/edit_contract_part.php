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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Contracts</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          <b><b>Please choose a tenant to change the contract information.</b></b>:
                        </td>
                        <td><select class='custom-select' name='tenant' id='values'>

                          </select>
                        <td>
                      </tr>
                      <tr>
                        <td>
                          Contract Duration:
                        </td>
                        <td>
                          <select class="custom-select" name="duration">
                            <option value="3">3 months</option>
                            <option value="6">6 months</option>
                            <option value="12">12 months</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Payment Terms:
                        </td>
                        <td>
                          <select class="custom-select" name="term" id="terms" >
                            <option value="1" id="1">1 term</option>
                            <option value="2" id="2">2 terms</option>
                            <option value="4" id="4">4 terms</option>
                          </select>
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
                    $house = (int) $_POST["house"];
                    $dur = (int) $_POST['duration'];
                    $dur1 = $dur - 1;
                    $term = (int) $_POST['term'];
                    $price = (int) $_POST['price'];
                    $stat = "Active";
                    $total_rent = $dur * $price;
                    $rent_term = $total_rent / $term;
                    $date_sign = date("Y-m-d H:i:s");
                    $contract = 'Occupied';
                    if (date('d') < 27) {
                      $end = date('Y-m-t', strtotime('+' . $dur1 . ' month'));
                    } else {
                      $end = date('Y-m-t', strtotime('+' . $dur1 . ' month'));
                    }
                    if ((date('d') < 27)) {
                      $start = date('Y-m-01');
                    } else {
                      $start = date('Y-m-01', strtotime('+1 month'));
                    }


                    $query = "SELECT * FROM contract WHERE tenant_id = '$id' ";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);
                    do {
                      $hid = $row['house_id'];

                      $row = mysqli_fetch_assoc($result);
                    } while ($row);

                    if ($id != "") {
                      if ($dur == 3) {
                        if (!($term == 1)) {
                          echo "<script> alert('3 months cannot have more than 1 term.');</script>";
                        } else {
                          $sql = "UPDATE contract SET house_id = '$house', duration_month = '$dur', total_rent = '$total_rent', terms = '$term', rent_per_term = '$rent_term', start_day = '$start', end_day ='$end', date_contract_sign = '$date_sign' WHERE tenant_id = '$id' AND status = '$stat'";
                          if (mysqli_query($con, $sql)) {
                            $sql1 = "UPDATE house SET status= 'Empty' WHERE house_id = '$hid'";
                            mysqli_query($con, $sql1);
                            $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
                            mysqli_query($con, $sql3);
                            mysqli_close($con);
                            echo "<script >toastr.success('Updated Successfully!!!','Success');</script>";
                            echo '<style>body{display:none;}</style>';
                            echo '<script>window.location.href = "contract_detail.php";</script>';
                            exit;
                          }
                        }
                      } elseif ($dur == 6) {
                        if ($term == 4) {
                          echo "<script >toastr.error('6 months cannot have more than 2 term.','Error');</script>";
                        } else {
                          $sql = "UPDATE contract SET house_id = '$house', duration_month = '$dur', total_rent = '$total_rent', terms = '$term', rent_per_term = '$rent_term', start_day = '$start', end_day ='$end', date_contract_sign = '$date_sign' WHERE tenant_id = '$id' AND status = '$stat'";
                          if (mysqli_query($con, $sql)) {
                            $sql1 = "UPDATE house SET status= 'Empty' WHERE house_id = '$hid'";
                            mysqli_query($con, $sql1);
                            $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
                            mysqli_query($con, $sql3);
                            mysqli_close($con);
                            echo "<script>toastr.success('Updated Successfully!', 'Success');</script>";
                            echo '<style>body{display:none;}</style>';
                            echo '<script>window.location.href = "contract_detail.php";</script>';
                            exit;
                          }
                        }
                      } elseif ($dur == 12) {
                        $sql = "UPDATE contract SET house_id = '$house', duration_month = '$dur', total_rent = '$total_rent', terms = '$term', rent_per_term = '$rent_term', start_day = '$start', end_day ='$end', date_contract_sign = '$date_sign' WHERE tenant_id = '$id' AND status = '$stat'";
                        if (mysqli_query($con, $sql)) {
                          $sql1 = "UPDATE house SET status= 'Empty' WHERE house_id = '$hid'";
                          mysqli_query($con, $sql1);
                          $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
                          mysqli_query($con, $sql3);
                          mysqli_close($con);
                          echo "<script>toastr.success('Updated Successfully!', 'Success');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "contract_detail.php";</script>';
                          exit;
                        }
                      }
                    } else {
                      echo "<script>toastr.error('Please choose a contract to change from the table showing contract information.', 'Error');</script>";
                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "contract_detail.php";</script>';
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


  <script type="text/javascript">
    $(document).ready(function () {

      var out = "<?php
      $sql = "SELECT * FROM contract WHERE status = 'Active'";
      $query = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($query);
      do {
        $id = $row['tenant_id'];
        $sql1 = "SELECT * FROM tenant WHERE tenant_id = '$id'";
        $query1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($query1);
        do {
          $fanme = $row1['fname'];
          $lname = $row1['lname'];
          $row1 = mysqli_fetch_assoc($query1);
        } while ($row1);
        echo "<option value ='" . $id . "' selected>" . $fname . " " . $lname . "</option>";
        $row = mysqli_fetch_assoc($query);
      } while ($row);


      ?>";
    document.getElementById("values").innerHTML = out;



       });
  </script>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>


<?php include "includes/script.php";?>
<?php include "includes/DataTables.php";?>
</body>

</html>