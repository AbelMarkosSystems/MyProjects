<?php
include("../includes/connection.php");
@session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET["order_id"];
    $select = "SELECT * FROM `user_orders` WHERE order_id = ?";
    $stmt = mysqli_prepare($conns, $select);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $invoice_number = $row["invoice_number"];
    $amount_due = $row["amount_due"];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $payment_mode = $_POST['payment_mode'];
    $amount = $_POST['amount'];
    
    $insert_query = "INSERT INTO `user_payment` (order_id, invoice_number, amount, payment_mode) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conns, $insert_query);
    mysqli_stmt_bind_param($stmt, "isss", $order_id, $invoice_number, $amount, $payment_mode);
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        echo "<script>alert('Successfully completed')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    } else {
        echo "<script>alert('error')</script>";
    }
    $update = "UPDATE `user_orders` set order_status='complete' where order_id= $order_id";
    $stmt_result = mysqli_query($conns, $update);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
      <!-- Bootstrap CSS link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" name="invoice_number" value="<?php echo $invoice_number ?>" class="form-control w-50 m-auto">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
              <label for="amount" class="text-light">Amount</label>
            <input type="text" name="amount" class="form-control w-50 m-auto" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" class="form-select w-50 m-auto">
               <option value="CBE">CBE</option>
               <option value="Absiniya">Absiniya</option>
               <option value="COOBE">COOBE</option>
               <option value="Telebirr">Telebirr</option>
               <option value="Paypal">Paypal</option>
               <option value="Cash in Delivery">Cash in Delivery</option>
               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" name="confirm_payment" value="Conirm" class="bg-info py-2 px-3 border-0">
            </div>
        </form>
    </div>
</body>
</html>