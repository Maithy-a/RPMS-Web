<?php
session_start();
include('../conn.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Renew Contract</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION['user_id'])) {
        echo '<script>window.location.href = "../login.php";</script>';
        exit();
    }

    if (isset($_POST['renew'])) {
        $contract_id = $_POST['contract_id'];
        $tenant_id = $_POST['tenant_id'];
        $house_id = $_POST['house_id'];
        $duration_month = $_POST['duration_month'];
        $total_rent = $_POST['total_rent'];
        $terms = $_POST['terms'];
        $rent_per_term = $_POST['rent_per_term'];
        $start_day = $_POST['start_day'];
        $end_day = $_POST['end_day'];

        $sql = "INSERT INTO contract (tenant_id, house_id, duration_month, total_rent, terms, rent_per_term, start_day, end_day, date_contract_sign, status) VALUES ('$tenant_id', '$house_id', '$duration_month', '$total_rent', '$terms', '$rent_per_term', '$start_day', '$end_day', NOW(), 'Active')";

        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE contract SET status = 'Inactive' WHERE contract_id = '$contract_id'";
            $conn->query($sql);
            echo "<script>alert('Contract Renewed Successfully')</script>";
        } else {
            echo "<script>alert('Error Renewing Contract')</script>";
        }
    }

    $sql = "SELECT * FROM contract WHERE status = 'Active' AND tenant_id = '" . $_SESSION['tenant_id'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $contract_id = $row['contract_id'];
            $tenant_id = $row['tenant_id'];
            $house_id = $row['house_id'];
            $duration_month = $row['duration_month'];
            $total_rent = $row['total_rent'];
            $terms = $row['terms'];
            $rent_per_term = $row['rent_per_term'];
            $start_day = $row['start_day'];
            $end_day = $row['end_day'];
            $date_contract_sign = $row['date_contract_sign'];
        }
    } else {
        echo "<script>alert('No Active Contract Found')</script>";
        echo '<script>window.location.href = "../login.php";</script>';
        exit();
    }

    $conn->close();
    ?>
    <div class="container">
        <h2>Renew Contract</h2>
        <form method="post" action="">
            <input type="hidden" name="contract_id" value="<?php echo $contract_id; ?>">
            <input type="hidden" name="tenant_id" value="<?php echo $tenant_id; ?>">
            <input type="hidden" name="house_id" value="<?php echo $house_id; ?>">

            <div class="form-group">
                <label for="duration_month">Duration (Months):</label>
                <input type="number" class="form-control" id="duration_month" name="duration_month"
                    value="<?php echo $duration_month; ?>" required>
            </div>

            <div class="form-group">
                <label for="total_rent">Total Rent:</label>
                <input type="number" class="form-control" id="total_rent" name="total_rent"
                    value="<?php echo $total_rent; ?>" required>
            </div>

            <div class="form-group">
                <label for="terms">Terms:</label>
                <input type="number" class="form-control" id="terms" name="terms" value="<?php echo $terms; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="rent_per_term">Rent per Term:</label>
                <input type="number" class="form-control" id="rent_per_term" name="rent_per_term"
                    value="<?php echo $rent_per_term; ?>" required>
            </div>

            <div class="form-group">
                <label for="start_day">Start Date:</label>
                <input type="date" class="form-control" id="start_day" name="start_day"
                    value="<?php echo $start_day; ?>" required>
            </div>

            <div class="form-group">
                <label for="end_day">End Date:</label>
                <input type="date" class="form-control" id="end_day" name="end_day" value="<?php echo $end_day; ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-primary" name="renew">Renew Contract</button>
        </form>
    </div>
</body>

</html>