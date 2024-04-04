<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Mystore";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['insert_product'])) {
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
        $insert_product = "INSERT INTO `products` (product_title, product_discription,
        product_keywords, category_id, brand_id, product_image1, product_image2, product_image3,
        product_price, date, status) VALUES ('$product_title', '$discription',
        '$Product_keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2',
        '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_product);

        if ($result_query) {
            echo "<script>alert('The product is inserted successfully');</script>";
        } else {
            echo "Query execution failed: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style.css">
      <!-- awesome link-->   
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   

</head>
<body class="bg-light">
<div class="container">
<h1 class="text-center mt-3">Insert Products</h1>
<!-- form -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- product title -->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="text" class="form-label">Product title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title"
        required="required">
    </div>
    <!-- product discription -->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="text" class="form-label">Product discription</label>
        <input type="text" name="discription" id="discription" class="form-control" placeholder="Enter product discription"
        required="required">
    </div>
      <!-- product keywords -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="text" class="form-label">Product keywords</label>
        <input type="text" name="Product_keywords" id="Product_keywords" class="form-control" placeholder="Enter product keywords" 
        required="required">
    </div>
     <!-- product category -->
     <div class="form-outlin mb-4 w-50 m-auto">
        <select name="product_category" id="" class="form-select">
            <option value="" >Select a category</option>
            <?php
          $select_query = "SELECT * FROM categories";
          $result_select = mysqli_query($con, $select_query);

          if ($result_select) {
            while ($row= mysqli_fetch_assoc($result_select)) {
              $category_title=$row['category_title'];  
              $category_id=$row['category_id'];
              echo "<option value='$category_id'>" . $category_title . "</option>";
          }
          } else {
            echo "Query execution failed: " . mysqli_error($con);
         }
?>
    
        </select>
     </div>
         <!-- Brands-->
         <div class="form-outlin mb-4 w-50 m-auto">
        <select name="product_brands" id="" class="form-select">
            <option value="" >Select a Brands</option>
            <?php
          $select_query = "SELECT * FROM brands";
          $result_select = mysqli_query($con, $select_query);

          if ($result_select) {
            while ($row= mysqli_fetch_assoc($result_select)) {
              $brand_title=$row['brand_title'];  
              $brand_id=$row['brand_id'];
              echo "<option value='$brand_id'>" . $brand_title . "</option>";
          }
          } else {
            echo "Query execution failed: " . mysqli_error($con);
         }
?>
    
        </select>
     </div>
      <!-- Images 1-->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">Product image 1</label>
        <input type="file" name="product_image1" id="product_image1" 
        class="form-control" 
        required="required">
    </div>
       <!-- Images 2-->
       <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-label">Product image 2</label>
        <input type="file" name="product_image2" id="product_image2" 
        class="form-control" 
        required="required">
    </div>
        <!-- Images 3-->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image3" class="form-label">Product image 3</label>
        <input type="file" name="product_image3" id="product_image3" 
        class="form-control" 
        required="required">
    </div>
     <!-- product price -->
     <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" name="product_price" id="product_price" class="form-control" 
    placeholder="Enter product price" autocomplete="off" required="required">
</div>
      <!-- submit -->
      <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
    </div>
</form>
</div>

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>