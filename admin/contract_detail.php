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
        <?php include 'includes/topbar.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          

          <div class="card shadow mb-4">
<div class="card-header"><h1 class="h3 mb-2 text-gray-800">Contracts</h1></div>
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
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $t_id = $row['tenant_id'];
                      $c_id = $row['contract_id'];
                      $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                      $result1 = mysqli_query($con, $query);
                      $row1 = mysqli_fetch_assoc($result1);
                      do {
                        $fname = $row1['fname'];
                        $lname = $row1['lname'];
                        $uname = $row1['u_name'];
                        $row1 = mysqli_fetch_assoc($result1);
                      } while ($row1);

                      $h_id = $row['house_id'];
                      $query1 = "SELECT * FROM house WHERE house_id = '$h_id'";
                      $result2 = mysqli_query($con, $query1);
                      $row2 = mysqli_fetch_assoc($result2);
                      do {
                        $hname = $row2['house_name'];
                        $row2 = mysqli_fetch_assoc($result2);
                      } while ($row2);

                      $dur = $row['duration_month'];
                      $total1 = 0;
                      $total = $row['total_rent'];
                      for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
                        $total1 += $total;
                      }
                      $term = $row['terms'];
                      $per = $row['rent_per_term'];
                      $start = $row['start_day'];
                      $end = $row['end_day'];
                      $sign = $row['date_contract_sign'];
                      $stat = $row['status'];
                      $cid = $row['contract_id'];
                      if ($stat == "Active") {
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
                        echo "<td style = 'color:green;'>" . $stat . "</td>";
                        echo "<td align = 'center'><a href='delete_contract.php?id=" . $row['contract_id'] . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='edit_contract.php?id=" . $row['tenant_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        echo '</tr>';
                      } else {
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
                        echo "<td style = 'color:red;'>" . $stat . "</td>";
                        echo "<td align = 'center'><a href='delete_contract.php?id=" . $row['contract_id'] . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></td>";
                        echo '</tr>';
                      }




                      $row = mysqli_fetch_assoc($result);
                    } while ($row);


                    ?>

                  </tbody>
                </table>

                <hr>
                <br />
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
                    <?php
                    $sql = "SELECT SUM(total_rent) FROM contract";
                    $query = mysqli_query($con, $sql);
                    $res = mysqli_fetch_assoc($query);

                    do {
                      $total = $res['SUM(total_rent)'];
                      $res = mysqli_fetch_assoc($query);
                    } while ($res);

                    echo '<tr>';
                    echo '<td>EXPECTED INCOME</td>';
                    echo "<td><span style = 'color:orange;'>Ksh. " . number_format($total) . '/=</td>';
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