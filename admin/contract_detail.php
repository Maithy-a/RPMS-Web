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
              <h1 class="h3 mb-2 text-gray-800">Contracts</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Contract ID</th>
                      <th>Name</th>
                      <th>House Name</th>
                      <th>Duration of Occupation in months</th>
                      <th>Total Rent(Ksh.)</th>
                      <th>Terms of Payment</th>
                      <th>Rent per Term(Ksh.)</th>
                      <th>Beginning of Contract</th>
                      <th>End of Contract</th>
                      <th>Date of signing the Contract</th>
                      <th>Contract Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT * FROM contract";
                    $result = mysqli_query($con, $sql);

                    // Check if the query returns rows
                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $t_id = $row['tenant_id'] ?? null;
                        $c_id = $row['contract_id'] ?? null;

                        // Get tenant details
                        $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                        $result1 = mysqli_query($con, $query);
                        $row1 = mysqli_fetch_assoc($result1);
                        $fname = $row1['fname'] ?? 'N/A';
                        $lname = $row1['lname'] ?? 'N/A';
                        $uname = $row1['u_name'] ?? 'N/A';

                        // Get house details
                        $h_id = $row['house_id'] ?? null;
                        $query1 = "SELECT * FROM house WHERE house_id = '$h_id'";
                        $result2 = mysqli_query($con, $query1);
                        $row2 = mysqli_fetch_assoc($result2);
                        $hname = $row2['house_name'] ?? 'N/A';

                        // Extract and validate other fields
                        $dur = $row['duration_month'] ?? 0;
                        $total = $row['total_rent'] ?? 0;
                        $term = $row['terms'] ?? 'N/A';
                        $per = $row['rent_per_term'] ?? 0;
                        $start = $row['start_day'] ?? 'N/A';
                        $end = $row['end_day'] ?? 'N/A';
                        $sign = $row['date_contract_sign'] ?? 'N/A';
                        $stat = $row['status'] ?? 'N/A';
                        $cid = $row['contract_id'] ?? 'N/A';

                        // Output rows
                        echo '<tr>';
                        echo '<td>' . $cid . '</td>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $hname . '</td>';
                        echo '<td>' . $dur . '</td>';
                        echo '<td>' . number_format($total) . '/=</td>';
                        echo '<td>' . $term . '</td>';
                        echo '<td>' . number_format($per) . '/=</td>';
                        echo '<td>' . $start . '</td>';
                        echo '<td>' . $end . '</td>';
                        echo '<td>' . $sign . '</td>';
                        echo "<td style='color:" . ($stat === 'Active' ? 'green' : 'red') . ";'>" . $stat . "</td>";

                        if ($stat === 'Active') {
                          echo "<td align='center'><a href='delete_contract.php?id=" . $cid . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;<a href='edit_contract.php?id=" . $t_id . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        } else {
                          echo "<td align='center'><a href='delete_contract.php?id=" . $cid . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></td>";
                        }
                        echo '</tr>';
                      }
                    } else {
                      echo '<tr><td colspan="12">No contracts found.</td></tr>';
                    }
                    ?>

                  </tbody>
                </table>

                <hr>
                <br/>
                
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
                    <?php
                    $sql = "SELECT SUM(total_rent) FROM contract";
                    $query = mysqli_query($con, $sql);
                    $res = mysqli_fetch_assoc($query);

                    do {
                      $total = $res['SUM(total_rent)'] ?? 0;
                      $res = mysqli_fetch_assoc($query);
                    } while ($res);

                    // Output the expected income row
                    echo '<tr>';
                    echo '<td>EXPECTED INCOME</td>';
                    echo "<td><span style='color:orange;'>Ksh. " . number_format($total) . "/=</span></td>";
                    echo '</tr>';

                    $sql1 = "SELECT * FROM contract WHERE status = 'Active'";
                    $result1 = mysqli_query($con, $sql1);
                    echo '<tr>';
                    echo "<td>TOTAL NUMBER OF <span style = 'color:green;'>ACTIVE</span> CONTRACTS</td>";
                    echo "<td><span style = 'color:green;'>" . mysqli_num_rows($result1) . "</span></td>";
                    echo '</tr>';

                    $sql2 = "SELECT * FROM contract WHERE status = 'Inactive'";
                    $result2 = mysqli_query($con, $sql2);
                    echo '<tr>';
                    echo "<td>TOTAL NUMBER OF <span style = 'color:red;'>INACTIVE</span> CONTRACTS</td>";
                    echo "<td><span style = 'color:red;'>" . mysqli_num_rows($result2) . "</span></td>";
                    echo '</tr>';


                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- End of Main Content -->
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

  <?php include 'includes/script.php'; ?>
  <?php include 'includes/DataTables.php'; ?>

</body>

</html>