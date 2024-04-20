<?php
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/admin_area/functions/common_function.php');
include("../includes/connection.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- awesome link-->   
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../Style.css">
 <style>
    .admin_image{
   
   width: 15%;
   height: 15;
   object-fit: contain;
}
.logo{
    width: 10%;
   height: 7;
   object-fit: contain;
}
body{
  overflow-x:hidden ;
}
.product_img{
 width: 100%;
 height: 40px;
 object-fit: contain;
  }
  .user_img{
    width: 100%;
 height: 40px;
 object-fit: contain;  
  }
 </style>

</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images/mylogo.jpeg" alt="noy" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                  <ul class="navbar-nav">
                                      
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
   <a class='nav-link text-light' href='./admin_login.php'>Login</a>
   </li>";
   }else{
   echo "<li class='nav-item'>
   <a class='nav-link text-light' href='./logout.php'>Logout</a>
    </li>";
  }

?>
                  </ul>  
                <nav>
            </div>
</nav>

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
</div>

<div class="row">

<div class="col md-12 bg-secondary p-1 d-flex align-items-center">
    <div class="px-5">
       <a href=""><img src="" class="admin_image"></a> 
        <p class = " text-light text-left "><?php
          if (isset($_SESSION['username'])) {
   echo "
   <a class='nav-link text-light' href='#'> welcome " . $_SESSION['username'] . "</a>";
   }?></p>
    </div>
    <div class="button text-center p-3">
     <button class="my-3"><a href="index.php?insert_products" class="nav-link text-light bg-info my-1"> Insert products</a>
     </button><button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a>
     </button><button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories </a>
     </button><button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View Categories</a>
     </button><button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a>
     </button><button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a>
     </button><button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a>
     </button><button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a>
     </button><button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
    </div>
</div>
</div>

  <div class="container my-3">
    <?php 
      if(isset($_GET['insert_products'])){
        if (isset($_SESSION['username'])) {
          include('insert_product.php');
           } else {
        echo "<script>alert('Please Login first')</script>";
           } 
      }
    if(isset($_GET['insert_category'])){
      if (isset($_SESSION['username'])) {
        include('insert_categories.php');
         } else {
      echo "<script>alert('Please Login first')</script>";
         } 
    }
    if(isset($_GET['insert_brand'])){
      if (isset($_SESSION['username'])) {
        include('insert_brands.php');
         } else {
      echo "<script>alert('Please Login first')</script>";
         } 
    }
    if(isset($_GET['view_products'])){
      if (isset($_SESSION['username'])) {
        include('view_products.php');
         } else {
      echo "<script>alert('Please Login first')</script>";
         } 
  }
  if(isset($_GET['edit_products'])){
    if (isset($_SESSION['username'])) {
      include('edit_products.php');
       } else {
    echo "<script>alert('Please Login first')</script>";
       }
}
if(isset($_GET['delete_product'])){
  if (isset($_SESSION['username'])) {
    include('delete_product.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['view_category'])){
  if (isset($_SESSION['username'])) {
    include('view_category.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['view_brands'])){
  if (isset($_SESSION['username'])) {
    include('view_brands.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['edit_brand'])){
  if (isset($_SESSION['username'])) {
    include('edit_brands.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['delete_brand'])){
  if (isset($_SESSION['username'])) {
    include('delete_brands.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['edit_category'])){
  if (isset($_SESSION['username'])) {
    include('edit_category.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['delete_category'])){
  if (isset($_SESSION['username'])) {
    include('delete_category.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['list_orders'])){
  if (isset($_SESSION['username'])) {
    include('list_orders.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     } 
}
if(isset($_GET['list_payments'])){
  if (isset($_SESSION['username'])) {
    include('list_payments.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['list_users'])){
  if (isset($_SESSION['username'])) {
    include('list_users.php');
     } else {
  echo "<script>alert('Please Login first')</script>";
     }
}
if(isset($_GET['delete_order'])){
    include('delete_order.php');
}
if(isset($_GET['delete_user'])){
  include('delete_user.php');
}
if(isset($_GET['delete_payment'])){
  include('delete_payment.php');
}


?>

  </div>

  <?php
 include("../includes/footer.php");
?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>