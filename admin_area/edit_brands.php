<?php
if (isset($_GET['edit_brand'])) {
    $update_id = $_GET['edit_brand'];
    $update= "SELECT * from brands where brand_id=$update_id";
    $result_update = mysqli_query($conns, $update);
    $row_fech = mysqli_fetch_assoc($result_update);
    $get_title=$row_fech['brand_title'];
 
    if (isset($_POST['update_brand'])) {
        $brand_title = $_POST['brand_title'];
    $delete_q = "UPDATE `brands` SET brand_title='$brand_title' where brand_id=$update_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The Brand is Updated successfully');</script>";
        echo "<script>window.open('index.php?view_brands','_self');</script>";
   
    }


} 
}
?>



<div 
class="container mt-3">
    <h1 class="text-center text-success">
        Edit Brand
    </h1>
       <form action="" method="post" class="text-center">
         <div class="form-outline mb-4 w-50 m-auto">
          <label for="brand_title" class="form-label">Brand Title</label>
          <input type="text" name="brand_title" 
          id="brand_title" value="<?php echo $get_title ?>" class="form-control" required>
        
        </div>
        <input type="submit" class="bg-info p-2 my-2 border-0"
         name="update_brand" value="Update brand" 
        aria-label="update" aria-describedby="basic-addon1">
       </form>
</div>