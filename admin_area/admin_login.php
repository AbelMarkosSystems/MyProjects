<?php
include("../includes/connection.php");
@session_start();
?>
<?php
if (isset($_POST['admin_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the database connection is successful
    if ($conns) {
        $select = "SELECT * from `admin_table` where admin_name = '$username'";
        $result = mysqli_query($conns, $select);
        $row = mysqli_num_rows($result);
        $row_data = mysqli_fetch_array($result);
        if ($row > 0) {
            if (password_verify($password, $row_data['admin_password'])) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Connection error try again')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow: hidden;
            background-color: bisque;
        }
        
        .admin_img {
            width: 800px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="../Images/rg1.jpg" alt="Admin Registration" class="admin_img img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4 mt-5">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Enter your username" name="username" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
