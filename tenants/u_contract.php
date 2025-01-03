<?php include("includes/db.php"); ?>

<?php include("includes/head.php") ?>

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
          <h1 class="h3 mb-2 text-gray-800">Your Contract</h1>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <tr>
                      <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                          <select class='custom-select' name='column' style='width:300px;'>
                            <option value='all'>All</option>
                            <option value='latest'>Latest</option>
                          </select>&nbsp&nbsp&nbsp&nbsp
                          <input class='btn btn-primary btn-user btn-lg' type='submit' name='submit' value='Select'>
                        </form>
                        <br />
                      </td>
                    </tr>
                    <?php
                    $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                    $result1 = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result1);
                    do {
                      $id = $row['tenant_id'];
                      $row = mysqli_fetch_assoc($result1);
                    } while ($row);
                    if (isset($_POST['submit'])) {
                      $choose = @$_POST['column'];
                      if ($choose == 'all') {
                        $sql = "SELECT * FROM contract WHERE tenant_id = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        do {
                          $h_id = $row['house_id'];
                          $cid = $row['contract_id'];
                          $sql1 = "SELECT * FROM house WHERE house_id = '$h_id'";
                          $result1 = mysqli_query($con, $sql1);
                          $row1 = mysqli_fetch_assoc($result1);
                          do {
                            $name = $row1['house_name'];
                            $amount = $row1['rent_per_month'];
                            $row1 = mysqli_fetch_assoc($result1);
                          } while ($row1);
                          echo '<tr>';
                          echo "<td> Contract ID:</td>";
                          echo "<td style = 'color:blue;'>" . $cid . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td> House Name:</td>";
                          echo "<td style = 'color:blue;'>" . $name . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td> Cost of the Room (Ksh.):</td>";
                          echo "<td style = 'color:blue;'>" . number_format($amount) . "/=</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Duration of Occupying the Room (months):</td>";
                          echo "<td style = 'color:blue;'>" . $row['duration_month'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Total Rent (Ksh.):</td>";
                          echo "<td style = 'color:blue;'>" . number_format($row['total_rent']) . "/=</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Terms of Payment:</td>";
                          echo "<td style = 'color:blue;'>" . $row['terms'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Total Rent per Term (Ksh.):</td>";
                          echo "<td style = 'color:blue;'>" . number_format($row['rent_per_term']) . "/=</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Contract begins on:</td>";
                          echo "<td style = 'color:blue;'>" . $row['start_day'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Contract ends on:</td>";
                          echo "<td style = 'color:blue;'>" . $row['end_day'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Date of signing the Contract:</td>";
                          echo "<td style = 'color:blue;'>" . $row['date_contract_sign'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Status of the Contract:</td>";
                          echo "<td style = 'color:blue;'>" . $row['status'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td><hr></td>";
                          echo "<td><hr></td>";
                          echo '<tr>';
                          echo "<tr>";


                          $row = mysqli_fetch_assoc($result);
                        } while ($row);

                        echo "<form action='u_contract.php' method = 'POST'>";
                        echo "<td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit1' value='Edit'></td>";
                        echo "</form>";
                        echo "</tr>";

                      } else {
                        $sql = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Active'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        do {
                          $h_id = $row['house_id'];
                          $cid = $row['contract_id'];
                          $sql1 = "SELECT * FROM house WHERE house_id = '$h_id'";
                          $result1 = mysqli_query($con, $sql1);
                          $row1 = mysqli_fetch_assoc($result1);
                          do {
                            $name = $row1['house_name'];
                            $amount = $row1['rent_per_month'];
                            $row1 = mysqli_fetch_assoc($result1);
                          } while ($row1);

                          echo '<tr>';
                          echo "<td> House Name:</td>";
                          echo "<td style = 'color:blue;'>" . $name . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td> Cost of the Room (Ksh.):</td>";
                          echo "<td style = 'color:blue;'>" . $amount . "/=</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Duration of Occupying the Room (months):</td>";
                          echo "<td style = 'color:blue;'>" . $row['duration_month'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Total Rent (Ksh.):</td>";
                          echo "<td style = 'color:blue;'>" . $row['total_rent'] . "/=</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Terms of Payment:</td>";
                          echo "<td style = 'color:blue;'>" . $row['terms'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Total Rent per Term (Ksh.):</td>";
                          echo "<td style = 'color:blue;'>" . $row['rent_per_term'] . "/=</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Contract begins on:</td>";
                          echo "<td style = 'color:blue;'>" . $row['start_day'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Contract ends on:</td>";
                          echo "<td style = 'color:blue;'>" . $row['end_day'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Date of signing the Contract:</td>";
                          echo "<td style = 'color:blue;'>" . $row['date_contract_sign'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Status of the Contract:</td>";
                          echo "<td style = 'color:blue;'>" . $row['status'] . "</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td></td>";
                          echo "<td></td>";

                          echo '<tr>';

                          echo "<tr>";
                          echo "<form action='u_contract.php' method = 'POST'>";
                          echo "<td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit1' value='Edit'></td>";
                          echo "</form>";
                          echo "</tr>";

                          $row = mysqli_fetch_assoc($result);
                        } while ($row);
                      }
                    }
                    if (isset($_POST['submit1'])) {

                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "contract_msg.php";</script>';
                      exit;

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
      <?php include '../footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php include 'includes/scripts.php'; ?>
</body>

</html>