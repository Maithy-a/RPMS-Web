<?php
session_start();
include "conn.php";

function check($data)
{
    global $con;
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = mysqli_real_escape_string($con, $data);
    return $data;
}

if (isset($_POST["login"])) {
    $uname = $_POST['username'];
    $pword = md5($_POST['password']);
    $sql = "SELECT * FROM tenant WHERE u_name = '$uname' AND p_word = '$pword'";
    $sql1 = "SELECT * FROM user WHERE u_name = '$uname' AND pword = '$pword'";
    $query = mysqli_query($con, $sql);
    $query1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($query);
    $row1 = mysqli_fetch_assoc($query1);
    $role = '';
    while ($row1) {
        $role = $row1['role'];
        $row1 = mysqli_fetch_assoc($query1);
    }

    while ($row) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $stat = $row['status'];
        $id = $row['tenant_id'];
        $sql2 = "SELECT * FROM contract WHERE tenant_id = '$id'";
        $query2 = mysqli_query($con, $sql2);
        $row1 = mysqli_fetch_assoc($query2);

        while ($row1) {
            $end_date = $row1['end_day'];
            $h_id = $row1['house_id'];
            $row1 = mysqli_fetch_assoc($query2);
        }
        $row = mysqli_fetch_assoc($query);
    }

    if ((mysqli_num_rows($query) == 1) || (mysqli_num_rows($query1) == 1)) {
        if ($role == "Administrator") {
            $_SESSION['username'] = $uname;
            echo "<script type='text/javascript'>alert('Welcome back: $uname!');</script>";
            echo '<style>body{display:none;}</style>';
            echo '<script>window.location.href = "admin/admin_home.php";</script>';
        } elseif ($role == "Manager") {
            $_SESSION['username'] = $uname;
            echo "<script type='text/javascript'>alert('Welcome back: $uname!');</script>";
            echo '<style>body{display:none;}</style>';
            echo '<script>window.location.href = "manager/manager_home.php";</script>';
        } else {
            if ($stat == 0) {
                $_SESSION['username'] = $uname;
                echo "<script type='text/javascript'>alert('Welcome $fname $lname!');</script>";
                echo '<style>body{display:none;}</style>';
                echo '<script>window.location.href = "tenants/initial_payment.php";</script>';
            } elseif ($stat == 1) {
                $_SESSION['username'] = $uname;
                echo "<script type='text/javascript'>alert('Welcome $fname $lname!');</script>";
                echo '<style>body{display:none;}</style>';
                echo '<script>window.location.href = "tenants/home.php";</script>';
            } elseif ($stat == 2) {
                $_SESSION['username'] = $uname;
                echo "<script type='text/javascript'>alert('Welcome $fname $lname!');</script>";
                echo '<style>body{display:none;}</style>';
                echo '<script>window.location.href = "tenants/waiting.php";</script>';
            } elseif ((date('Y-m-d') > $end_date) && $stat == 1) {
                $sql3 = "UPDATE tenant SET status = '3' WHERE tenant_id = '$id'";
                mysqli_query($con, $sql3);
                $sql5 = "UPDATE contract SET status ='Inactive' WHERE status = 'Active' AND tenant_id = '$id'";
                mysqli_query($con, $sql5);
                $sql5 = "UPDATE house SET status ='Empty' WHERE house_id = '$h_id'";
                mysqli_query($con, $sql5);
                $_SESSION['username'] = $uname;
                echo "<script type='text/javascript'>alert('Welcome $fname $lname! Your contract has expired. To access the system please renew the contract.');</script>";
                echo '<style>body{display:none; color:red;}</style>';
                echo '<script>window.location.href = "tenants/renew_contract.php";</script>';
            } elseif ($stat == 3) {
                $_SESSION['username'] = $uname;
                echo "<script type='text/javascript'>alert('Welcome $fname $lname! Your contract has expired. To access the system please renew the contract.');</script>";
                echo '<style>body{display:none;}</style>';
                echo '<script>window.location.href = "tenants/renew_contract.php";</script>';
            }
        }
        mysqli_close($con);
        $uname = "";
    } else {
        echo "<script style='color:red;'> alert('Incorrect Username or Password!!!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elsie Rental Management System</title>
    <link rel="icon" href="res/img/office.png">
    <link rel="stylesheet" href="res/css/loader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
        rel="stylesheet">
</head>

<body>
    <div class="loader">
        <div></div>
        <div></div>
    </div>
    <div class="blurred-content">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img src="res/img/house.jpg" alt="Rental House" width="500" height="530"
                                        style="opacity;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4"><b><b>Elsie Rental Management System</b>
                                            </h1>
                                        </div>
                                        <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    name="username" aria-describedby="emailHelp"
                                                    value="<?php echo @$uname; ?>" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" placeholder="Password">
                                            </div>
                                            <input class="btn btn-primary btn-user btn-block" type="submit" name="login"
                                                value="Login">
                                        </form>

                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Create an Account!</a>
                                        </div>

                                        <div class="text-center">
                                            <a class="small" href="index.php">Back Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sb-admin-2@latest/js/sb-admin-2.min.js"></script>

        <script>
            window.addEventListener('load', function () {
                setTimeout(function () {
                    document.querySelector('.loader').style.display = 'none';
                    document.querySelector('.blurred-content').style.filter = 'none';
                }, 2000);
            });
        </script>
</body>

</html>