<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
   $get_data = "SELECT * FROM `products` where product_id=$edit_id";
   $result = mysqli_query($conns,$get_data);
   $row = mysqli_fetch_assoc($result);
   $product_title = $row["product_title"];
   $product_description = $row["product_discription"];
   $Product_keywords = $row['product_keywords'];
   $category_id = $row["category_id"];
   $brand_id= $row["brand_id"];
   $product_image1 = $row["product_image1"];
   $product_image2 = $row["product_image2"];
   $product_image3 = $row["product_image3"];
   $product_price = $row["product_price"];


   // select category
   $select_query = "SELECT * FROM categories where category_id=$category_id";
   $result_select = mysqli_query($conns, $select_query);
   $row_select = mysqli_fetch_assoc($result_select);
   $category_title=$row_select['category_title']; 

   $select_brand = "SELECT * FROM brands where brand_id=$brand_id";
   $result_brand = mysqli_query($conns, $select_brand);
   $row_brand = mysqli_fetch_assoc($result_brand);
   $brand_title=$row_brand['brand_title']; 
}
?>






<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <!-- product title -->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">Product title</label>
        <input type="text" name="product_title" id="product_title" 
        class="form-control" value="<?php echo $product_title ?>"
        required="required">
    </div>
    <!-- product discription -->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="discription" class="form-label">Product discription</label>
        <input type="text" name="discription" id="discription" 
        class="form-control" value="<?php echo $product_description ?>"
        required="required">
    </div>
      <!-- product keywords -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="text" class="form-label">Product keywords</label>
        <input type="text" name="Product_keywords" id="Product_keywords"
         class="form-control" value="<?php echo $Product_keywords ?>" 
        required="required">
    </div>
     <!-- product category -->
     <div class="form-outlin mb-4 w-50 m-auto">
        <select name="product_category" id="" class="form-select">
        <option value="<?php echo $category_id ?>" ><?php echo $category_title ?></option>
            <?php
          $select_query = "SELECT * FROM categories";
          $result_select = mysqli_query($conns, $select_query);

          if ($result_select) {
            while ($row= mysqli_fetch_assoc($result_select)) {
              $category_title=$row['category_title'];  
              $category_id=$row['category_id'];
              echo "<option value='$category_id'>" . $category_title . "</option>";
          }
          } else {
            echo "Query execution failed: " . mysqli_error($conns);
         }
?>
    
        </select>
     </div>
         <!-- Brands-->
         <div class="form-outlin mb-4 w-50 m-auto">
        <select name="product_brands" id="" class="form-select">
            <option value="<?php echo $brand_id ?>" ><?php echo $brand_title ?></option>
            <?php
          $select_query = "SELECT * FROM brands";
          $result_select = mysqli_query($conns, $select_query);

          if ($result_select) {
            while ($row= mysqli_fetch_assoc($result_select)) {
              $brand_title=$row['brand_title'];  
              $brand_id=$row['brand_id'];
              echo "<option value='$brand_id'>" . $brand_title . "</option>";
          }
          } else {
            echo "Query execution failed: " . mysqli_error($conns);
         }
?>
    
        </select>
     </div>
      <!-- Images 1-->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Product image 1</label>
        <div class="d-flex">
        <input type="file" name="product_image1" id="product_image1" 
        class="form-control w-90 m-auto" 
        required="required">
        <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
    </div>
    </div>
       <!-- Images 2-->
       <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-label">Product image 2</label>
        <div class="d-flex">
        <input type="file" name="product_image2" id="product_image2" 
        class="form-control w-90 m-auto" 
        required="required">
        <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
    </div>
    </div>
        <!-- Images 3-->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image3" class="form-label">Product image 3</label>
        <div class="d-flex">
        <input type="file" name="product_image3" id="product_image3" 
        class="form-control w-90 m-auto" 
        required="required">
        <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img">
    </div>
    </div>
     <!-- product price -->
     <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" name="product_price" id="product_price" class="form-control" 
    value="<?php echo $product_price ?>" autocomplete="off" required="required">
</div>
      <!-- submit -->
      <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="edit_product" class="btn btn-info mb-3 px-3" value="Update Products">
    </div>
</form>
</div>

<!-- Update data -->
<?php

if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $discription = $_POST['discription'];
    $Product_keywords = $_POST['Product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    if (isset($_POST['product_price'])) {
        $product_price = $_POST['product_price'];
    } else {
        echo "<script>alert('Product price is required')</script>";
        exit();
    }
    $product_status = 'true';

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image temporary name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if ($product_title == '' || $discription == '' || $Product_keywords == '' || $product_category == '' ||
        $product_brands == '' || $product_price == '' || $product_image1 == '' || $product_image2 == '' ||
        $product_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        
        // insert query
        $update_product = "UPDATE `products` set product_title='$product_title', product_discription='$discription',
        product_keywords='$Product_keywords', category_id='$product_category', brand_id='$product_brands', product_image1='$product_image1', 
        product_image2='$product_image2', product_image3='$product_image3',
        product_price='$product_price', date=NOW()  where product_id=$edit_id";

        $result_query_update = mysqli_query($conns, $update_product);

        if ($result_query_update) {
            echo "<script>alert('The product is Updated successfully');</script>";
            echo "<script>window.open('index.php','_self');</script>";
        } else {
            echo "Query execution failed: " . mysqli_error($conns);
        }
    }
}
?>