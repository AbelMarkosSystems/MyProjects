<?php
if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];

    $delete_q = "DELETE from `user_table` where user_id=$delete_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The User is Deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
   
    }

} 
?>