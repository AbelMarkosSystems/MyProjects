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
    <title>E-Commerce-User Login</title>
    <!-- bootstrap  css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- awesome link--> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--   css file -->
     <link rel="stylesheet" href="/E-Commerce Website/Style.css">
     <style>
    body{
      overflow-x: hidden;
    }
     </style>
    </head>
   <body>
    
    <!-- navebar -->
    <div class="container-fluild">
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./Images/abi.png" alt="" class="Logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../diplay_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
       <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
        <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product"></input>
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<!-- second chaild -->
<div class="sec_child">
<nav class="navbar navbar-expand-lg navbar-light  bg-secodary">
<ul class="navbar-nav me-auto ">
         <li class="nav-item">
          <a class="nav-link" href="#">WelCome Guest</a>
        </li>
</ul>
</nav>
<div class="bg-secondary" style="">
  <img src="./Images/abi.png" alt="" class="Logo" style="height:30px; display: block; margin: 0 auto;">
</div>
<!-- therd child-->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
              <form action="" method="post">
                <!-- user name -->
              <div class="form-outline mb-4">
                    <label for="user_username" class="form-label mt-5">Username</label>
                    <input type="text" class="form-control" id="user_username" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username">
                </div>
                
                 <!-- user password -->
                 <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_password" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                 <div class="mb-4">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 mt-2" name="user_login">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger">  Register</a></p>
                </div>
              </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
if(isset($_POST['user_login'])){
  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password']; 
  $select= "SELECT * from `user_table` where username = '$user_username'";
  $result = mysqli_query($conns, $select);
  $row = mysqli_num_rows($result);
  $row_data = mysqli_fetch_array($result);

//check carts 
$user_ip=getIPAddress() ;
$select_query= "SELECT * from `cart_details` where ip_address = '$user_ip'";
$result_cart = mysqli_query($conns, $select_query);
$row_num = mysqli_num_rows($result_cart);

  if($row > 0){
    $_SESSION['username']= $user_username;
     if(password_verify($user_password, $row_data['user_password'])){
      if($row==1 and $row_num==0){
        $_SESSION['username']= $user_username;
          echo "<script>alert('Login Successfully')</script>";
          echo "<script>window.open('profile.php','_self')</script>";
        }else{
          $_SESSION['username']= $user_username;
          echo "<script>alert('Login Successfully')</script>";
          echo "<script>window.open('payment.php','_self')</script>";
       }
     }else{
      echo "<script>alert('Invalid Credentials')</script>";
     }
  }else{
    echo "<script>alert('Invalid Credentials')</script>";
  }

}



?>