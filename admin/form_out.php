<?php
session_start();
include "../conn.php";
if (!($_SESSION['username'] == "ADMIN")) {
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

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <title>Elsie Rental Management System</title>
  <link rel="stylesheet" href="style.css">
  <link rel="apple-touch-icon" sizes="180x180" href="../res/img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../res/img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../res/img/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="../res/img/favicon_io/site.webmanifest">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
    rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa-solid fa-face-laugh-wink " href="admin_home.php"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Elsie RPMS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin_home.php">
         <i class="bi bi-broadcast"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="bi bi-buildings"></i>
          <span>House</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Details:</h6>
            <a class="collapse-item" href="house_detail.php">House Information</a>
            <a class="collapse-item" href="add_house.php">Add a House</a>
            <a class="collapse-item" href="change_cost.php">Change the Cost of the<br />House</a>
            <a class="collapse-item" href="edit_house.php">Edit House Information</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
          aria-controls="collapseThree">
          <i class="fas fa-clipboard-list"></i>
          <span>Contract</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Details:</h6>
            <a class="collapse-item" href="contract_detail.php">Contract Information</a>
            <a class="collapse-item" href="edit_contract.php">Edit Contract Information<br />(Full)</a>
            <a class="collapse-item" href="edit_contract_part.php">Edit Contract Information<br />(Part)</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
          aria-controls="collapseFour">
        <i class="bi bi-people-fill"></i>
          <span>Tenants</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Details:</h6>
            <a class="collapse-item" href="tenant_detail.php">Tenant Information</a>
            <a class="collapse-item" href="tenant_contact.php">Tenants' Contact</a>
            <a class="collapse-item" href="admin_tenantIn.php">Tenant-In Details</a>
            <a class="collapse-item" href="admin_tenantOut.php">Tenant-Out Details</a>
            <a class="collapse-item" href="edit_tenant.php">Edit Tenant Information</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
          aria-controls="collapseFive">
          <i class="bi bi-wallet2"></i>
          <span>Payment</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Details:</h6>
            <a class="collapse-item" href="payment_detail.php">Payment Information</a>
            <a class="collapse-item" href="edit_pay.php">Edit Payment</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="form_out.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tenant-Out form</span>
        </a>

      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">

        <a class="nav-link" href="send-sms.php">
          <i class="bi bi-chat-left-text"></i>
          <span>Messaging</span></a>
      </li>
      <hr class="sidebar-divider">




      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="a_change.php">
          <i class="fas fa-fw fa-exchange-alt"></i>
          <span>Change Password</span>
        </a>

      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="a_register.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Register</span>
        </a>

      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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
 <nav class=" shadow-sm navbar navbar-expand  topbar mb-4 static-top ">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->



          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>


              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small"><?php
                                                                          $uname = $_SESSION['username'];
                                                                          echo $uname;

                                                                          ?></span>
                <img class="img-profile rounded-circle" src="../res/img/undraw_pic-profile_nr49.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="#">
                  <i class="bi bi-gear-wide"></i>
Settings

                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="bi bi-box-arrow-right"></i>
Logout

                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">Tenant-Out Form.</h1>
          <p style="color:red;"><b><b>Please fill the required information upon tenant leaving the House.</b></b></p>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <tr>
                        <td>
                          Search for a tenant:
                        </td>
                        <td>
                          <select class="custom-select" name="tenant" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <?php
                            $query = "SELECT * FROM contract WHERE status = 'Inactive'";
                            $result = mysqli_query($con, $query);
                            $row1 = mysqli_fetch_assoc($result);
                            do {
                              $tenant_id = $row1['tenant_id'];
                              $query2 = "SELECT * FROM tenant WHERE tenant_id = '$tenant_id'";
                              $result1 = mysqli_query($con, $query2);
                              $row = mysqli_fetch_assoc($result1);
                              do {
                                $id = $row['tenant_id'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $uname = $row['u_name'];
                                echo "<option value = '" . $id . "'>" . $fname . " " . $lname . " (" . $uname . ")" . "</option>";
                                $row = mysqli_fetch_assoc($result1);
                              } while ($row);

                              $row1 = mysqli_fetch_assoc($result);
                            } while ($row1);

                            ?>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          Condition of the Key and its Holder:
                        </td>
                        <td>
                          <select class="custom-select" name="key" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="No key holder">No key holder</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Electricity Remote:
                        </td>
                        <td>
                          <select class="custom-select" name="remote" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="No remote">No remote</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Number of bulbs:
                        </td>
                        <td>
                          <select class="custom-select" name="nbulb" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="0">0</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Bulbs:
                        </td>
                        <td>
                          <select class="custom-select" name="bulb" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Some missing">Some missing</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the paint on the wall:
                        </td>
                        <td>
                          <select class="custom-select" name="paint" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Windows:
                        </td>
                        <td>
                          <select class="custom-select" name="window" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Some broken or missing">Some broken or missing</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Toilet Sink:
                        </td>
                        <td>
                          <select class="custom-select" name="tsink" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Normal Sink:
                        </td>
                        <td>
                          <select class="custom-select" name="wsink" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Door Lock:
                        </td>
                        <td>
                          <select class="custom-select" name="lock" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Condition of the Toilet's Door Lock:
                        </td>
                        <td>
                          <select class="custom-select" name="tlock" style="width:300px;" required>
                            <option value="" disabled selected>Please choose...</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                            <option value="Broken">Broken</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span style="color:red;"><b><b>Please outline in details the concerns pertaining the above
                                items.</b></b></span>
                          <br />Comments:
                        </td>
                        <td>
                          <textarea class='form-control' name="msg" required><?php echo @$msg; ?></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class='btn btn-success btn-user btn-lg' type='submit' name='submit' value='Submit'>
                        </td>
                    </form>
                    <tr>
                      <?php
                      if (isset($_POST['submit'])) {
                        $id = $_POST['tenant'];
                        $query1 = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Inactive'";
                        $result2 = mysqli_query($con, $query1);
                        $row1 = mysqli_fetch_assoc($result2);
                        do {
                          $cid = $row1['contract_id'];
                          $row1 = mysqli_fetch_assoc($result2);
                        } while ($row1);
                        $h_key = $_POST['key'];
                        $remote = $_POST['remote'];
                        $nbulb = $_POST['nbulb'];
                        $bulb = $_POST['bulb'];
                        $paint = $_POST['paint'];
                        $window = $_POST['window'];
                        $tsink = $_POST['tsink'];
                        $wsink = $_POST['wsink'];
                        $lock = $_POST['lock'];
                        $tlock = $_POST['tlock'];

                        $msg = check($_POST['msg']);
                        $date = date('Y-m-d');


                        $query3 = "SELECT * FROM tenant_in WHERE contract_id = '$cid'";
                        $rs = mysqli_query($con, $query3);
                        if (mysqli_num_rows($rs) == 0) {

                          $sql = "INSERT INTO tenant_out(`out_id`, `contract_id`, `stat_keyholder`, `stat_electricityRemote`, `no_bulbs`, `stat_bulbs`, `stat_paint`, `stat_Windows`, `stat_toiletSink`, `stat_washingSink`, `stat_doorLock`, `stat_toiletDoorLock`, `comments`, `date_reg`)
                         VALUES (' ','$cid','$h_key','$remote','$nbulb','$bulb','$paint','$window','$tsink','$wsink','$lock','$tlock','$msg','$date')";
                          mysqli_query($con, $sql);
                          mysqli_close($con);
                          echo "<script type='text/javascript'>alert('Your form has been submitted successfully');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "admin_home.php";</script>';
                        } else {
                          echo "<script type='text/javascript'>alert('You have already filled the form. Thank You.');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "admin_home.php";</script>';
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
          <a class="btn btn-success" href="../logout.php">Logout</a>
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