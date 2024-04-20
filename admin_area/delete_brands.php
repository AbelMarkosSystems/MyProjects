<?php
if (isset($_GET['delete_brand'])) {
    $delete_id = $_GET['delete_brand'];
   
    $check = "SELECT * FROM `products` where brand_id='$delete_id'";
    $result_check = mysqli_query($conns, $check);
    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('you can\'t delete this brand it exists in products');</script>";
        echo "<script>window.open('index.php?view_brands','_self');</script>"; 
    }else{
        $delete_q = "DELETE from `brands` where brand_id=$delete_id";
        $result = mysqli_query($conns, $delete_q);
        if($result){
            echo "<script>alert('The Brands is Deleted successfully');</script>";
            echo "<script>window.open('index.php?view_brands','_self');</script>";
       
        }
    }
} 
?>