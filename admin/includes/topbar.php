<?php
include("../conn.php");
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$uname = $_SESSION['username'];

$query = "SELECT email FROM user WHERE u_name = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
  $user_email = $result->fetch_assoc()['email'];
} else {
  $user_email = "Not Found";
}
?>

<nav class="navbar navbar-expand  topbar mb-4 static-top shadow-sm">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none ">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Divider -->
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-white small">
          <?php echo htmlspecialchars($uname); ?>
        </span>
        <img class="img-profile rounded-outline-circle" src="../res/img/undraw_pic-profile_nr49.svg" alt="User Avatar">
      </a>

      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <div class="dropdown-header">
          Logged in as:
          <?php echo htmlspecialchars($uname); ?>
          <br>
          <small style="color:#003459;"><?php echo htmlspecialchars($user_email); ?></small>
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
          <i class="fas fa-user-circle fa-sm fa-fw mr-2 "></i> Profile
        </a>
        <a class="dropdown-item" href="#">
        <i class="bi bi-gear-wide"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </div>
    </li>

  </ul>
</nav>

 <!-- Logout Modal -->
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
        <a class="btn btn-outline-success" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>

