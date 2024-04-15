<?php
include("./includes/connection.php");
?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/admin_area/functions/common_function.php');

?>

<?php
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="/E-Commerce Website/Style.css">
    <style>
  
    </style>
</head>
<body>
    <!-- Navbar -->
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="diplay_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
                        <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- Call cart function -->
        <?php
        cart();
        ?>

        <!-- Second child -->
        <div class="sec_child">
            <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
                <ul class="navbar-nav me-auto">
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

?>       </ul>
            </nav>
            <div class="bg-light" style="">
                <img src="./Images/abi.png" alt="" class="Logo" style="height:30px; display: block; margin: 0 auto;">
            </div>

            <!-- Third child -->
            <div class="bg-light">
                <h3 class="text-center">Hidden Store</h3>
                <p class="text-center">Communication is at the heart of e-commerce and community</p>
            </div>
    </div>

<!-- forth child-->
<div class="row px-1">
<div class="col-md-10">
  <!-- all products -->
  <div class="row " >
    <!-- feching dada -->

    <?php

   get_all_products();
   get_unique_category();
   get_unique_brands()
    ?>
      <!-- row -->
  </div>
  <!-- columns -->
</div>

<div class="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
    </li>
    <?php
    //get brands
     get_brands(); 
   ?>
  </ul>

  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
    </li>
    <li class="nav-item ">
    <?php
    //get categories
   get_categories();
   ?>
    </li>
  </ul>


</div>

</div>

<!-- last child-->
<?php
 include("./includes/footer.php");
?>
</div>
    <!-- bootstrap js link -->
   <!-- Bootstrap JS scripts -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>