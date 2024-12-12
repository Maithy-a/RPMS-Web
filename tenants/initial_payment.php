<?php
session_start();
include "../conn.php";
if (!$_SESSION['username']) {
  echo '<script>window.location.href = "../index.php";</script>';
  exit();
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


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
    rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa-solid fa-face-laugh-wink fa-beat-fade"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Elsie Rental Management System<sup>Ex</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-user fa-cog"></i>
          <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Details:</h6>
            <a class="collapse-item" href="u_personal.php">Personal Information</a>
            <a class="collapse-item" href="u_contact.php">Contact Information</a>
            <a class="collapse-item" href="upay.php">Payment Information</a>
            <a class="collapse-item" href="u_contract.php">Contract</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Change Password -->
      <li class="nav-item">
        <a class="nav-link" href="u_change.php">
          <i class="fas fa-fw fa-exchange-alt"></i>
          <span>Change Password</span>
        </a>
      </li>

      <!-- Nav Item - Tenant-In form -->
      <li class="nav-item">
        <a class="nav-link" href="form_in.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tenant-In form</span>
        </a>
      </li>

      <!-- Nav Item - Pay Here -->
      <li class="nav-item">
        <a class="nav-link" href="paystack.php">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Pay Here</span>
        </a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Notifications -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter"></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Alerts Center</h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <!--Notification content-->
                  <div>
                    <div class="small text-gray-500"></div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php
                  $uname = $_SESSION['username'];
                  $query = "SELECT * FROM tenant WHERE u_name = '$uname'";
                  $result = mysqli_query($con, $query);
                  $row = mysqli_fetch_assoc($result);
                  echo $row['fname'] . " " . $row['lname'];
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="../res/img/user.png">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="u_personal.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">First Payment</h1>
          <!-- Payment Form -->
          <form id="paymentForm" class="needs-validation" novalidate>
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td><label for="email">Email Address</label></td>
                        <td>
                          <input type="email" class="form-control" id="email" name="email" required>
                          <div class="invalid-feedback">Please provide a valid email address.</div>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="amount">Amount (in KES)</label></td>
                        <td>
                          <input type="number" class="form-control" id="amount" name="amount" required>
                          <div class="invalid-feedback">Please enter the amount.</div>
                        </td>
                      </tr>

                      <tr>
                        <td><label for="phone">Phone Number</label></td>
                        <td>
                          <input type="tel" class="form-control" id="phone" name="phone" required>
                          <div class="invalid-feedback">Please provide a valid phone number.</div>
                        </td>
                      </tr>

                      <tr>
                        <td>Payment From:</td>
                        <td>
                          <select class="custom-select" name="from" id="terms" style="width:300px;">
                            <option value="January <?php echo date('Y'); ?>">January <?php echo date('Y'); ?></option>
                            <option value="February <?php echo date('Y'); ?>">February <?php echo date('Y'); ?></option>
                            <option value="March <?php echo date('Y'); ?>">March <?php echo date('Y'); ?></option>
                            <option value="April <?php echo date('Y'); ?>">April <?php echo date('Y'); ?></option>
                            <option value="May <?php echo date('Y'); ?>">May <?php echo date('Y'); ?></option>
                            <option value="June <?php echo date('Y'); ?>">June <?php echo date('Y'); ?></option>
                            <option value="July <?php echo date('Y'); ?>">July <?php echo date('Y'); ?></option>
                            <option value="August <?php echo date('Y'); ?>">August <?php echo date('Y'); ?></option>
                            <option value="September <?php echo date('Y'); ?>">September <?php echo date('Y'); ?>
                            </option>
                            <option value="October <?php echo date('Y'); ?>">October <?php echo date('Y'); ?></option>
                            <option value="November <?php echo date('Y'); ?>">November <?php echo date('Y'); ?></option>
                            <option value="December <?php echo date('Y'); ?>">December <?php echo date('Y'); ?></option>
                            <option value="January <?php echo date('Y') + 1; ?>">January <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="February <?php echo date('Y') + 1; ?>">February <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="March <?php echo date('Y') + 1; ?>">March <?php echo date('Y') + 1; ?></option>
                            <option value="April <?php echo date('Y') + 1; ?>">April <?php echo date('Y') + 1; ?></option>
                            <option value="May <?php echo date('Y') + 1; ?>">May <?php echo date('Y') + 1; ?></option>
                            <option value="June <?php echo date('Y') + 1; ?>">June <?php echo date('Y') + 1; ?></option>
                            <option value="July <?php echo date('Y') + 1; ?>">July <?php echo date('Y') + 1; ?></option>
                            <option value="August <?php echo date('Y') + 1; ?>">August <?php echo date('Y') + 1; ?></option>
                            <option value="September <?php echo date('Y') + 1; ?>">September <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="October <?php echo date('Y') + 1; ?>">October <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="November <?php echo date('Y') + 1; ?>">November <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="December <?php echo date('Y') + 1; ?>">December <?php echo date('Y') + 1; ?>
                            </option>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td>To:</td>
                        <td>
                          <select class="custom-select" name="to" id="terms" style="width:300px;">
                            <option value="January <?php echo date('Y'); ?>">January <?php echo date('Y'); ?></option>
                            <option value="February <?php echo date('Y'); ?>">February <?php echo date('Y'); ?></option>
                            <option value="March <?php echo date('Y'); ?>">March <?php echo date('Y'); ?></option>
                            <option value="April <?php echo date('Y'); ?>">April <?php echo date('Y'); ?></option>
                            <option value="May <?php echo date('Y'); ?>">May <?php echo date('Y'); ?></option>
                            <option value="June <?php echo date('Y'); ?>">June <?php echo date('Y'); ?></option>
                            <option value="July <?php echo date('Y'); ?>">July <?php echo date('Y'); ?></option>
                            <option value="August <?php echo date('Y'); ?>">August <?php echo date('Y'); ?></option>
                            <option value="September <?php echo date('Y'); ?>">September <?php echo date('Y'); ?>
                            </option>
                            <option value="October <?php echo date('Y'); ?>">October <?php echo date('Y'); ?></option>
                            <option value="November <?php echo date('Y'); ?>">November <?php echo date('Y'); ?></option>
                            <option value="December <?php echo date('Y'); ?>">December <?php echo date('Y'); ?></option>
                            <option value="January <?php echo date('Y') + 1; ?>">January <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="February <?php echo date('Y') + 1; ?>">February <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="March <?php echo date('Y') + 1; ?>">March <?php echo date('Y') + 1; ?></option>
                            <option value="April <?php echo date('Y') + 1; ?>">April <?php echo date('Y') + 1; ?></option>
                            <option value="May <?php echo date('Y') + 1; ?>">May <?php echo date('Y') + 1; ?></option>
                            <option value="June <?php echo date('Y') + 1; ?>">June <?php echo date('Y') + 1; ?></option>
                            <option value="July <?php echo date('Y') + 1; ?>">July <?php echo date('Y') + 1; ?></option>
                            <option value="August <?php echo date('Y') + 1; ?>">August <?php echo date('Y') + 1; ?></option>
                            <option value="September <?php echo date('Y') + 1; ?>">September <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="October <?php echo date('Y') + 1; ?>">October <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="November <?php echo date('Y') + 1; ?>">November <?php echo date('Y') + 1; ?>
                            </option>
                            <option value="December <?php echo date('Y') + 1; ?>">December <?php echo date('Y') + 1; ?>
                            </option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                    </tbody>
                  </table><br>
                  <button type="submit" class="btn btn-primary btn-block">Initiate Payment</button>
                </div>
              </div>
            </div>
            <p><span style="color:red;"><b><b>NOTE: Please Fill the Tenant-In Form upon Login. Thank You.</b></b></p>
            </span>
          </form>

          <script src="https://js.paystack.co/v1/inline.js"></script>
          <?php include 'configs.php'; ?>
          <script type="text/javascript">
            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener('submit', function (e) {
              e.preventDefault();
              payWithPaystack();
            });

            function payWithPaystack() {
              const email = document.getElementById('email').value;
              const amount = document.getElementById('amount').value; // Amount in KES
              const phone = document.getElementById('phone').value;

              const handler = PaystackPop.setup({
                key: '<?php echo $PublicKey; ?>', // Replace with your public key
                email: email,
                amount: amount * 100, // Paystack expects amount in kobo (for KES, this should be multiplied by 100)
                currency: 'KES', // Kenyan Shillings
                callback: function (response) {
                  // On successful payment, send the response to verify_transaction.php
                  window.location.href = 'verify_transaction.php?reference=' + response.reference + '&email=' + encodeURIComponent(email) + '&amount=' + amount;
                },
                onClose: function () {
                  alert('Payment window closed.');
                }
              });

              handler.openIframe();
            }
          </script>
        </div>
        <!-- End of Page Content -->

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