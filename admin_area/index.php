<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
 
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
 </style>

</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images/mylogo.jpeg" alt="noy" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">WelCome Guest</a>
                    </li>
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
       <a href=""><img src="../Images/abel.png.jpg" class="admin_image"></a> 
        <p class = " text-light text-left ">Abel Markos </p>
    </div>
    <div class="button text-center p-3">
     <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1"> Insert products</a>
     </button><button><a href="" class="nav-link text-light bg-info my-1">View Products</a>
     </button><button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories </a>
     </button><button><a href="" class="nav-link text-light bg-info my-1">View Categories</a>
     </button><button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a>
     </button><button><a href="index.php?insert_info" class="nav-link text-light bg-info my-1">View Brands</a>
     </button><button><a href="" class="nav-link text-light bg-info my-1">All orders</a>
     </button><button><a href="" class="nav-link text-light bg-info my-1">All Payments</a>
     </button><button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
     <button><a href="" class="nav-link text-light bg-info my-1">Logout</a> </button>
    </div>
</div>
</div>

  <div class="container my-3">
    <?php 
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
    }
    if(isset($_GET['insert_info'])){
      include('insert_info.php');
  }
    ?>

  </div>


    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>