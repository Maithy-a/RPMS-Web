<?php
$host = "sql10.freesqldatabase.com";
$username = "sql10751931";
$password = "TUxULKYXl5";
$database = "sql10751931";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "DBConnected.";
}
?>
