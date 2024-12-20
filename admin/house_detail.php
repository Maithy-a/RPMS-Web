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

          <!-- Page Heading -->

          <div class="card shadow mb-4">
            <div class="card-header">
              <h1 class="h3 mb-2 text-gray-800">Houses</h1>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>House Name</th>
                      <th>Compartment</th>
                      <th>Rent per Month(Ksh.)</th>
                      <th>Status of the House</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $sql = "SELECT * FROM house";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $hname = $row['house_name'];
                      $compartment = $row['compartment'];
                      $rent = $row['rent_per_month'];
                      $stat = $row['status'];
                      if ($stat == 'Occupied') {
                        echo '<tr>';
                        echo '<td>' . $hname . '</td>';
                        echo '<td>' . $compartment . '</td>';
                        echo '<td>' . number_format($rent) . '/=</td>';
                        echo "<td style = 'color:green;'>" . $stat . "</td>";
                        echo "<td align = 'center'><a href='delete_house.php?id=" . $row['house_id'] . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='edit_house.php?id=" . $row['house_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        echo '</tr>';
                      } else {
                        echo '<tr>';
                        echo '<td>' . $hname . '</td>';
                        echo '<td>' . $compartment . '</td>';
                        echo '<td>' . number_format($rent) . '/=</td>';
                        echo "<td style = 'color:red;'>" . $stat . "</td>";
                        echo "<td align = 'center'><a href='delete_house.php?id=" . $row['house_id'] . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></td>";
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

                    $sql = "SELECT * FROM house";
                    $result = mysqli_query($con, $sql);
                    echo '<tr>';
                    echo '<td>TOTAL NUMBER OF HOUSES</td>';
                    echo '<td>' . mysqli_num_rows($result) . '</td>';
                    echo '</tr>';

                    $sql1 = "SELECT * FROM house WHERE status = 'Occupied'";
                    $result1 = mysqli_query($con, $sql1);
                    echo '<tr>';
                    echo "<td>TOTAL NUMBER OF <span style = 'color:green;'>OCCUPIED</span> HOUSES</td>";
                    echo "<td><span style = 'color:green;'>" . mysqli_num_rows($result1) . "</span></td>";
                    echo '</tr>';

                    $sql2 = "SELECT * FROM house WHERE status = 'Empty'";
                    $result2 = mysqli_query($con, $sql2);
                    echo '<tr>';
                    echo "<td>TOTAL NUMBER OF <span style = 'color:red;'>EMPTY</span> HOUSES</td>";
                    echo "<td><span style = 'color:red;'>" . mysqli_num_rows($result2) . "</span></td>";
                    echo '</tr>';

                    $sql3 = "SELECT * FROM house WHERE compartment = 'Yes'";
                    $result3 = mysqli_query($con, $sql3);
                    echo '<tr>';
                    echo "<td>TOTAL NUMBER OF HOUSES <span style = 'color:green;'>WITH</span> COMPARTMENTS</td>";
                    echo "<td><span style = 'color:green;'>" . mysqli_num_rows($result3) . "</span></td>";
                    echo '</tr>';

                    $sql4 = "SELECT * FROM house WHERE compartment = 'No'";
                    $result4 = mysqli_query($con, $sql4);
                    echo '<tr>';
                    echo "<td>TOTAL NUMBER OF HOUSES <span style = 'color:red;'>WITHOUT</span> COMPARTMENTS</td>";
                    echo "<td><span style = 'color:red;'>" . mysqli_num_rows($result4) . "</span></td>";
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