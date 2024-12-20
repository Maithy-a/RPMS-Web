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

          <!-- Page Heading -->

          <!-- DataTable -->
          <div class="card  mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Tenants Information</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Programme</th>
                      <th>Registration No</th>
                      <th>Occupation</th>
                      <th>Phone # 1</th>
                      <th>Phone # 2</th>
                      <th>Email Address</th>
                      <th>Postal Address</th>
                      <th>City</th>
                      <th>Region</th>
                      <th>Status</th>
                      <th>Edit</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM tenant";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $uname = $row['u_name'];
                      $prog = $row['programme'];
                      if ($row['programme'] == '') {
                        $prog = '-';
                      }
                      $reg = $row['reg_no'];
                      if ($row['reg_no'] == '') {
                        $reg = '-';
                      }
                      $occ = $row['occupation'];
                      if ($row['occupation'] == '') {
                        $occ = '-';
                      }
                      $pno1 = $row['p_no'];
                      $pno2 = $row['pno1'];
                      $email = $row['e_address'];
                      $postal = $row['p_address'];
                      $city = $row['city'];
                      $region = $row['region'];
                      $status = $row['status'];
                      if ($status == 0) {
                        echo '<tr>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $prog . '</td>';
                        echo '<td>' . $reg . '</td>';
                        echo '<td>' . $occ . '</td>';
                        echo '<td>' . $pno1 . '</td>';
                        echo '<td>' . $pno2 . '</td>';
                        echo '<td>' . $email . '</td>';
                        echo '<td>' . $postal . '</td>';
                        echo '<td>' . $city . '</td>';
                        echo '<td>' . $region . '</td>';
                        echo "<td style = 'color:green;'>Payment Pending</td>";
                        echo "<td align = 'center'><a href='edit_tenant.php?id=" . $row['tenant_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        echo '</tr>';
                      } elseif ($status == 1) {
                        echo '<tr>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $prog . '</td>';
                        echo '<td>' . $reg . '</td>';
                        echo '<td>' . $occ . '</td>';
                        echo '<td>' . $pno1 . '</td>';
                        echo '<td>' . $pno2 . '</td>';
                        echo '<td>' . $email . '</td>';
                        echo '<td>' . $postal . '</td>';
                        echo '<td>' . $city . '</td>';
                        echo '<td>' . $region . '</td>';
                        echo "<td><b><b>Account Active</b></b></td>";
                        echo "<td align = 'center'><a href='edit_tenant.php?id=" . $row['tenant_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        echo '</tr>';
                      } elseif ($status == 2) {
                        echo '<tr>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $prog . '</td>';
                        echo '<td>' . $reg . '</td>';
                        echo '<td>' . $occ . '</td>';
                        echo '<td>' . $pno1 . '</td>';
                        echo '<td>' . $pno2 . '</td>';
                        echo '<td>' . $email . '</td>';
                        echo '<td>' . $postal . '</td>';
                        echo '<td>' . $city . '</td>';
                        echo '<td>' . $region . '</td>';
                        echo "<td style = 'color:red;'>Contact the System Administrator.</td>";
                        echo "<td align = 'center'><a href='edit_tenant.php?id=" . $row['tenant_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        echo '</tr>';
                      } else {

                        echo '<tr>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $prog . '</td>';
                        echo '<td>' . $reg . '</td>';
                        echo '<td>' . $occ . '</td>';
                        echo '<td>' . $pno1 . '</td>';
                        echo '<td>' . $pno2 . '</td>';
                        echo '<td>' . $email . '</td>';
                        echo '<td>' . $postal . '</td>';
                        echo '<td>' . $city . '</td>';
                        echo '<td>' . $region . '</td>';
                        echo "<td style = 'color:red;'>Contract has Expired.</td>";
                        echo "<td align = 'center'><a href='edit_tenant.php?id=" . $row['tenant_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
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

                    $sql = "SELECT * FROM tenant";
                    $result = mysqli_query($con, $sql);
                    echo '<tr>';
                    echo '<td>TOTAL NUMBER OF TENANTS</td>';
                    echo "<td style = 'color:red;'>" . mysqli_num_rows($result) . "</td>";
                    echo '</tr>';

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
  <?php include 'includes/DataTables.php'; ?>
</body>

</html>