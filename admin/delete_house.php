<?php
include("conn.php"); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the house to verify its existence
    $query = "SELECT * FROM house WHERE house_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Proceed with deletion
        $deleteQuery = "DELETE FROM house WHERE house_id = ?";
        $deleteStmt = $con->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);
        if ($deleteStmt->execute()) {
            // Success toast notification
            echo "<script>
                toastr.success('House deleted successfully!', 'Success');
                setTimeout(function() {
                    window.location.href = 'houses.php';
                }, 3000);
            </script>";
        } else {
            // Error toast notification
            echo "<script>
                toastr.error('Failed to delete the house. Please try again.', 'Error');
                setTimeout(function() {
                    window.location.href = 'houses.php';
                }, 3000);
            </script>";
        }
        $deleteStmt->close();
    } else {
        // House not found toast notification
        echo "<script>
            toastr.error('House not found.', 'Error');
            setTimeout(function() {
                window.location.href = 'houses.php';
            }, 3000);
        </script>";
    }
    $stmt->close();
} else {
    // Invalid ID toast notification
    echo "<script>
        toastr.error('Invalid house ID.', 'Error');
        setTimeout(function() {
            window.location.href = 'houses.php';
        }, 3000);
    </script>";
}

mysqli_close($con);
?>
