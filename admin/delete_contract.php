<?php
session_start();
include "../conn.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM contract WHERE contract_id = ?");
    $stmt->bind_param("i", $id); // "i" indicates the type is integer

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('DELETED.');</script>";
        echo '<script>window.location.href = "contract_detail.php";</script>';
    } else {
        echo "<script type='text/javascript'>alert('FAILED: " . htmlspecialchars(mysqli_error($con)) . ".');</script>";
        echo '<script>window.location.href = "contract_detail.php";</script>';
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "<script type='text/javascript'>alert('Invalid ID.');</script>";
    echo '<script>window.location.href = "contract_detail.php";</script>';
}

mysqli_close($con); // Close the connection
?>
