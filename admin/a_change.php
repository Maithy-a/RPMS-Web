<?php
session_start();
include "../conn.php";

$user = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE u_name = '$user'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
do {
  $role = $row['role'];
  $row = mysqli_fetch_assoc($res);
} while ($row);
if (!$user && $role == 'Administrator') {
  echo '<script>window.location.href = "../log-in.php";</script>';
  exit();
}
function check($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}

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

              <h2 class="h3 mb-2 text-gray-800">Change Password</h2>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          Initial Password:
                        </td>
                        <td>
                          <input type='text' class='form-control form-control-user' name='change' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Create New Password:
                        </td>
                        <td>
                          <input type='password' class='form-control form-control-user' name='change1' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Confirm New Password:
                        </td>
                        <td>
                          <input type='password' class='form-control form-control-user' name='change2' required>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-outline-success btn-user' type='submit' width="100%" name='submit'
                            value='Change Password' required></td>
                    </form>
                    <tr>


                      <?php
                      if (isset($_POST['submit'])) {
                        $query = "SELECT * FROM user WHERE u_name = '$uname'";
                        $result1 = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result1);
                        do {
                          $id = $row['user_id'];
                          $pword = $row['pword'];
                          $row = mysqli_fetch_assoc($result1);
                        } while ($row);
                        $old = md5($_POST['change']);
                        $new = $_POST['change1'];
                        $rnew = $_POST['change2'];
                        if ($old == $pword) {
                          if (!($rnew == $new)) {
                            //toast
                            echo "<script>toastr.error('Password does not match.', 'Error');</script>";
                          } else {
                            if ((strlen($rnew) < 8) || (strlen($new) < 8)) {
                              echo " <script>toastr.error('Password is too short.', 'Error');</script>";
                            } elseif (!($rnew == '') || !($new == '')) {
                              $new = md5($new);
                              $sql = "UPDATE user SET pword ='$new' WHERE user_id = '$id'";
                              $result = mysqli_query($con, $sql);

                              echo "<script> toastr.success('Password has been changed successfully. New password will be effective upon new login.', 'Success'); setTimeout(function() { window.location.href = 'a_change.php'; }, 5000); </script>";

                              echo '<style>body{display:none;}</style>';
                              exit;
                            }
                          }
                        } else {
                          echo "<script>toastr.error('The old password is incorrect.', 'Error');</script>";
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
      <?php include 'includes/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <?php include 'includes/script.php' ?>

</body>

</html>