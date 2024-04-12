<?php
include('../admin_area/functions/common_function.php');
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
        <!-- bootstrap  css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
              <form action="" method="post" enctype="multipart/form-data">
                <!-- user name -->
              <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_username" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username">
                </div>
                <!-- user email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="user_email" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                </div>
                 <!-- user image -->
                 <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" class="form-control" id="user_image"  autocomplete="off" required="required" name="user_image">
                </div>
                 <!-- user password -->
                 <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_email" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                 <!-- Confirm user password -->
                 <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="conf_user_password" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password">
                </div>
                <!-- user address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Adrress</label>
                    <input type="text" class="form-control" id="user_address" placeholder="Entere Your Adrress" autocomplete="off" required="required" name="user_address">
                </div>
                 <!-- user address -->
                <div class="form-outline mt-4 pt-2">
                    <label for="user_mobile" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="user_mobile" placeholder="Entere Your Mobile Number" autocomplete="off" required="required" name="user_mobile">
                </div>
                 <div class="mb-4">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 mt-4" name="user_register">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger">  Login</a></p>
                </div>
              </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- insert into database -->
<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

// selct data
$select_query = "SELECT * from `user_table` where username='$user_username' or user_email= '$user_email'";
$select_result = mysqli_query($conns, $select_query);
$select_row = mysqli_num_rows($select_result);
if($select_row > 0){
    echo "<script>alert('Username and email is Already exist');</script>";
}elseif($user_password!=$conf_user_password){
    echo "<script>alert('Password Do Not Match');</script>";
}else{
    // insert data 
    move_uploaded_file($user_image_temp, "./user_images/$user_image");

    $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
                     VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile')";
    $result = mysqli_query($conns, $insert_query);
    if($result){
        echo "<script>alert('You Are Registred successfully');</script>";
    } else {
        die("Registration Faild: " . mysqli_error($conns));
    }
}
//SELECT CARTS
$select_cart = "SELECT * from `cart_details` where ip_address='$user_ip'";
$result_cart = mysqli_query($conns, $select_cart);
$row_count= mysqli_num_rows($result_cart);
if($row_count > 0){
    $_SESSION['username']= $user_username;
    echo "<script>alert('You have items in your cart ');</script>";
    echo "<script>window.open('cheackout.php','_self');</script>";   
}else
{
    echo "<script>window.open('../index.php','_self');</script>";   

}

}


?>