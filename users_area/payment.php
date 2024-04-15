<?php
include($_SERVER['DOCUMENT_ROOT'] . '/E-Commerce Website/admin_area/functions/common_function.php');
include("../includes/connection.php");
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="/E-Commerce Website/Style.css">
    <style>
   body{
      overflow-x: hidden;
    }
    img{
        width: 60%;
        margin: auto;
        display: block;
    }
    </style>
</head>
<body>
   
<?php
$user_ip = getIPAddress();
$get_user = "SELECT * from `user_table` where user_ip='$user_ip'";
$result=mysqli_query($conns,$get_user);
$run_query = mysqli_fetch_array($result);
$user_id= $run_query['user_id'];

?>
<!-- Payment class codes -->
<div class="container mt-5">
    <h2 class="text-center text-info mb-5">Payment Option</h2>
   
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
        <a href="https://www.paypal.com" target="_blank"><img src="../Images/pay1.png" ></a>
        </div>
        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo "$user_id"?>" target="_blank" class="mb-10"><h2 class="text-center text-info">Pay Offline</h2></a>
        </div>
       </div>
</div>

<!-- Bootstrap JS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>