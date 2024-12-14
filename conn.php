<?php
// Ensure you're using mysqli
$con = mysqli_connect("sql8.freemysqlhosting.net", "sql8751494", "w51IMewpGY", "sql8751494");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>