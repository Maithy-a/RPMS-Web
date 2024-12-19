<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "#tHinkpad8700";
$dbname = "elsie_db";

$con = new mysqli($host, $user, $password, $dbname, $port);

// Check connection 
$message = "";

if ($con->connect_errno) {
    $message = "Connection failed: " . $con->connect_error;
} else {
    $message = " ";
}

