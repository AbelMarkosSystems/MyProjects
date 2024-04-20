<?php
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];

    $check = "SELECT * FROM `products` where category_id='$delete_id'";
    $result_check = mysqli_query($conns, $check);
    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('you can\'t delete this category it exists in products');</script>";
        echo "<script>window.open('index.php?view_category','_self');</script>"; 
    }else{
    $delete_q = "DELETE from `categories` where category_id=$delete_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The category is Deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
   
     }
 }
} 
?>