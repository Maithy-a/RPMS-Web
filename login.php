<?php include("conn.php"); ?>
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

    if (isset($_POST["login"])) {
        $uname = $_POST['username'];
        $pword = md5($_POST['password']);

        // Query tenant table
        $sql = "SELECT * FROM tenant WHERE u_name = '$uname'";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);

        // Query user table
        $sql1 = "SELECT * FROM user WHERE u_name = '$uname'";
        $query1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($query1);

        if (!$row && !$row1) {
            // User not found in either table
            echo "<script>
                toastr.error('User not found. Please check your credentials.', 'Login Failed');
              </script>";
        } else {
            $isPasswordCorrect = false;

            if ($row && $row['p_word'] === $pword) {
                // Tenant login
                $isPasswordCorrect = true;
                $_SESSION['username'] = $uname;
                $_SESSION['role'] = 'Tenant'; // Assign default role for tenants
    
                // Tenant status handling
                $fname = $row['fname'];
                $lname = $row['lname'];
                $stat = $row['status'];
                $tenant_id = $row['tenant_id'];

                if ($stat == 0) {
                    echo "<script>
                        toastr.success('Welcome $fname $lname!', 'Login Successful');
                        setTimeout(function() { window.location.href = 'tenants/initial_payment.php'; }, 3000);
                      </script>";
                } elseif ($stat == 1) {
                    echo "<script>
                        toastr.success('Welcome $fname $lname!', 'Login Successful');
                        setTimeout(function() { window.location.href = 'tenants/home.php'; }, 3000);
                      </script>";
                } elseif ($stat == 2) {
                    echo "<script>
                        toastr.success('Welcome $fname $lname!', 'Login Successful');
                        setTimeout(function() { window.location.href = 'tenants/waiting.php'; }, 3000);
                      </script>";
                }
            } elseif ($row1 && $row1['pword'] === $pword) {
                // Manager or Administrator login
                $isPasswordCorrect = true;
                $_SESSION['username'] = $uname;
                $_SESSION['role'] = $row1['role']; // Assign role from the user table
    
                if ($_SESSION['role'] === "Administrator") {
                    echo "<script>
                        toastr.success('Welcome back: $uname!', 'Login Successful');
                        setTimeout(function() { window.location.href = 'admin/admin_home.php'; }, 3000);
                      </script>";
                } elseif ($_SESSION['role'] === "Manager") {
                    echo "<script>
                        toastr.success('Welcome back: $uname!', 'Login Successful');
                        setTimeout(function() { window.location.href = 'manager/manager_home.php'; }, 3000);
                      </script>";
                }
            }

            if (!$isPasswordCorrect) {
                echo "<script>
                    toastr.error('Incorrect Password. Please try again.', 'Login Failed');
                  </script>";
            }
        }
        mysqli_close($con);
    }
    ?>

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
</body>

</html>