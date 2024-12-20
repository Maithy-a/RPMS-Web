<?php
include("includes/session.php");

if (isset($_POST['smsg'])) {
  $pno = $_POST['pno'];
  $msg = $_POST['msg'];
  // $basic  = new \Nexmo\Client\Credentials\Basic('855de446', 'iKYHA4zYzabA4VKb');
  // $client = new \Nexmo\Client($basic);

  try {
    $message = $client->message()->send([
      'to' => "$pno",
      'from' => '254717812676',
      'text' => "$msg"
    ]);

    $response = $message->getResponseData();

    if ($response['messages'][0]['status'] == 0) {
      echo "<script> alert('The message was sent successfully');</script>";
    } else {
      echo "<script> alert('The message failed!!!');</script>";
    }
  } catch (Exception $e) {
    echo "<script> alert('The message was not sent!!!');</script>";
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'?>

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
      <?php include 'includes/topbar.php';?>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="waiting.php">&larr; Back to Dashboard</a>
          </div>
          <p class="mb-4">For more information or help please kindly contact us through:<br /><br /><b>Phone Number:
              +255 (0) 756 777 777.<br />Email Address: rhms123@hotmail.com.</b></p>
        </div>
        <!-- /.container-fluid -->

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



  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>


  <?php include 'includes/script.php'; ?>
  <?php include 'includes/DataTables.php'; ?>

</body>

</html>