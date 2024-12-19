<?php
session_start();
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elsie Executive.</title>
    <link rel="apple-touch-icon" sizes="180x180" href="res/img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="res/img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="res/img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="res/img/favicon_io/site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css"
        rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
    <?php

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
                echo "
            <script>
                toastr.options = {
                    'closeButton': true,
                    'progressBar': true,
                    'positionClass': 'toast-top-right',
                    'timeOut': '5000'
                };
                toastr.success('Welcome back: $uname!', 'Login Successful');
                setTimeout(function() {
                    window.location.href = 'admin/admin_home.php';
                }, 3000);
            </script>";
            } elseif ($role == "Manager") {
                $_SESSION['username'] = $uname;
                echo "
            <script>
                toastr.options = {
                    'closeButton': true,
                    'progressBar': true,
                    'positionClass': 'toast-top-right',
                    'timeOut': '5000'
                };
                toastr.success('Welcome back: $uname!', 'Login Successful');
                setTimeout(function() {
                    window.location.href = 'manager/manager_home.php';
                }, 3000);
            </script>";
            } else {
                if ($stat == 0) {
                    $_SESSION['username'] = $uname;
                    echo "
                <script>
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '5000'
                    };
                    toastr.success('Welcome $fname $lname!', 'Login Successful');
                    setTimeout(function() {
                        window.location.href = 'tenants/initial_payment.php';
                    }, 3000);
                </script>";
                } elseif ($stat == 1) {
                    $_SESSION['username'] = $uname;
                    echo "
                <script>
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '5000'
                    };
                    toastr.success('Welcome $fname $lname!', 'Login Successful');
                    setTimeout(function() {
                        window.location.href = 'tenants/home.php';
                    }, 3000);
                </script>";
                } elseif ($stat == 2) {
                    $_SESSION['username'] = $uname;
                    echo "
                <script>
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '5000'
                    };
                    toastr.success('Welcome $fname $lname!', 'Login Successful');
                    setTimeout(function() {
                        window.location.href = 'tenants/waiting.php';
                    }, 3000);
                </script>";
                } elseif ((date('Y-m-d') > $end_date) && $stat == 1) {
                    $sql3 = "UPDATE tenant SET status = '3' WHERE tenant_id = '$id'";
                    mysqli_query($con, $sql3);
                    $sql5 = "UPDATE contract SET status ='Inactive' WHERE status = 'Active' AND tenant_id = '$id'";
                    mysqli_query($con, $sql5);
                    $sql5 = "UPDATE house SET status ='Empty' WHERE house_id = '$h_id'";
                    mysqli_query($con, $sql5);
                    $_SESSION['username'] = $uname;
                    echo "
                <script>
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '7000'
                    };
                    toastr.warning('Welcome $fname $lname! Your contract has expired. Please renew to access the system.', 'Contract Expired');
                    setTimeout(function() {
                        window.location.href = 'tenants/renew_contract.php';
                    }, 5000);
                </script>";
                } elseif ($stat == 3) {
                    $_SESSION['username'] = $uname;
                    echo "
                <script>
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '7000'
                    };
                    toastr.warning('Welcome $fname $lname! Your contract has expired. Please renew to access the system.', 'Contract Expired');
                    setTimeout(function() {
                        window.location.href = 'tenants/renew_contract.php';
                    }, 5000);
                </script>";
                }
            }
            mysqli_close($con);
            $uname = "";
        } else {
            echo "
        <script>
            toastr.options = {
                'closeButton': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'timeOut': '5000'
            };
            toastr.error('Incorrect Username or Password!!!', 'Login Failed');
        </script>";
        }

    }
    ?>

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
                                        style="opacity:1;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <figure class="text-center">
                                            <blockquote class="blockquote">
                                                <h2 class="h2 text-gray-900 mb-4">Elsie Apartments</h2>
                                            </blockquote>
                                            <figcaption class="blockquote-footer">
                                                Good to see you back, welcome!
                                            </figcaption>
                                        </figure><br>

                                        <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="input-group mb-3">
                                                <!-- username input -->
                                                <div class="input-group-text" id="btnGroupAddon"><i
                                                        class="bi bi-at"></i>
                                                </div>
                                                <input type="text" id="user-input" class="form-control " name="username"
                                                    aria-label="Username" aria-describedby="btnGroupAddon"
                                                    value="<?php echo @$uname; ?>" placeholder="Username" required
                                                    autocomplete="off">
                                            </div>

                                            <!-- Password input -->
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="btnGroupAaddon"><i
                                                        class="bi bi-shield-lock"></i></span>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password" aria-label="Password"
                                                    aria-describedby="btnGroupAaddon" required>
                                            </div>
                                            <!-- submit button -->
                                            <input class="btn btn-outline-primary btn-block" type="submit" name="login"
                                                value="Sign in">

                                        </form>

                                        <hr>

                                        <div class="text-end"><a
                                                class="small text-sm-end link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                                href="forgot-password.php">Forgot Password?</a><br></div>
                                        <div class="text-end"> <a
                                                class=" small text-sm-end link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                                href="register.php">Create an Account!</a><br></div>
                                        <div class="text-end"> <a
                                                class="small text-sm-end link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                                href="index.html">Back Home</a></div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sb-admin-2@latest/js/sb-admin-2.min.js"></script>
        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
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