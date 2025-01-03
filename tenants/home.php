<?php include("includes/head.php"); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("includes/sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include("includes/topbar.php"); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">Welcome back,
            <?php

            $query = "SELECT fname, lname FROM tenant WHERE u_name = '$uname'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
              // Fetch first and last name
              $firstName = $row['fname'];
              $lastName = $row['lname'];
              echo htmlspecialchars($firstName) . ' ' . htmlspecialchars($lastName);
            } else {
              echo "User";
            }
            ?>!
          </h1>

          <p class="mb-4">
            <span style="color:green;">You Occupy <b><b>House :
                  <?php
                  // Fetching the house name 
                  $query = "SELECT * FROM tenant WHERE u_name = '$uname'";
                  $result1 = mysqli_query($con, $query);
                  $row = mysqli_fetch_assoc($result1);

                  if ($row) {
                    $id = $row['tenant_id'];
                    $sql = "SELECT * FROM contract WHERE tenant_id = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                      $h_id = $row['house_id'];
                      $sql1 = "SELECT * FROM house WHERE house_id = '$h_id'";
                      $result1 = mysqli_query($con, $sql1);
                      $row1 = mysqli_fetch_assoc($result1);

                      if ($row1) {
                        $name = $row1['house_name'];
                        echo htmlspecialchars($name);
                      } else {
                        echo "Unknown House";
                      }
                    } else {
                      echo "No Contract Found";
                    }
                  } else {
                    echo "Unknown Tenant";
                  }
                  ?></b></b></span>
          </p>

          <p class="mb-4">The information below shows the amount to be paid with respect with the terms stated and their
            respective due dates.</p>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Due Date</th>
                      <th>Amount to be Paid (Ksh.)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                    $result1 = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result1);
                    do {
                      $id = $row['tenant_id'];
                      $row = mysqli_fetch_assoc($result1);
                    } while ($row);

                    $sql = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Active'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = 0;
                    do {
                      $hid = $row['house_id'];
                      $dur = $row['duration_month'];
                      $term = $row['terms'];
                      $div = $dur / $term;
                      $day = $row['start_day'];
                      $day1 = date("Y-m-d", strtotime($day . "+ 2 days"));
                      echo '<tr>';
                      echo '<td>' . $day1 . '</td>';
                      echo '<td>' . number_format($row['rent_per_term']) . '/=</td>';
                      echo '<tr>';
                      for ($i = $div; $i < $dur; $i += $div) {
                        echo '<tr>';
                        $date = date("Y-m-d", strtotime("+" . $i . " months", strtotime("$day")));
                        $date1 = date("Y-m-d", strtotime($date . "+ 2 days"));
                        echo '<td>' . $date1 . '</td>';
                        echo '<td>' . number_format($row['rent_per_term']) . '/=</td>';
                        echo '<tr>';
                      }

                      echo '<tr><td><b><b><b>TOTAL</b></b></b></td><td>' . number_format($row['total_rent']) . '/=</td></tr>';

                      $row = mysqli_fetch_assoc($result);
                    } while ($row);
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <p class="mb-4">For more information or help please kindly contact us through:<br /><br /><b>Phone Number:
              +254 (0) 756 777 777.<br />Email Address: rhms123@hotmail.com.</b></p>

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

  <?php
  include("includes/scripts.php");
  ?>

</body>

</html>