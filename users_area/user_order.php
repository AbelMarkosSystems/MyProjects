<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY ORDERS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
$username = $_SESSION['username'];
$get_user ="SELECT * from `user_table` where username='$username'";
$result = mysqli_query($conns, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];


?>
<h3 class="text-success text-center">All My Orders</h3>
<table class="table table-bordered mt-5 custom-info">
    <thead class="bg-info">
    <tr>
    <th class='text-light bg-info'>Sl no</th>
    <th class='text-light bg-info'>Amount Due</th>
    <th class='text-light bg-info'>Total Product</th>
    <th class='text-light bg-info'>Invoice Number</th>
    <th class='text-light bg-info'>Date</th>
    <th class='text-light bg-info'>Complete/Incomplete</th>
    <th class='text-light bg-info'>Status</th>
</tr>
</thead>
 <tbody class="bg-secondary">
 <?php 
$number = 1;  
$get_orders = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
$result_order = mysqli_query($conns, $get_orders);
while ($row_order = mysqli_fetch_assoc($result_order)) {
    $order_id = $row_order["order_id"];
    $amount_due = $row_order["amount_due"];
    $total_product = $row_order["total_products"];
    $invoice_number = $row_order["invoice_number"];
    $order_status = $row_order["order_status"];
    $order_date = $row_order["order_date"];
    if ($order_status == "pending") {
        $order_status = "Incomplete";
    }else{
        $order_status = "Complete";
    }

    echo "
    <tr class='text-light bg-secondary'>
        <td class='text-light bg-secondary'>$number</td>
        <td class='text-light bg-secondary'>$amount_due</td>
        <td class='text-light bg-secondary'>$total_product</td>
        <td class='text-light bg-secondary'>$invoice_number</td>
        <td class='text-light bg-secondary'>$order_date</td>
        <td class='text-light bg-secondary'>$order_status</td>";
        ?>
        <?php
      if ($order_status == "Complete") {
        echo "<td class='text-light bg-secondary'>Paid</td>";
      }else{
       echo "<td class='text-light bg-secondary'><a href='confirm_payment.php?order_id=$order_id' class='text-light bg-secondary'>Confirm</a></td>
   ";
      }
      echo " </tr>";
    $number++;
}
?>
 </tbody>
</table>
</body>
</html>