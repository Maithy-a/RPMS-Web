<?php
include('conn.php');

if (isset($_POST['house_id'])) {
  $house_id = $_POST['house_id'];
  $sql = "SELECT price FROM house WHERE house_id = '$house_id'";
  $result = mysqli_query($con, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    echo $row['price'];
  } else {
    echo "0";
  }
}
?>