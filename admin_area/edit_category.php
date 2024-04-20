<?php
if (isset($_GET['edit_category'])) {
    $delete_id = $_GET['edit_category'];
    $select= "SELECT * from categories where category_id=$delete_id";
    $result_deletes = mysqli_query($conns, $select);
    $row_fech = mysqli_fetch_assoc($result_deletes);
    $get_title=$row_fech['category_title'];
 
    if (isset($_POST['update_category'])) {
        $cat_title = $_POST['category_title'];
    $delete_q = "UPDATE `categories` SET category_title='$cat_title' where category_id=$delete_id";
    $result = mysqli_query($conns, $delete_q);
    if($result){
        echo "<script>alert('The category is Updated successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
   
    }


} 
}
?>



<div 
class="container mt-3">
    <h1 class="text-center text-success">
        Edit Category
    </h1>
       <form action="" method="post" class="text-center">
         <div class="form-outline mb-4 w-50 m-auto">
          <label for="category_title" class="form-label">Category Title</label>
          <input type="text" name="category_title" 
          id="category_title" value="<?php echo $get_title ?>" class="form-control" required>
        
        </div>
        <input type="submit" class="bg-info p-2 my-2 border-0"
         name="update_category" value="Update categories" 
        aria-label="update" aria-describedby="basic-addon1">
       </form>
</div>