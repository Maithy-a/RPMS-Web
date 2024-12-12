<?php
$host = getenv('DB_HOST') ?: "sql8.freemysqlhosting.net";
$username = getenv('DB_USER') ?: "sql8751494";
$password = getenv('DB_PASS') ?: "w51IMewpGY";
$dbname = getenv('DB_NAME') ?: "sql8751494";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Database connection failed. Please try again later.");
}

mysqli_set_charset($conn, "utf8mb4");
?>