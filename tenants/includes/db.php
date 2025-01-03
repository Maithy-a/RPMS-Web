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