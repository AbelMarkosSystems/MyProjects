<?php
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/admin_area/functions/common_function.php');
include("../includes/connection.php");
if (isset($_GET['user_id'])) 
{
    $user_id = $_GET['user_id'];
}

// get total amounts
$ip_address = getIPAddress();
$total_price=0;
$query = "SELECT * from `cart_details` where ip_address='$ip_address'";
$result = mysqli_query($conns, $query);
$invoice_number=mt_rand();
$status='pending';
$count_products = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result)){
    $product_id = $row['product_id'];
    $select_product = "SELECT * from `products` where product_id=$product_id";
    $result_product = mysqli_query($conns, $select_product);
    while($row_product_price = mysqli_fetch_array($result_product)){
    $product_price= array($row_product_price['product_price']);
    $product_Values= array_sum($product_price);
    $total_price=$product_Values;
    }
  }

// get quantity
$select_cart = "SELECT * from `cart_details`";
$run_cart = mysqli_query($conns, $select_cart);
$get_quantity=mysqli_fetch_array($run_cart);
$quantity =$get_quantity['quantity'];
if($quantity == 0){
$quantity=1;
$subtotal=$total_price;
}else{
    //$quantity=$quantity;
    $subtotal = $total_price * $quantity;
}

//insert orders
$insert_query ="INSERT into `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status)
 values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
 $result_insert = mysqli_query($conns, $insert_query);
 if($result_insert){
  echo  "<script>alert('orders are submited successfully')</script>";
  echo  "<script>window.open('profile.php','_self')</script>";
}else{
  echo  "<script>('insertion faild');</script>";
}

//order pending
$insert_quer ="INSERT into `orders_pending` (user_id,invoice_number,product_id,quantity,order_status)
 values($user_id,$invoice_number,$product_id,$quantity,'$status')";
 $pending_order = mysqli_query($conns, $insert_quer);

 //delete carts
 $delet = "DELETE from `cart_details` where ip_address='$ip_address'";
 $result_delete = mysqli_query($conns, $delet);
?>

