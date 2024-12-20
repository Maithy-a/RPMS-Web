
<?php
session_start();
include "../conn.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM contract WHERE contract_id = ?");
    $stmt->bind_param("i", $id); // "i" indicates the type is integer

    if ($stmt->execute()) {
        echo "<script>toastr.error('DELETED.','Error');</script>";
        echo '<script>window.location.href = "contract_detail.php";</script>';
    } else {
        echo "<script>toastr.error('FAILED: " . htmlspecialchars(mysqli_error($con)) . ".', 'Error');</script>";
        echo '<script>window.location.href = "contract_detail.php";</script>';
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "<script>toastr.error('Invalid ID.','Error');</script>";
    echo '<script>window.location.href = "contract_detail.php";</script>';
}

mysqli_close($con); // Close the connection
?>