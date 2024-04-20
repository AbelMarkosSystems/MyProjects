<?php
if (isset($_GET['delete_order'])) {
    $delete_id = $_GET['delete_order'];

    $delete_q = "DELETE from `user_orders` where order_id=$delete_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The Order is Deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
   
    }

} 
?>