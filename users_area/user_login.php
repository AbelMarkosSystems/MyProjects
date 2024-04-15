<?php
@session_start();

include('../admin_area/functions/common_function.php');
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/includes/connection.php');

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // Check if the database connection is successful
    if ($conns) {
        $select = "SELECT * from `user_table` where username = '$user_username'";
        $result = mysqli_query($conns, $select);
        $row = mysqli_num_rows($result);
        $row_data = mysqli_fetch_array($result);

        // Check carts
        $user_ip = getIPAddress();
        $select_query = "SELECT * from `cart_details` where ip_address = '$user_ip'";
        $result_cart = mysqli_query($conns, $select_query);
        $row_num = mysqli_num_rows($result_cart);

        if ($row > 0) {
            $_SESSION['username'] = $user_username;
            if (password_verify($user_password, $row_data['user_password'])) {
                if ($row == 1 && $row_num == 0) {
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Login Successfully')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                } else {
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Login Successfully')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "Failed to connect to the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce-User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
  <style>
        body {
            background-color: orange;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: yellow;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-login {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-login:hover {
            background-color: burlywood;
            border-color: #138496;
        }

        .login-link {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container">
        <h2 class="text-center">User Login</h2>
        <form action="" method="post">
            <!-- Username -->
            <div class="form-outline mb-4">
                <label for="user_username" class="form-label mt-5">Username</label>
                <input type="text" class="form-control" id="user_username" name="user_username" required>
            </div>

            <!-- Password -->
            <div class="form-outline mb-4">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password" required>
            </div>

            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-login" name="user_login" value="Login"></input>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="user_registration .php" class="login-link">Register here</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>