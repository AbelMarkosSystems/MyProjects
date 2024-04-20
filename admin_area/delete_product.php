<?php
if (isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];

    $delete_q = "DELETE from `products` where product_id=$delete_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The product is Deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
   
    }


} 
?>