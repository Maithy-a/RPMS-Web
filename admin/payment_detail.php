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
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'includes/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">Payments</h1>

          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Reference Number</th>
                      <th>Amount Paid (Ksh)</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Date Payed</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM payment";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                      $t_id = $row['tenant_id'];
                      $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                      $result1 = mysqli_query($con, $query);
                      $row1 = mysqli_fetch_assoc($result1);
                      do {
                        $fname = $row1['fname'];
                        $lname = $row1['lname'];
                        $uname = $row1['u_name'];
                        $row1 = mysqli_fetch_assoc($result1);
                      } while ($row1);

                      $ref = $row['ref_no'];
                      $amount = $row['amount'];
                      $from = $row['pay_from'];
                      $to = $row['pay_to'];
                      $date = $row['date'];
                      echo '<tr>';
                      echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
                      echo '<td>' . $ref . '</td>';
                      echo '<td>' . number_format($amount) . '/=</td>';
                      echo '<td>' . $from . '</td>';
                      echo '<td>' . $to . '</td>';
                      echo '<td>' . $date . '</td>';
                      echo "<td align = 'center'><a href='edit_pay.php?id=" . $row['payment_id'] . "' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i></a></td>";
                      echo '</tr>';
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
                    $sql = "SELECT SUM(amount) FROM payment";
                    $query = mysqli_query($con, $sql);
                    $res = mysqli_fetch_assoc($query);

                    do {
                      $total = $res['SUM(amount)'];
                      $res = mysqli_fetch_assoc($query);
                    } while ($res);

                    echo '<tr>';
                    echo '<td>TOTAL INCOME GENERATED </td>';
                    echo "<td><span style = 'color:green;'>Ksh. " . number_format($total) . '/= </td>';
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
        <?php include 'includes/footer.php'; ?>
  
      </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>




<?php include 'includes/script.php';?>
<?php include 'includes/DataTables.php';?>
 

</body>

</html>