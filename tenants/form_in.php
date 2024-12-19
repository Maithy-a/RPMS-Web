<?php
session_start();
include "../conn.php";
if(!$_SESSION['username']){
  echo '<script>window.location.href = "../login.php";</script>';
  exit();
}
function check($data){
  $data= trim($data);
  $data= htmlspecialchars($data);
  $data= stripslashes($data);
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
   <link rel="apple-touch-icon" sizes="180x180" href="../res/img/favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../res/img/favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../res/img/favicon_io/favicon-16x16.png">
<link rel="manifest" href="../res/img/favicon_io/site.webmanifest">

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-face-laugh-wink fa-beat-fade" href="home.php"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Elsie Rental Management System<sup>Ex</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="u_change.php">
          <i class="fas fa-fw fa-exchange-alt"></i>
          <span>Change Password</span>
        </a>

      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="form_in.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tenant-In form</span>
        </a>

      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="paystack.php">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Pay Here</span></a>
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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white small"><?php

                $uname = @$_SESSION['username'];
                $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                $result = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($result);
                do{
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $full = $fname." ".$lname;
                  echo $full;

                  $row = mysqli_fetch_assoc($result);
                }while ($row);
                ?></span>
                <img class="img-profile rounded-circle" src="../res/img/undraw_pic-profile_nr49.svg">
              </a>
             <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800" >Tenant-In Form.</h1>
          <p style="color:red;"><b><b>Please fill the required information upon entering the House.</b></b></p>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                    <tr>
                      <td>
                        Condition of the Key and its Holder:
                      </td>
                      <td>
                        <select class="custom-select" name="key" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "No key holder">No key holder</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Electricity Remote:
                      </td>
                      <td>
                        <select class="custom-select" name="remote" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "No remote">No remote</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Number of bulbs:
                      </td>
                      <td>
                        <select class="custom-select" name="nbulb" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "1">1</option>
                          <option value = "2">2</option>
                          <option value = "3">3</option>
                          <option value = "0">0</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Bulbs:
                      </td>
                      <td>
                        <select class="custom-select" name="bulb" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "Some missing">Some missing</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the paint on the wall:
                      </td>
                      <td>
                        <select class="custom-select" name="paint" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Windows:
                      </td>
                      <td>
                        <select class="custom-select" name="window" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "Some broken or missing">Some broken or missing</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Toilet Sink:
                      </td>
                      <td>
                        <select class="custom-select" name="tsink" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "Broken">Broken</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Normal Sink:
                      </td>
                      <td>
                        <select class="custom-select" name="wsink" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "Broken">Broken</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Door Lock:
                      </td>
                      <td>
                        <select class="custom-select" name="lock" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "Broken">Broken</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Condition of the Toilet's Door Lock:
                      </td>
                      <td>
                        <select class="custom-select" name="tlock" style="width:300px;" required>
                          <option value = "" disabled selected>Please choose...</option>
                          <option value = "Good">Good</option>
                          <option value = "Average">Average</option>
                          <option value = "Bad">Bad</option>
                          <option value = "Broken">Broken</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Water Units:
                      </td>
                      <td>
                        <input type="text" class="form-control form-control-user" name="units" required>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span style="color:red;"><b><b>Please outline in details the concerns pertaining the above  items.</b></b></span>
                        <br/>Comments:
                      </td>
                      <td>
                        <textarea class='form-control' name="msg"  required><?php echo @$msg; ?></textarea>
                      </td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit' value='Submit'></td>
                    </form>
                    <tr>
                    <?php
                    if (isset($_POST['submit'])) {
                      $query2 = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                      $result1 = mysqli_query($con, $query2);
                      $row=mysqli_fetch_assoc($result1);
                      do{
                        $id = $row['tenant_id'];
                        $row = mysqli_fetch_assoc($result1);
                      }while ($row);


                      $query1 = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Active'";
                      $result2 = mysqli_query($con, $query1);
                      $row1=mysqli_fetch_assoc($result2);
                      do{
                        $cid = $row1['contract_id'];
                        $row1 = mysqli_fetch_assoc($result2);
                      }while ($row1);
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
                      $units = check($_POST['units']);
                      $msg = check($_POST['msg']);
                      $date = date('Y-m-d');
                      $status = 'Checked';

                      $query3 = "SELECT * FROM tenant_in WHERE contract_id = '$cid'";
                      $rs = mysqli_query($con, $query3);
                      if(mysqli_num_rows($rs) == 0){
                        if(!is_numeric($units)){
                          echo "<script type='text/javascript'>alert('Units must be in numbers');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "form_in.php";</script>';
                        }else {
                          $sql = "INSERT INTO tenant_in(`in_id`, `contract_id`, `stat_keyholder`, `stat_electricityRemote`, `no_bulbs`, `stat_bulbs`, `stat_paint`, `stat_Windows`, `stat_toiletSink`, `stat_washingSink`, `stat_doorLock`, `stat_toiletDoorLock`, `water_units`, `comments`, `date_reg`, `status`)
                          VALUES (' ','$cid','$h_key','$remote','$nbulb','$bulb','$paint','$window','$tsink','$wsink','$lock','$tlock','$units','$msg','$date','$status')";
                          mysqli_query($con, $sql);
                          mysqli_close($con);
                          echo "<script type='text/javascript'>alert('Your form has been submitted successfully');</script>";
                          echo '<style>body{display:none;}</style>';
                          echo '<script>window.location.href = "home.php";</script>';
                        }

                      }else {
                        echo "<script type='text/javascript'>alert('You have already filled the form. Thank You.');</script>";
                        echo '<style>body{display:none;}</style>';
                        echo '<script>window.location.href = "home.php";</script>';
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div>

  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
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
