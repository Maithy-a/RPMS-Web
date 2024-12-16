<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "#tHinkpad8700";  
$dbname = "elsie_db";

$con = new mysqli($host, $user, $password, $dbname, $port);

// Check connection
$message = "";
$toastClass = "";
if ($con->connect_errno) {
    $message = "Connection failed: " . $con->connect_error;
    $toastBgColor = "#FF4C4C";
    $toastTextColor = "#FFFFFF"; 
} else {
    $message = "Connection established";
    $toastBgColor = "#28A745"; 
    $toastTextColor = "#FFFFFF"; 
}
?>