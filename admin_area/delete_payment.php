<?php
if (isset($_GET['delete_payment'])) {
    $delete_id = $_GET['delete_payment'];

    $delete_q = "DELETE from `user_payment` where payment_id=$delete_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The Payment is Deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
   
    }


} 
?>