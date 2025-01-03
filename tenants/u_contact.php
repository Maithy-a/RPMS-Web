<?php include('includes/head.php')?>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('includes/sidebar.php')?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('includes/topbar.php')?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">Your Contacts</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Contact #1</th>

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
                    $sql = "SELECT * FROM tenant_contacts WHERE tenant_id = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = 0;
                    do {
                      echo '<tr>';
                      echo "<td> Full Name:</td>";
                      echo "<td style = 'color:blue;'>" . $row['fname1'] . " " . $row['lname1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Occupation:</td>";
                      echo "<td style = 'color:blue;'>" . $row['occupation1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Nature of the Relationship:</td>";
                      echo "<td style = 'color:blue;'>" . $row['nature1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Phone Number 1:</td>";
                      echo "<td style = 'color:blue;'>" . $row['pno1'] . "</td>";
                      echo '<tr>';
                      if ($row['pno2'] == '') {
                        $row['pno2'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Phone Number 2:</td>";
                      echo "<td style = 'color:blue;'>" . $row['pno2'] . "</td>";
                      echo '<tr>';
                      if ($row['e_address1'] == '') {
                        $row['e_address1'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Email Address:</td>";
                      echo "<td style = 'color:blue;'>" . $row['e_address1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Postal Address:</td>";
                      echo "<td style = 'color:blue;'>" . $row['p_address1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>City</td>";
                      echo "<td style = 'color:blue;'>" . $row['city1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Region</td>";
                      echo "<td style = 'color:blue;'>" . $row['region1'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td></td>";
                      echo "<td></td>";
                      echo '<tr>';

                      echo '<thead>';
                      echo '<tr>';
                      echo '<th>Contact #2</th>';
                      echo '</tr>';
                      echo '</thead>';

                      echo '<tr>';
                      echo "<td> Full Name:</td>";
                      echo "<td style = 'color:blue;'>" . $row['fname2'] . " " . $row['lname2'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Occupation:</td>";
                      echo "<td style = 'color:blue;'>" . $row['occupation2'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Nature of the Relationship:</td>";
                      echo "<td style = 'color:blue;'>" . $row['nature2'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Phone Number 1:</td>";
                      echo "<td style = 'color:blue;'>" . $row['pno3'] . "</td>";
                      echo '<tr>';
                      if ($row['pno4'] == '') {
                        $row['pno4'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Phone Number 2:</td>";
                      echo "<td style = 'color:blue;'>" . $row['pno4'] . "</td>";
                      echo '<tr>';
                      if ($row['e_address2'] == '') {
                        $row['e_address2'] = '-';
                      }

                      echo '<tr>';
                      echo "<td>Email Address:</td>";
                      echo "<td style = 'color:blue;'>" . $row['e_address2'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Postal Address:</td>";
                      echo "<td style = 'color:blue;'>" . $row['p_address2'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>City</td>";
                      echo "<td style = 'color:blue;'>" . $row['city2'] . "</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Region</td>";
                      echo "<td style = 'color:blue;'>" . $row['region2'] . "</td>";

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

                      $query2 = "UPDATE tenant_contacts SET $col = '$edit' WHERE tenant_id = '$id'";
                      mysqli_query($con, $query2);
                      echo "<script> alert('Edited successfully!!');</script>";
                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "u_contact.php";</script>';
                      exit;
                    }
                    ?>
                    <tr>
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <td><select class='custom-select' name='column' style='width:300px;'>
                            <option disabled>CONTACT #1</option>
                            <option value='fname1'>First Name</option>
                            <option value='lname1'>Last Name</option>
                            <option value='occupation1'>Occupation</option>
                            <option value='nature1'>Nature of the Relationship</option>
                            <option value='pno1'>Phone Number 1 e.g; 0754******</option>
                            <option value='pno2'>Phone Number 2 e.g; 0754******</option>
                            <option value='e_address1'>Email Address</option>
                            <option value='p_address1'>Postal Address</option>
                            <option value='city1'>City</option>
                            <option value='region1'>Region</option>
                            <option disabled>CONTACT #2</option>
                            <option value='fname2'>First Name</option>
                            <option value='lname2'>Last Name</option>
                            <option value='occupation2'>Occupation</option>
                            <option value='nature2'>Nature of the Relationship</option>
                            <option value='pno3'>Phone Number 1 e.g; 0754******</option>
                            <option value='pno4'>Phone Number 2 e.g; 0754******</option>
                            <option value='e_address2'>Email Address</option>
                            <option value='p_address2'>Postal Address</option>
                            <option value='city2'>City</option>
                            <option value='region2'>Region</option>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>