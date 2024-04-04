<?php
include("../includes/connection.php");
?>
<?php

if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
} 
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_select = mysqli_query($conns, $select_query);

    if ($result_select) {
        $numbers = mysqli_num_rows($result_select);
        if ($numbers > 0) {
            echo "<script>alert('This Brand is already present in the Database');</script>";
        } else {
            $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
            $result_insert = mysqli_query($conns, $insert_query);
            if ($result_insert) {
                echo "<script>alert('Brand has been inserted successfully');</script>";
            }
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conns);
    }
}
?>

 <h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2 mb-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt">
   
    </i></span>
    <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
  
  <input type="submit" class="bg-info p-3 my-3 border-0" name="insert_brand" value="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">

</div>
</form>