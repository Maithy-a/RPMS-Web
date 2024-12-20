<?php
session_start();
include "../conn.php";

// Role-based access control
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "Administrator") {
    header("Location: ../log-in.php");
    exit();
}

function check($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>