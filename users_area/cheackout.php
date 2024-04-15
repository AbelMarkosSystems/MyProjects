<?php
include("../includes/connection.php");
@session_start()
?>
<?php
if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce-Checkout Page</title>
    <!-- bootstrap  css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- awesome link--> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--   css file -->
     <link rel="stylesheet" href="/E-Commerce Website/Style.css">
     <style>
  
     </style>
    </head>
   <body>
    
    <!-- navebar -->
    <div class="container-fluild">
    <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../Images/abi.png" alt="" class="Logo">
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
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
          
                        
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
                        <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
<!-- calling cart function -->
<!-- second chaild -->
<div class="sec_child">
<nav class="navbar navbar-expand-lg navbar-light  bg-secondary">
<ul class="navbar-nav me-auto ">
<?php

if (!isset($_SESSION['username'])) {
  echo "<li class='nav-item'>
   <a class='nav-link text-light' href='#'>Welcome Guest</a>
   </li>";
   } else {
   echo "<li class='nav-item'>
   <a class='nav-link text-light' href='#'>Welcome " . $_SESSION['username'] . "</a>
   </li>";
   }
   //check user
   if(!isset($_SESSION['username'])){
   echo "<li class='nav-item'>
   <a class='nav-link text-light' href='./users_area/user_login.php'>Login</a>
   </li>";
   }else{
   echo "<li class='nav-item'>
   <a class='nav-link text-light' href='./users_area/logout.php'>Logout</a>
    </li>";
  }

?>
</ul>
</nav>
<!-- therd child-->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!-- forth child-->
<div class="row px-1">
<div class="col-md-12">
  <!-- all products -->
  <div class="row " >
    <!-- feching dada -->
    <?php
      if(!isset($_SESSION['username'])){
        include('user_login.php');
      }else{
        include('payment.php');
      }

      ?>
  </div>
  <!-- columns -->
</div>


</div>

<!-- last child-->
<?php
 include("../includes/footer.php");
?>
</div>
     <!-- Bootstrap JS scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>