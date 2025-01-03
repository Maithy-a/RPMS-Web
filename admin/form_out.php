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
          <h1 class="h3 mb-2 text-gray-800">Tenant-Out Form.</h1>
          <p style="color:red;"><b><b>Please fill the required information upon tenant leaving the House.</b></b></p>

          <div class="card shadow-sm mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          Search for a tenant:
                        </td>
                        <td>
                          <select class="custom-select" name="tenant" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <?php
                            $query = "SELECT * FROM contract WHERE status = 'Inactive'";
                            $result = mysqli_query($con, $query);
                            $row1 = mysqli_fetch_assoc($result);
                            do {
                              $tenant_id = $row1['tenant_id'];
                              $query2 = "SELECT * FROM tenant WHERE tenant_id = '$tenant_id'";
                              $result1 = mysqli_query($con, $query2);
                              $row = mysqli_fetch_assoc($result1);
                              do {
                                $id = $row['tenant_id'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $uname = $row['u_name'];
                                echo "<option value = '" . $id . "'>" . $fname . " " . $lname . " (" . $uname . ")" . "</option>";
                                $row = mysqli_fetch_assoc($result1);
                              } while ($row);

                              $row1 = mysqli_fetch_assoc($result);
                            } while ($row1);

                            ?>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          Condition of the Key and its Holder:
                        </td>
                        <td>
                          <select class="custom-select" name="key" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="No key holder">No key holder</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Electricity Remote:
                        </td>
                        <td>
                          <select class="custom-select" name="remote" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="No remote">No remote</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Number of bulbs:
                        </td>
                        <td>
                          <select class="custom-select" name="nbulb" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="0">0</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Bulbs:
                        </td>
                        <td>
                          <select class="custom-select" name="bulb" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Some missing">Some missing</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the paint on the wall:
                        </td>
                        <td>
                          <select class="custom-select" name="paint" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Windows:
                        </td>
                        <td>
                          <select class="custom-select" name="window" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Some broken or missing">Some broken or missing</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Toilet Sink:
                        </td>
                        <td>
                          <select class="custom-select" name="tsink" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Normal Sink:
                        </td>
                        <td>
                          <select class="custom-select" name="wsink" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Door Lock:
                        </td>
                        <td>
                          <select class="custom-select" name="lock" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Toilet's Door Lock:
                        </td>
                        <td>
                          <select class="custom-select" name="tlock" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span style="color:red;"><b><b>Please outline in details the concerns pertaining the above
                                items.</b></b></span>
                          <br />Comments:
                        </td>
                        <td>
                          <textarea class='form-control' name="msg" required><?php echo @$msg; ?></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user ' type='submit' name='submit' value='Submit'>
                        </td>
                    </form>
                    <tr>
                      <?php
                      if (isset($_POST['submit'])) {
                        $id = $_POST['tenant'];
                        $query1 = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Inactive'";
                        $result2 = mysqli_query($con, $query1);
                        $row1 = mysqli_fetch_assoc($result2);
                        do {
                          $cid = $row1['contract_id'];
                          $row1 = mysqli_fetch_assoc($result2);
                        } while ($row1);
                        $h_key = $_POST['key'];
                        $remote = $_POST['remote'];
                        $nbulb = $_POST['nbulb'];
                        $bulb = $_POST['bulb'];
                        $paint = $_POST['paint'];
                        $window = $_POST['window'];
                        $tsink = $_POST['tsink'];
                        $wsink = $_POST['wsink'];
                        $lock = $_POST['lock'];
                        $tlock = $_POST['tlock'];

                        $msg = check($_POST['msg']);
                        $date = date('Y-m-d');


                        $query3 = "SELECT * FROM tenant_in WHERE contract_id = '$cid'";
                        $rs = mysqli_query($con, $query3);
                        if (mysqli_num_rows($rs) == 0) {

                          $sql = "INSERT INTO tenant_out(`out_id`, `contract_id`, `stat_keyholder`, `stat_electricityRemote`, `no_bulbs`, `stat_bulbs`, `stat_paint`, `stat_Windows`, `stat_toiletSink`, `stat_washingSink`, `stat_doorLock`, `stat_toiletDoorLock`, `comments`, `date_reg`)
                         VALUES (' ','$cid','$h_key','$remote','$nbulb','$bulb','$paint','$window','$tsink','$wsink','$lock','$tlock','$msg','$date')";
                          mysqli_query($con, $sql);
                          mysqli_close($con);
                          echo "<script type='text/javascript'>alert('Your form has been submitted successfully');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "admin_home.php";</script>';
                        } else {
                          echo "<script type='text/javascript'>alert('You have already filled the form. Thank You.');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "admin_home.php";</script>';
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



  <?php include 'includes\script.php'; ?>

</body>

</html>