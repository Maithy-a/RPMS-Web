<?php
include "conn.php";

function check($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}

if (isset($_POST["submit"])) {

  $fname = check($_POST['FirstName']);
  $lname = check($_POST['LastName']);
  $prog = check($_POST['programme']);
  $reg = check($_POST['regno']);
  $occ = check($_POST['occupation']);
  $pno1 = check($_POST['pno1']);
  $pno2 = check($_POST['pno2']);
  $postal = check($_POST['postal']);
  $city = check($_POST['city']);
  $region = check($_POST['region']);
  $uname = check($_POST['uname']);
  $pword = check($_POST['password']);
  $rpword = check($_POST['repeatPassword']);
  $price = (int) $_POST['price'];
  $dur = (int) $_POST['duration'];
  $term = (int) $_POST['term'];
  $contract = $_POST['contract'];
  $house = (int) $_POST['house'];
  $total_rent = $dur * $price;
  $rent_per_term = $total_rent / $term;
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $stat = "Active";
  $status = 0;

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!ctype_alpha($fname)) {
      echo "<script> alert('The first name should only contain letters!');</script>";
    } elseif ((strlen($fname) < 3) || (strlen($fname) > 10)) {
      echo "<script> alert('The first name is either too short or too long');</script>";
    } else {
      if (!ctype_alpha($lname)) {
        echo "<script> alert('The last name should only contain letters!');</script>";
      } elseif ((strlen($lname) < 3) || (strlen($lname) > 10)) {
        echo "<script> alert('The last name is either too short or too long');</script>";
      } else {
        if ((!is_numeric($pno1)) || (!is_numeric($pno2))) {
          echo "<script> alert('The phone number should not contain letters');</script>";
        } elseif ((strlen($pno1) > 12) || (strlen($pno2) > 12)) {
          echo "<script> alert('The phone number is too long');</script>";
        } elseif ((strlen($pno1) < 12) || (strlen($pno2) < 12)) {
          echo "<script> alert('The phone number is too short');</script>";
        } else {
          $sql4 = "SELECT * FROM tenant WHERE u_name = '$uname'";
          $query = mysqli_query($con, $sql4);
          if (mysqli_num_rows($query) > 0) {
            echo "<script> alert('Username exists!!');</script>";
          } else {
            if ((strlen($pword) < 8) || (strlen($rpword) < 8)) {
              echo "<script> alert('Password is too short');</script>";
            } elseif ($pword == $rpword) {
              $pword = md5($pword);
              $sql = "INSERT INTO tenant VALUES (' ','$fname','$lname','$prog','$reg','$occ','$pno1','$pno2','$email','$postal','$city','$region','$uname','$pword', NOW(), '$status')";
              mysqli_query($con, $sql);
              $last_id = mysqli_insert_id($con);
              $sql1 = "INSERT INTO contract VALUES (' ','$last_id', '$house','$dur','$total_rent','$term','$rent_per_term', NOW(), DATE_ADD(NOW(), INTERVAL $dur MONTH), NOW(), '$stat')";
              mysqli_query($con, $sql1);
              $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
              mysqli_query($con, $sql3);
              mysqli_close($con);
              echo "<script type='text/javascript'>alert('Welcome $fname $lname! Your contract begins now.');</script>";
              echo '<script>window.location.href = "dashboard.php";</script>';
            } else {
              echo "<script> alert('Password does not match');</script>";
            }
          }
        }
      }
    }
  } else {
    echo "<script> alert('Invalid Email');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Elsie Rental Management System</title>

  <link rel="apple-touch-icon" sizes="180x180" href="../res/img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../res/img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../res/img/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="../res/img/favicon_io/site.webmanifest">

  <!-- icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Custom styles for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
    rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="includes/style.css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Toastr CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "500",
      "hideDuration": "2000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
  </script>
  <!-- tingle modal -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tingle.js/dist/tingle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/tingle.js/dist/tingle.min.js"></script>
  <style>
    .custom-class {
      max-width: 100vw;
      max-height: 100vh;
      overflow-y: auto;
    }

    iframe {
      width: 100%;
      height: 70vh;
      border: none;
      background-color: #fff;
    }
  </style>
</head>

<body>
  <div class="container-sm">
    <div class="card o-hidden shadow-sm my-4">
      <div class="card-body p-0">
        <div class="card-header">
          <h2 class="card-title mb-0">Tenant Registration</h2>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="p-4">
              <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="First Name"
                      required>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="LastName" id="LastName" placeholder="Last Name"
                      required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                      required>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="pno1" id="pno1" placeholder="Primary Contact"
                      required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="pno2" id="pno2" placeholder="Emergency Contact"
                      required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                  </div>
                  <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" name="postal" id="postal" placeholder="Postal Address"
                      required>
                  </div>
                  <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" name="region" id="region" placeholder="Region" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <select class="form-select" aria-label="Default select example" name="occupation" id="occupation"
                      required>
                      <option value="" selected disabled>Occupation</option>
                      <option value="Employed">Employed</option>
                      <option value="Student">Student</option>
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="programme" id="programme" placeholder="Programme"
                      required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="regno" id="regno" placeholder="Registration Number"
                      disabled required>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="NationalID" id="NationalID" placeholder="National ID"
                      disabled required>
                  </div>
                </div>

                <script>
                  document.getElementById('occupation').addEventListener('change', function () {
                    var occupation = this.value;
                    var regnoInput = document.getElementById('regno');
                    var nationalIDInput = document.getElementById('NationalID');

                    if (occupation === 'Student') {
                      regnoInput.disabled = false;
                      nationalIDInput.disabled = true;
                    } else if (occupation === 'Employed') {
                      regnoInput.disabled = true;
                      nationalIDInput.disabled = false;
                    } else {
                      regnoInput.disabled = true;
                      nationalIDInput.disabled = true;
                    }
                  });
                </script>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" required>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                      required>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="password" class="form-control" name="repeatPassword" id="repeatPassword"
                      placeholder="Repeat Password" required>
                  </div>
                </div>

                <script>
                  document.querySelector('form').addEventListener('submit', function (e) {
                    var password = document.querySelector('input[name="password"]').value;
                    var repeatPassword = document.querySelector('input[name="repeatPassword"]').value;

                    var passwordError = '';
                    if (password.length < 8) {
                      passwordError = 'Password must be at least 8 characters long.';
                    } else if (!/[A-Z]/.test(password)) {
                      passwordError = 'Password must contain at least one uppercase letter.';
                    } else if (!/[a-z]/.test(password)) {
                      passwordError = 'Password must contain at least one lowercase letter.';
                    } else if (!/[0-9]/.test(password)) {
                      passwordError = 'Password must contain at least one number.';
                    } else if (!/[!@#$%^&*]/.test(password)) {
                      passwordError = 'Password must contain at least one special character.';
                    }

                    if (passwordError) {
                      e.preventDefault();
                      toastr.error(passwordError);
                    } else if (password !== repeatPassword) {
                      e.preventDefault();
                      toastr.error('Passwords do not match.');
                    }
                  });
                </script>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <select class="form-select" aria-label="Default select example" name="house" id="house" required>
                      <option value="">Select House</option>
                      <?php
                      $sql = "SELECT house_id, house_name, rent_per_month FROM house WHERE status = 'Empty'";
                      $res = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value='" . $row['house_id'] . "' data-price='" . $row['rent_per_month'] . "'>" . $row['house_name'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="price" id="price" placeholder="House Price" required
                      readonly>
                  </div>
                </div>
                <script>
                  document.getElementById('house').addEventListener('change', function () {
                    var selectedOption = this.options[this.selectedIndex];
                    var price = selectedOption.getAttribute('data-price');
                    document.getElementById('price').value = price;
                  });
                </script>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <select class="form-select" aria-label="Default select example" name="term" id="term" required>
                      <option value="" selected disabled>Payment Terms</option>
                      <option value="1">1 term</option>
                      <option value="2">2 terms</option>
                      <option value="4">4 terms</option>
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <select class="form-select" aria-label="Default select example" name="duration" id="duration"
                      required>
                      <option value="" selected disabled>Contract Duration</option>
                      <option value="3">3 months</option>
                      <option value="6">6 months</option>
                      <option value="12">12 months</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" name="contract" id="contract" value="Occupied"
                    required disabled>
                  <label for="contract">Please agree to the <a href="#" id="open-modal">Terms And Conditions</a></label>
                  <script>
                    document.getElementById('open-modal').addEventListener('click', function (e) {
                      e.preventDefault();
                      var modal = new tingle.modal({
                        footer: true,
                        stickyFooter: true,
                        closeMethods: [],
                        cssClass: ['custom-class'],
                        onOpen: function () {
                          console.log('Modal opened');
                        },
                        onClose: function () {
                          console.log('Modal closed');
                        }
                      });

                      var pdfUrl = 'contract.pdf';
                      var content = `<iframe src="${pdfUrl}" allowfullscreen></iframe>`;

                      modal.setContent(content);

                      modal.addFooterBtn('Agree', 'tingle-btn tingle-btn--primary', function () {
                        toastr.success('You have agreed to the terms. Thank you!', 'Success');
                        document.getElementById('contract').checked = true;
                        modal.close();
                      });

                      modal.addFooterBtn('Close', 'tingle-btn tingle-btn--default', function () {
                        toastr.error('Please agree to the terms to continue with your registration.', 'Error');
                        modal.close();
                      });

                      modal.open();
                    });
                  </script>
                </div>
                <hr>
                <div class="form-group row text-end">
                  <div class="col-auto">
                    <input class="btn btn-outline-primary" type="submit" name="submit" value="Register Account">
                  </div>
                </div>
              </form>

              <div>
                <a class="small icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;"
                  href="login.php">
                  Sign in
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                  </svg>

                </a><br>
                <a class="small icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;"
                  href="index.php">
                  Back Home
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sb-admin-2@latest/js/sb-admin-2.min.js"></script>
</body>

</html>