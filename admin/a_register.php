<?php
include "../conn.php";

function check($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}

if (isset($_POST["submit"])) {

  $name = check($_POST['Name']);
  $uname = check($_POST['uName']);
  $pno = check($_POST['pno1']);
  $role = $_POST['role'];
  $pword = check($_POST['password']);
  $rpword = check($_POST['repeatPassword']);

  $date_reg = date('Y-m-d');
  if (is_numeric($name)) {
    $nameErr = "The name should only contain letters!";
    echo "<script> alert('$nameErr');</script>";
  } elseif ((strlen($name) < 3) || (strlen($name) > 20)) {
    $nameErr = "The name is either too short or too long";
    echo "<script> alert('$nameErr');</script>";
  } else {
    if (!is_numeric($pno)) {
      $pnoErr = "The phone number should not contain letters";
      echo "<script> alert('$pnoErr');</script>";
    } elseif (strlen($pno) > 12) {
      $pnoErr = "The phone number is too long";
      echo "<script> alert('$pnoErr');</script>";
    } elseif (strlen($pno) < 12) {
      $pnoErr = "The phone number is too short";
      echo "<script> alert('$pnoErr');</script>";
    } else {

      $sql4 = "SELECT * FROM user WHERE u_name = '$uname'";
      $query = mysqli_query($con, $sql4);
      if (mysqli_num_rows($query) > 0) {
        echo "<script> alert('Username exists!!');</script>";
      } else {
        if ((strlen($pword) < 8) || (strlen($rpword) < 8)) {
          echo "<script> alert('Password is too short');</script>";
        } elseif ($pword == $rpword) {
          $pword = md5($pword);

          $sql = "INSERT INTO `user`(`user_id`, `name`, `role`, `pno`, `u_name`, `pword`, `date_reg`) VALUES (' ','$name','$role','$pno','$uname','$pword','$date_reg')";
          mysqli_query($con, $sql);
          mysqli_close($con);
          echo "<script type='text/javascript'>alert('Registered successfully.');</script>";
          echo '<style>body{display:none;}</style>';
          echo '<script>window.location.href = "admin_home.php";</script>';

        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Elsie Rental Management System</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../res/img/favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../res/img/favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../res/img/favicon_io/favicon-16x16.png">
<link rel="manifest" href="../res/img/favicon_io/site.webmanifest">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
    rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="card o-hnameden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><b><b>REGISTER A USER</b></b></h1>
              </div>

              <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="Name" value="<?php echo @$name; ?>"
                      placeholder="Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="uName"
                      value="<?php echo @$uname; ?>" placeholder="User Name" required>
                  </div>
                </div>

                <div class="form-group row">

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="pno1" value="<?php echo @$pno; ?>"
                      placeholder="Enter Phone Number (e.g., 254712345678)" required>
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="custom-select" name="role" id="durations" style="width:480px;" required>
                      <option value="" disabled selected>User Role</option>
                      <option value="Administrator">Administrator</option>
                      <option value="Manager">Manager</option>
                    </select>
                  </div>

                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password"
                      required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="repeatPassword"
                      placeholder="Repeat Password" required>
                  </div>
                </div>
                <hr>
                <input class="btn btn-success btn-user btn-sm" type="submit" name="submit" value="Register Account">

              </form>

              <div class="text-center">
                <a class="small" href="admin_home.php" style="color:#1cc88a;">Back Home</a>
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
    <!-- Footer -->
    <?php include '../footer.php'; ?>


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

  <script>if (window.history.replaceState) { window.history.replaceState(null, null, window.location.href); }
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-1.12.4.min.js"></script><!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>