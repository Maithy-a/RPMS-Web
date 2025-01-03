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
          <h1 class="h3 mb-2 text-gray-800">Change Password</h1>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          Old Password:
                        </td>
                        <td><input type='text' class='form-control form-control-user' name='change'></td>
                      </tr>
                      <tr>
                        <td>
                          New Password:
                        </td>
                        <td><input type='password' class='form-control form-control-user' name='change1'></td>
                      </tr>
                      <tr>
                        <td>
                          Repeat the new Password:
                        </td>
                        <td><input type='password' class='form-control form-control-user' name='change2'></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit'
                            value='Change Password'></td>
                    </form>
                    <tr>
                      <?php
                      if (isset($_POST['submit'])) {
                        $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                        $result1 = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result1);
                        do {
                          $id = $row['tenant_id'];
                          $pword = $row['p_word'];
                          $row = mysqli_fetch_assoc($result1);
                        } while ($row);
                        $old = md5($_POST['change']);
                        $new = check($_POST['change1']);
                        $rnew = check($_POST['change2']);
                        if ($old == $pword) {
                          if (!($rnew == $new)) {
                            echo "<script> alert('Password does not match.');</script>";
                          } else {
                            if ((strlen($rnew) < 8) || (strlen($new) < 8)) {
                              echo "<script> alert('Password is too short.');</script>";
                            } elseif (!($rnew == '') || !($new == '')) {
                              $new = md5($new);
                              $sql = "UPDATE tenant SET p_word ='$new' WHERE tenant_id = '$id'";
                              $result = mysqli_query($con, $sql);
                              echo "<script> alert('Password has been changed successfully. New password will be effective upon new login.');</script>";
                              echo '<style>body{display:none;}</style>';
                              echo '<script>window.location.href = "u_change.php";</script>';
                              exit;
                            }
                          }

                        } else {
                          echo "<script> alert('The old password is incorrect.');</script>";
                        }

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

  <?php include 'includes/scripts.php'; ?>
</body>

</html>