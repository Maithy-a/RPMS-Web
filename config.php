<?php
$host = getenv('DB_HOST') ?: 'sql8.freemysqlhosting.net';
$username = getenv('DB_USER') ?: 'sql8751494';
$password = getenv('DB_PASS') ?: 'w51IMewpGY';
$database = getenv('DB_NAME') ?: 'sql8751494';
$port = getenv('DB_PORT') ?: 3306;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable exceptions for mysqli

try {
    // Create a new mysqli instance
    $conn = new mysqli($host, $username, $password, $database, $port);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully"; // Optional: For debugging purposes

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
} finally {
    // Close the connection if it's established
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>