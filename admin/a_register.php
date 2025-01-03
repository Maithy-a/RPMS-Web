<!DOCTYPE html>
<html lang="en">
<?php
include("includes/session.php");
include("../conn.php"); // database connection
include 'includes/head.php';
?>

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
        <div class="container">
          <div class="card o-hidden border my-5">
            <div class="card-body p-0">

              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="card-body p-5">
                    <div class="text-center mb-4">
                      <h2 class="h4 text-gray-900">Register New User</h2>
                      <hr>
                    </div>

                    <!-- Registration Form -->
                    <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <!-- Name and Username -->
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="u_name" placeholder="Username" required>
                        </div>
                      </div>

                      <!-- Email and Phone Number -->
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="pno"
                            placeholder="Phone Number (e.g., 254712345678)" required>
                        </div>
                      </div>

                      <!-- Role Selection -->
                      <div class="form-group">
                        <select class="form-control" name="role" required>
                          <option value="" disabled selected>Select User Role</option>
                          <option value="Administrator">Administrator</option>
                          <option value="Manager">Manager</option>
                        </select>
                      </div>

                      <!-- Password and Repeat Password -->
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="repeat_password"
                            placeholder="Repeat Password" required>
                        </div>
                      </div>

                      <hr>
                      <!-- Submit Button -->
                      <button type="submit" class="btn btn-outline-success btn-block" name="submit">
                        Register Account
                      </button>
                    </form>

                    <div class="text-center mt-4">
                      <a class="small text-primary" href="admin_home.php">Back Home</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
          // Collect input data
          $name = mysqli_real_escape_string($con, $_POST['name']);
          $u_name = mysqli_real_escape_string($con, $_POST['u_name']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $pno = mysqli_real_escape_string($con, $_POST['pno']);
          $role = mysqli_real_escape_string($con, $_POST['role']);
          $password = mysqli_real_escape_string($con, $_POST['password']);
          $repeat_password = mysqli_real_escape_string($con, $_POST['repeat_password']);
          $hashed_password = md5($password); // Encrypt password
          $date_reg = date('Y-m-d');

          // Validation: Check if passwords match
          if ($password !== $repeat_password) {
            echo "<script>
                    toastr.error('Passwords do not match. Please try again.', 'Registration Failed');
                  </script>";
          } else {
            // Insert data into the database
            $sql = "INSERT INTO user (name, u_name, email, pno, role, pword, date_reg) 
                    VALUES ('$name', '$u_name', '$email', '$pno', '$role', '$hashed_password', '$date_reg')";

            if (mysqli_query($con, $sql)) {
              echo "<script>
                      toastr.success('New user registered successfully!', 'Registration Successful');
                      setTimeout(function() { window.location.href = 'admin_home.php'; }, 3000);
                    </script>";
            } else {
              echo "<script>
                      toastr.error('Error: Unable to register user. Please try again.', 'Registration Failed');
                    </script>";
            }
          }
        }
        ?>
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