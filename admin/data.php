<?php
$host = getenv('DB_HOST') ?: "sql8.freemysqlhosting.net";
$username = getenv('DB_USER') ?: "sql8751494";
$password = getenv('DB_PASS') ?: "w51IMewpGY";
$dbname = getenv('DB_NAME') ?: "sql8751494";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to get monthly payment totals
    $query = "SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(amount) AS total 
              FROM payment 
              GROUP BY month";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare data for the chart
    $months = array_column($results, 'month');
    $totals = array_column($results, 'total');

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode(['months' => $months, 'totals' => $totals]);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
} finally {
    // Optionally close the connection
    $pdo = null;
}
?>
