<?php
include("../includes/connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- awesome link-->   
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body{
        overflow: hidden;
    }
    .admin_img{
        width: 800px;
        object-fit: contain;
    }  
  </style>
</head>
<body>
   <div class="container-fluid m-3">
     <h2 class="text-center">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <img src="../Images/rg1.jpg" 
            alt="Admin Registration" class="admin_img img-flud">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4 mt-5">
                    <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" autocomplete="off"
                         placeholder="Entere your username"  name="username"> 
                </div>
                <div class="form-outline mb-4 mt-5">
                    <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" autocomplete="off"
                         placeholder="Entere your Email" name="email"> 
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" autocomplete="off"
                         placeholder="Entere your password" name="password"> 
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" autocomplete="off"
                         placeholder="confirm password"  name="confirm"> 
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0"
                    name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Do you  already have account?
                        <a href="admin_login.php" class="link-danger">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    </div> 
</body>
</html>
<?php
if(isset($_POST['admin_registration'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $admin_password = $_POST['password'];
    $password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['confirm'];
// selct data
$select_query = "SELECT * FROM `admin_table` WHERE admin_name='$username' OR admin_email='$email'";
$select_result = mysqli_query($conns, $select_query);

if (!$select_result) {
    die("Query Failed: " . mysqli_error($conns));
}

$select_row = mysqli_num_rows($select_result);

if($select_row > 0){
    echo "<script>alert('Username or email already exists');</script>";
} elseif($admin_password != $conf_user_password) {
    echo "<script>alert('Passwords do not match');</script>";
} else {
    // Insert data 
    // Move uploaded file and other code
    // ...

    $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password)
                     VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($conns, $insert_query);

    if($result){
        echo "<script>alert('You are registered successfully');</script>";
    } else {
        die("Registration Failed: " . mysqli_error($conns));
    }
}
}
?>