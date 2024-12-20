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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'includes/topbar.php' ?>

        <!-- Begin Page Content -->

        <div class="container">
          <div class="card o-hnameden border my-5">
            <div class="card-body p-0">

              <!-- Nested Row within Card Body -->
              <div class="row">

                <div class="col-lg-12">
                  <div class="card-body p-5">
                    <div class="text-center mb-4">
                      <h2 class="h4 text-gray-900">Register New User</h2>
                      <hr>
                    </div>

                    <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <!-- Name and Username -->
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control" name="Name" value="<?php echo @$name; ?>"
                            placeholder="Name" required>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="uName" value="<?php echo @$uname; ?>"
                            placeholder="User Name" required>
                        </div>
                      </div>

                      <!-- Phone Number and Role -->
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control" name="pno1" value="<?php echo @$pno; ?>"
                            placeholder="Phone Number (e.g., 254712345678)" required>
                        </div>
                        <div class="col-sm-6">
                          <select class="form-control" name="role" id="durations" required>
                            <option value="" disabled selected>User Role</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Manager">Manager</option>
                          </select>
                        </div>
                      </div>

                      <!-- Password and Repeat Password -->
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="repeatPassword"
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
        <script type="text/javascript">
          $('input[name = "radio"]').on('change', function () {
            $('input[name = "programme"]').attr('disabled', this.value != "Enable");
            $('input[name = "regno"]').attr('disabled', this.value != "Enable");
            $('input[name = "occupation"]').attr('disabled', this.value != "Disable");
            $('input[name = "programme"]').attr('required', this.value == "Enable");
            $('input[name = "regno"]').attr('required', this.value == "Enable");
            $('input[name = "occupation"]').attr('required', this.value == "Disable");
          });
        </script>

        <script type="text/javascript">
          $("#durations").on('change', function () {
            $('#terms option[value = 2]').attr('disabled', this.value == 3);
            $('#terms option[value = 4]').attr('disabled', this.value == 3);
            $('#terms option[value = 4]').attr('disabled', this.value == 6);

          });
        </script>
        <script>
          $(document).ready(function () {
            $('input:checkbox').click(function () {
              $('input:checkbox').not(this).prop('checked', false);
            });
          });
        </script>

        <script>
          if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
        </script>



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