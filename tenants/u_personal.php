<?php include 'includes/head.php'; ?>

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
          <h1 class="h3 mb-2 text-gray-800">Personal Information</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <?php
                    $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                    $result1 = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result1);
                    do {
                      $id = $row['tenant_id'];
                      $row = mysqli_fetch_assoc($result1);
                    } while ($row);
                    $sql = "SELECT * FROM tenant WHERE tenant_id = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = 0;
                    do {

                      echo '<tr>';
                      echo "<td> Full Name:</td>";
                      echo "<td style = 'color:blue;'>" . $row['fname'] . " " . $row['lname'] . "</td>";
                      echo '<tr>';

                      if ($row['programme'] == '') {
                        $row['programme'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Programme:</td>";
                      echo "<td style = 'color:blue;'>" . $row['programme'] . "</td>";
                      echo '<tr>';

                      if ($row['reg_no'] == '') {
                        $row['reg_no'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Registration Number:</td>";
                      echo "<td style = 'color:blue;'>" . $row['reg_no'] . "</td>";
                      echo '<tr>';

                      if ($row['occupation'] == '') {
                        $row['occupation'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Occupation:</td>";
                      echo "<td style = 'color:blue;'>" . $row['occupation'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Phone Number 1:</td>";
                      echo "<td style = 'color:blue;'>" . $row['p_no'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Phone Number 2:</td>";
                      echo "<td style = 'color:blue;'>" . $row['pno1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Email Address:</td>";
                      echo "<td style = 'color:blue;'>" . $row['e_address'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Postal Address:</td>";
                      echo "<td style = 'color:blue;'>" . $row['p_address'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>City</td>";
                      echo "<td style = 'color:blue;'>" . $row['city'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Region</td>";
                      echo "<td style = 'color:blue;'>" . $row['region'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td></td>";
                      echo "<td></td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Choose below the information you would like to edit: </td>";
                      echo '<tr>';


                      $row = mysqli_fetch_assoc($result);
                    } while ($row);

                    if (isset($_POST['submit'])) {

                      $col = $_POST['column'];
                      $edit = $_POST['edit'];

                      $query2 = "UPDATE tenant SET $col = '$edit' WHERE tenant_id = '$id'";
                      mysqli_query($con, $query2);
                      echo "<script> alert('Edited successfully!!');</script>";
                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "u_personal.php";</script>';
                      exit;
                    }
                    ?>
                    <tr>
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <td><select class='custom-select' name='column' style='width:300px;'>
                            <option value='p_no'>Phone Number 1 e.g; 0754******</option>
                            <option value='pno1'>Phone Number 2 e.g; 0754******</option>
                            <option value='e_address'>Email Address</option>
                            <option value='p_address'>Postal Address</option>
                            <option value='city'>City</option>
                            <option value='region'>Region</option>
                          </select></td>
                        <td><input type='text' class='form-control form-control-user' name='edit'></td>
                    <tr>

                    <tr>
                      <td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit' value='Edit'></td>
                      </form>
                    <tr>

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