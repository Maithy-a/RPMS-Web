<?php
include("includes/session.php");
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
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Total Number of Tenants -->
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="info-box">
                <span class="info-box-icon bg-success">
                  <i class="fa-solid fa-users-viewfinder"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Number of Tenants</span>
                  <span class="info-box-number">
                    <?php
                    $sql = "SELECT * FROM tenant";
                    $query = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($query);
                    echo $num;
                    ?>
                  </span>
                </div>
              </div>
            </div>

            <!-- Total Number of Houses -->
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="info-box">
                <span class="info-box-icon bg-success">
                  <i class="bi bi-buildings"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Number of Houses</span>
                  <span class="info-box-number">
                    <?php
                    $sql = "SELECT * FROM house";
                    $query = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($query);
                    echo $num;
                    ?>
                  </span>
                </div>
              </div>
            </div>

            <!-- Total Income -->
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="info-box">
                <span class="info-box-icon bg-success">
                  <i class="bi bi-wallet2"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Income</span>
                  <span class="info-box-number">
                    <?php
                    $sql = "SELECT SUM(amount) AS total_income FROM payment";
                    $query = mysqli_query($con, $sql);
                    $res = mysqli_fetch_assoc($query);
                    $total_income = $res['total_income'] ?? 0; // Use 0 if NULL
                    echo "Ksh. " . number_format($total_income) . "/=";
                    ?>
                  </span>
                </div>
              </div>
            </div>


            <!-- Number of Active Contracts -->
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="info-box">
                <span class="info-box-icon bg-success">
                  <i class="fa-solid fa-file-signature"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Active Contracts</span>
                  <span class="info-box-number">
                    <?php
                    $sql = "SELECT * FROM contract WHERE status = 'Active'";
                    $query = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($query);
                    echo $num;
                    ?>
                  </span>
                </div>
              </div>
            </div>

          </div>


          <!-- Area Chart -->
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-gray">Total Payments Per Month</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>


      </div>
      <!-- Footer -->
      <?php include 'includes/footer.php'; ?>
    </div>
    <!-- End of Main Content -->
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