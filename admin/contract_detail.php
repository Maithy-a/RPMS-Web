<?php
session_start();
include "../conn.php";
if (!($_SESSION['username'] == "ADMIN")) {
  echo '<script>window.location.href = "../log-in.php";</script>';
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


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"
    type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa-solid fa-face-laugh-wink fa-beat-fade" href="admin_home.php"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Elsie Rental Management System<sup>Ex</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-home fa-cog"></i>
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
          <i class="fas fa-user fa-cog"></i>
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
          <i class="fas fa-dollar-sign fa-cog"></i>
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
          <i class="fas fa-fw fa-comments"></i>
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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                $uname = $_SESSION['username'];
                echo "<b><b>" . $uname . "</b></b>";

                ?></span>
                <img class="img-profile rounded-circle" src="../res/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
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
          <h1 class="h3 mb-2 text-gray-800">Contracts</h1>

          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Contract ID</th>
                      <th>Name</th>
                      <th>House Name</th>
                      <th>Duration of Occupation in months</th>
                      <th>Total Rent(Ksh.)</th>
                      <th>Terms of Payment</th>
                      <th>Rent per Term(Ksh.)</th>
                      <th>Beginning of Contract</th>
                      <th>End of Contract</th>
                      <th>Date of signing the Contract</th>
                      <th>Contract Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM contract";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $t_id = $row['tenant_id'];
                      $c_id = $row['contract_id'];
                      $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                      $result1 = mysqli_query($con, $query);
                      $row1 = mysqli_fetch_assoc($result1);
                      do {
                        $fname = $row1['fname'];
                        $lname = $row1['lname'];
                        $uname = $row1['u_name'];
                        $row1 = mysqli_fetch_assoc($result1);
                      } while ($row1);

                      $h_id = $row['house_id'];
                      $query1 = "SELECT * FROM house WHERE house_id = '$h_id'";
                      $result2 = mysqli_query($con, $query1);
                      $row2 = mysqli_fetch_assoc($result2);
                      do {
                        $hname = $row2['house_name'];
                        $row2 = mysqli_fetch_assoc($result2);
                      } while ($row2);

                      $dur = $row['duration_month'];
                      $total1 = 0;
                      $total = $row['total_rent'];
                      for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
                        $total1 += $total;
                      }
                      $term = $row['terms'];
                      $per = $row['rent_per_term'];
                      $start = $row['start_day'];
                      $end = $row['end_day'];
                      $sign = $row['date_contract_sign'];
                      $stat = $row['status'];
                      $cid = $row['contract_id'];
                      if ($stat == "Active") {
                        echo '<tr>';
                        echo '<td>' . $cid . '</td>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $hname . '</td>';
                        echo '<td>' . $dur . '</td>';
                        echo '<td>' . number_format($total) . '/=</td>';
                        echo '<td>' . $term . '</td>';
                        echo '<td>' . number_format($per) . '/=</td>';
                        echo '<td>' . $start . '</td>';
                        echo '<td>' . $end . '</td>';
                        echo '<td>' . $sign . '</td>';
                        echo "<td style = 'color:green;'>" . $stat . "</td>";
                        echo "<td align = 'center'><a href='delete_contract.php?id=" . $row['contract_id'] . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='edit_contract.php?id=" . $row['tenant_id'] . "' class='btn btn-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                        echo '</tr>';
                      } else {
                        echo '<tr>';
                        echo '<td>' . $cid . '</td>';
                        echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                        echo '<td>' . $hname . '</td>';
                        echo '<td>' . $dur . '</td>';
                        echo '<td>' . number_format($total) . '/=</td>';
                        echo '<td>' . $term . '</td>';
                        echo '<td>' . number_format($per) . '/=</td>';
                        echo '<td>' . $start . '</td>';
                        echo '<td>' . $end . '</td>';
                        echo '<td>' . $sign . '</td>';
                        echo "<td style = 'color:red;'>" . $stat . "</td>";
                        echo "<td align = 'center'><a href='delete_contract.php?id=" . $row['contract_id'] . "' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></td>";
                        echo '</tr>';
                      }




                      $row = mysqli_fetch_assoc($result);
                    } while ($row);


                    ?>

                  </tbody>
                </table>

                <hr>
                <br />
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
                    <?php
                    $sql = "SELECT SUM(total_rent) FROM contract";
                    $query = mysqli_query($con, $sql);
                    $res = mysqli_fetch_assoc($query);

                    do {
                      $total = $res['SUM(total_rent)'];
                      $res = mysqli_fetch_assoc($query);
                    } while ($res);

                    echo '<tr>';
                    echo '<td><b><b>EXPECTED INCOME</b></b></td>';
                    echo "<td><b><b><span style = 'color:orange;'>Ksh. " . number_format($total) . '/=</b></b></td>';
                    echo '</tr>';

                    $sql1 = "SELECT * FROM contract WHERE status = 'Active'";
                    $result1 = mysqli_query($con, $sql1);
                    echo '<tr>';
                    echo "<td><b><b>TOTAL NUMBER OF <span style = 'color:green;'>ACTIVE</span> CONTRACTS</b></b></td>";
                    echo "<td><b><b><span style = 'color:green;'>" . mysqli_num_rows($result1) . "</span></b></b></td>";
                    echo '</tr>';

                    $sql2 = "SELECT * FROM contract WHERE status = 'Inactive'";
                    $result2 = mysqli_query($con, $sql2);
                    echo '<tr>';
                    echo "<td><b><b>TOTAL NUMBER OF <span style = 'color:red;'>INACTIVE</span> CONTRACTS</b></b></td>";
                    echo "<td><b><b><span style = 'color:red;'>" . mysqli_num_rows($result2) . "</span></b></b></td>";
                    echo '</tr>';


                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- End of Footer -->
      </div>

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://your-cdn-url.com/path/to/datatables-demo.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <script> $(document).ready(function () { $('#dataTable').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true }); }); </script>

</body>

</html>