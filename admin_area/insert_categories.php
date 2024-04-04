<?php
include("../includes/connection.php");
?>
<?php
if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}
if (isset($_POST['insert_cat'])) {
    $cat_title = $_POST['cat_title'];

    $select_query = "SELECT * FROM categories WHERE category_title = '$cat_title'";
    $result_select = mysqli_query($conns, $select_query);

    if ($result_select) {
        $numbers = mysqli_num_rows($result_select);
        if ($numbers > 0) {
            echo "<script>alert('This Category is already present in the Database');</script>";
        } else {
            $insert_query = "INSERT INTO categories (category_title) VALUES ('$cat_title')";
            $result_insert = mysqli_query($conns, $insert_query);
            if ($result_insert) {
                echo "<script>alert('Category has been inserted successfully');</script>";
            }
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conns);
    }
}
?>
 <h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2 mb-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt">
   
    </i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
 
  <input type="submit" class="bg-info p-3 my-3 border-0" name="insert_cat" value="insert categories" aria-label="Username" aria-describedby="basic-addon1">

</div>
</form>