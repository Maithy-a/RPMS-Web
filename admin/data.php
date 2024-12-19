<?php
$host = getenv('DB_HOST') ?: "localhost";
$port = getenv('DB_PORT') ?: "3306"; // Default port is 3306
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: "#tHinkpad8700";
$dbname = getenv('DB_NAME') ?: "elsie_db";

try {
    // Create a new PDO instance with the port included
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get monthly payment totals
    $query = "SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(amount) AS total 
              FROM payment 
              GROUP BY month";
    $stmt = $pdo->query($query);

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare data for the chart
    $months = array_column($results, 'month');
    $totals = array_column($results, 'total');

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode(['months' => $months, 'totals' => $totals]);

} catch (PDOException $e) {
    // Log the error (example: error_log())
    error_log("Database error: " . $e->getMessage());

    // Send a generic error message to the client
    http_response_code(500);
    echo json_encode(['error' => 'Internal Server Error']);
} finally {
    // Close the connection
    $pdo = null;
}
?>
