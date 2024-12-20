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
        <?php include 'includes/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTable -->
          <div class="card mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Tenants Contacts</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tenant's Name</th>
                      <th>Contact's Name</th>
                      <th>Occupation</th>
                      <th>Nature of the Relationshiip</th>
                      <th>Phone # 1</th>
                      <th>Phone # 2</th>
                      <th>Email</th>
                      <th>Postal Address</th>
                      <th>City</th>
                      <th>Region</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM tenant_contacts";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $id = $row['tenant_id'];
                      $sql1 = "SELECT * FROM tenant WHERE tenant_id = '$id'";
                      $result1 = mysqli_query($con, $sql1);
                      $row1 = mysqli_fetch_assoc($result1);
                      do {
                        $fname = $row1['fname'];
                        $lname = $row1['lname'];
                        $row1 = mysqli_fetch_assoc($result1);
                      } while ($row1);

                      $cfname = $row['fname1'];
                      $clname = $row['lname1'];
                      $occ = $row['occupation1'];
                      $pno1 = $row['pno1'];
                      $pno2 = $row['pno2'];
                      if ($pno2 == "") {
                        $pno2 = '-';
                      }
                      $pno3 = $row['pno3'];
                      $pno4 = $row['pno4'];
                      if ($pno4 == "") {
                        $pno4 = '-';
                      }
                      $email = $row['e_address1'];
                      if ($email == "") {
                        $email = '-';
                      }
                      $email1 = $row['e_address2'];
                      if ($email1 == "") {
                        $email1 = '-';
                      }
                      $postal = $row['p_address1'];
                      $city = $row['city1'];
                      $region = $row['region1'];
                      $nature = $row['nature1'];


                      $cfname1 = $row['fname2'];
                      $clname1 = $row['lname2'];
                      $occ1 = $row['occupation2'];

                      $postal1 = $row['p_address2'];
                      $city1 = $row['city1'];
                      $region1 = $row['region2'];
                      $nature1 = $row['nature2'];

                      echo '<tr>';
                      echo '<td>' . $fname . ' ' . $lname . '</td>';
                      echo '<td>' . $cfname . ' ' . $clname . '</td>';
                      echo '<td>' . $occ . '</td>';
                      echo '<td>' . $nature . '</td>';
                      echo '<td>' . $pno1 . '</td>';
                      echo '<td>' . $pno2 . '</td>';
                      echo '<td>' . $email . '</td>';
                      echo '<td>' . $postal . '</td>';
                      echo '<td>' . $city . '</td>';
                      echo '<td>' . $region . '</td>';
                      echo '</tr>';

                      echo '<tr>';
                      echo '<td>' . $fname . ' ' . $lname . '</td>';
                      echo '<td>' . $cfname1 . ' ' . $clname1 . '</td>';
                      echo '<td>' . $occ1 . '</td>';
                      echo '<td>' . $nature1 . '</td>';
                      echo '<td>' . $pno3 . '</td>';
                      echo '<td>' . $pno4 . '</td>';
                      echo '<td>' . $email1 . '</td>';
                      echo '<td>' . $postal1 . '</td>';
                      echo '<td>' . $city1 . '</td>';
                      echo '<td>' . $region1 . '</td>';
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
        <!-- /.container-fluid -->
      </div>
      <!-- Footer -->
      <?php include 'includes/footer.php'; ?>
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include 'includes/script.php'; ?>
  <?php include 'includes/DataTables.php'; ?>

</body>

</html>