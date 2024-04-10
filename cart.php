<?php
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/admin_area/functions/common_function.php');
?>
<?php
include("./includes/connection.php");
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
    <title>E-Commerce-Cart Details</title>
    <!-- bootstrap  css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- awesome link--> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--   css file -->
     <link rel="stylesheet" href="/E-Commerce Website/Style.css">
     <style>
      .cart_image{
        width: 80px;
        height: 80px;
        object-fit: contain;
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="diplay_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->
   <?php
       cart();
    ?>
<!-- second chaild -->
<div class="sec_child">
<nav class="navbar navbar-expand-lg navbar-light  bg-secodary">
<ul class="navbar-nav me-auto ">
         <li class="nav-item">
          <a class="nav-link" href="#">WelCome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
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
<!-- forth child -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered">
          
             
                <!-- php to desply data -->
                <?php
            $get_ip_address = getIPAddress();
            $total_price = 0;
            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
            $result_query = mysqli_query($conns, $cart_query);
            $result_count = mysqli_num_rows($result_query);
            if ($result_count > 0) {
            while ($row = mysqli_fetch_array($result_query)) {
                $product_id = $row['product_id'];
                $select_product = "SELECT * FROM products WHERE product_id = $product_id";
                $result_product = mysqli_query($conns, $select_product);
 
                if ($result_product) 
                    if (mysqli_num_rows($result_product) > 0) 
                        while ($row_product_price = mysqli_fetch_array($result_product)) {
                            $product_price = $row_product_price['product_price'];
                            $price_table = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image = $row_product_price['product_image1'];
                            $total_price += $product_price;
            ?>
            <thead>
            <tr>
                <th>PRODUCT TITLE</th>
                <th>PRODUCT IMAGE</th>
                <th>QUANTITY</th>
                <th>TOTAL PRICE</th>
                <th>REMOVE</th>
                <th colspan='2'>OPERATIONS</th>
            </tr>
        </thead>
        <tbody>
               <tr>
                <td> <?php echo $product_title ?></td>
                <td><img src="./Images/<?php echo $product_image ?>" alt="" class="cart_image">  </td>
                <td><input type="text" name="qty[<?php echo $product_id ?>]" id="" class="form-input w-50" pattern="[0-9]+"></td>
                <td><?php echo $price_table ?></td>
                <?php
                $get_ip_address = getIPAddress();

                if (isset($_POST['update_cart'])) {
                  $quantity = $_POST['qty'][$product_id];
                
                    if (is_numeric($quantity)) {
                        $update_cart = "UPDATE `cart_details` SET quantity = $quantity WHERE ip_address = '$get_ip_address' and product_id = '$product_id'";
                        $result_product_quantity = mysqli_query($conns, $update_cart);
                
                        if ($result_product_quantity) {
                            // Update successful
                            $total_price = $total_price * $quantity;
                        } else {
                          
                            echo "Update failed: " . mysqli_error($conns);
                        }
                    }
                }
                ?> 
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                <td>
                <input type="submit" name="update_cart" value="Update cart" class="bg-info px-3 py-2 border-0 mx-2 mb-2">
                <input type="submit" name="remove_cart" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-2 mb-2">
                </td>
                
                <?php
            
                } } }
 else{
  echo  "<h2 class='text-danger text-center'>Cart Is Empty</h2>";
 }
              ?>
            </tr>
            </tbody>
        </table> 
     </form>
        <div class="d-flex mb-5">
          <?php
            $get_ip_address = getIPAddress();
            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
            $result_query = mysqli_query($conns, $cart_query);
            $result_count = mysqli_num_rows($result_query);
            if ($result_count > 0) {
          echo "    <h4 class='px-3'>Subtotal <strong class='text-info'> $total_price /-</strong> </h4>
              <a href='index.php'><button class='bg-info px-3 py-2 border-0 mx-2'>Continue Shopping</button></a>
              <a href='./users_area/cheackout.php'><button class='bg-secondary px-3 py-2 border-0 text-light'>Checkout</button> </a>
           ";
            }else{
              echo " <a href='index.php'><button class='bg-info px-3 py-2 border-0 mx-2'>Continue Shopping</button></a>";
            }
          ?>
          
        </div>
       
    </div>
</div>
<!-- function to remove items -->
<?php 
function remove_items(){
  global $conns;
  if(isset($_POST['remove_cart'])){
  foreach ($_POST['removeitem'] as $remove_id) {
  echo $remove_id;
  $delete_query = "DELETE from `cart_details` where product_id=$remove_id";
  $result_remove = mysqli_query($conns, $delete_query);
  if ($result_remove) {
  echo "<script>window.open('cart.php','_self');</script>";
  }
  }
  }
}
echo $remove_item = remove_items();
?>


<!-- last child-->
<?php
 include("./includes/footer.php");
?>
</div>
    <!-- bootstrap js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>