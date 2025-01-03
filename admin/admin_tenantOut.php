<?php
include("includes/session.php");
?>


<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'?>

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
        <?php include 'includes/topbar.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800" >Tenant-In Details</h1>

          <div class="card shadow-sm mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Contract ID</th>
                      <th>Name</th>
                      <th>Status of<br />Keyholder</th>
                      <th>Status of<br />Electricity Remote</th>
                      <th>Number of Bulbs</th>
                      <th>Status of<br />Bulbs</th>
                      <th>Status of<br />Paint</th>
                      <th>Status of<br />Windows</th>
                      <th>Status of<br />Toilet Sink</th>
                      <th>Status of<br />Washing Sink</th>
                      <th>Status of<br />Door Lock</th>
                      <th>Status of<br />Toilet Door Lock</th>
                      <th>Comments</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM tenant_out";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $c_id = $row['contract_id'];
                      $query = "SELECT * FROM contract WHERE contract_id = '$c_id'";
                      $result1 = mysqli_query($con, $query);
                      $row1 = mysqli_fetch_assoc($result1);
                      do {
                        $t_id = $row1['tenant_id'];
                        $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                        $result2 = mysqli_query($con, $query);
                        $row2 = mysqli_fetch_assoc($result2);
                        do {
                          $fname = $row2['fname'];
                          $lname = $row2['lname'];
                          $uname = $row2['u_name'];
                          $row2 = mysqli_fetch_assoc($result1);
                        } while ($row2);
                        $row1 = mysqli_fetch_assoc($result1);
                      } while ($row1);

                      echo '<tr>';
                      echo '<td>' . $c_id . '</td>';
                      echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                      echo '<td>' . $row['stat_keyholder'] . '</td>';
                      echo '<td>' . $row['stat_electricityRemote'] . '</td>';
                      echo '<td>' . $row['no_bulbs'] . '</td>';
                      echo '<td>' . $row['stat_bulbs'] . '</td>';
                      echo '<td>' . $row['stat_paint'] . '</td>';
                      echo '<td>' . $row['stat_Windows'] . '</td>';
                      echo '<td>' . $row['stat_toiletSink'] . '</td>';
                      echo '<td>' . $row['stat_washingSink'] . '</td>';
                      echo '<td>' . $row['stat_doorLock'] . '</td>';
                      echo '<td>' . $row['stat_toiletDoorLock'] . '</td>';
                      echo '<td>' . $row['comments'] . '</td>';
                      echo '<td>' . $row['date_reg'] . '</td>';
                      echo '</tr>';
                      $row = mysqli_fetch_assoc($result);
                    } while ($row);
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>
  
      </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <?php include 'includes/script.php'; ?>
  <?php include 'includes/DataTables.php'; ?>
</body>

</html>