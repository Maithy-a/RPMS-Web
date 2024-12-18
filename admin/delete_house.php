<?php
session_start();
include "../conn.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the house status
    $sql = "SELECT status FROM house WHERE house_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $stat = $row['status'];

        // Delete the house
        $sql = "DELETE FROM house WHERE house_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // If the house was occupied, update contracts
            if ($stat == 'Occupied') {
                echo "<script type='text/javascript'>alert('DELETED.');</script>";
                echo '<script>window.location.href = "house_detail.php";</script>';

                // Update related contracts
                $query = "SELECT tenant_id FROM contract WHERE house_id = ?";
                $stmt1 = $con->prepare($query);
                $stmt1->bind_param("i", $id);
                $stmt1->execute();
                $result1 = $stmt1->get_result();

                while ($row1 = $result1->fetch_assoc()) {
                    $tid = $row1['tenant_id'];
                    // Update each contract status to inactive
                    $sqlUpdate = "UPDATE contract SET status = 'Inactive' WHERE tenant_id = ?";
                    $stmtUpdate = $con->prepare($sqlUpdate);
                    $stmtUpdate->bind_param("i", $tid);
                    $stmtUpdate->execute();
                    $stmtUpdate->close();
                }
                $stmt1->close();
            } else {
                echo "<script type='text/javascript'>alert('DELETED.');</script>";
                echo '<script>window.location.href = "house_detail.php";</script>';
            }
        } else {
            echo "<script type='text/javascript'>alert('FAILED: " . htmlspecialchars(mysqli_error($con)) . ".');</script>";
            echo '<script>window.location.href = "house_detail.php";</script>';
        }
    } else {
        echo "<script type='text/javascript'>alert('House not found.');</script>";
        echo '<script>window.location.href = "house_detail.php";</script>';
    }

    // Close prepared statements
    $stmt->close();
} else {
    echo "<script type='text/javascript'>alert('Invalid ID.');</script>";
    echo '<script>window.location.href = "house_detail.php";</script>';
}

mysqli_close($con); // Close the connection
?>
