<?php
include("./includes/connection.php");
?>
<?php
 function getproducts(){
    global $conns;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    
    $select_query = "SELECT * FROM `products` order by rand() LIMIT 0,9";
    $result_query = mysqli_query($conns, $select_query);
    
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_discription = $row['product_discription'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
      
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
             <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
             <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
             <p class='card-text'>$product_discription</p>
             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
        </div>
      </div>
    </div>";
    }
    
    mysqli_free_result($result_query);
  }
 }
}
//get all products 
function get_all_products(){
  global $conns;
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
  
  $select_query = "SELECT * FROM `products` order by rand()";
  $result_query = mysqli_query($conns, $select_query);
  
  while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_discription = $row['product_discription'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
    
      echo "<div class='col-md-4 mb-2'>
          <div class='card'>
           <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
           <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
           <p class='card-text'>$product_discription</p>
           <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
      </div>
    </div>
  </div>";
  }
  
  mysqli_free_result($result_query);
}
}

}
//geting unique categories
    function get_unique_category(){
        global $conns;
        if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query = "SELECT * FROM `products` where category_id=$category_id";
        $result_query = mysqli_query($conns, $select_query);
        $num_rows=mysqli_num_rows($result_query);
        if($num_rows==0){
            echo "<h2 class='text-center text-danger'>No Stock For This Category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_discription = $row['product_discription'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
          
            echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                 <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                 <p class='card-text'>$product_discription</p>
                 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
            </div>
          </div>
        </div>";
        }
        
        mysqli_free_result($result_query);
      }
     }
    //geting unique categories
    function get_unique_brands(){
        global $conns;
        if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        $select_query = "SELECT * FROM `products` where brand_id=$brand_id";
        $result_query = mysqli_query($conns, $select_query);
        $num_rows=mysqli_num_rows($result_query);
        if($num_rows==0){
            echo "<h2 class='text-center text-danger'>i kill you don,t worry</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_discription = $row['product_discription'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
          
            echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                 <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                 <p class='card-text'>$product_discription</p>
                 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
            </div>
          </div>
        </div>";
        }
        
        mysqli_free_result($result_query);
      }
     }
//display brands 
function get_brands(){
    global $conns;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($conns, $select_brands);
    
     if ($result_brands) {
         while ($row_data = mysqli_fetch_assoc($result_brands)) {
          $brand_id=$row_data['brand_id'];
          $brand_title=$row_data['brand_title'];
          echo '<li class="nav-item"><a href="index.php?brand='.$brand_id.'" class="nav-link text-light"><h4>' . $row_data['brand_title'] . '</h4></a></li>';
        }
      } else {
        echo "Query execution failed: " . mysqli_error($conns);
    }
}
//display categories
function get_categories(){
   global $conns;
    $select_category = "SELECT * FROM categories";
    $result_category = mysqli_query($conns, $select_category);

if ($result_category) {
 while ($row_data = mysqli_fetch_assoc($result_category)) {
   $category_id=$row_data['category_id'];
   echo '<li class="nav-item"><a href="index.php?category='.$category_id.'" class="nav-link text-light"><h4>' . $row_data['category_title'] . '</h4></a></li>';
}
} else {
 echo "Query execution failed: " . mysqli_error($conns);
}
}

// seraching products
function serach_product(){
    global $conns;
    if(isset($_GET['search_data_product'])){
    $serch_data_value = $_GET['search_data'];
    $search_query = "SELECT * FROM `products` where product_keywords like 
    '%$serch_data_value%'";
    $result_query = mysqli_query($conns, $search_query);
    $num_rows=mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>No result mach, No products found on this category</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_discription = $row['product_discription'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
      
        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
             <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
             <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
             <p class='card-text'>$product_discription</p>
             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
        </div>
      </div>
    </div>";
    }
    
    mysqli_free_result($result_query);
  }
}
// vew details
function view_details(){
  global $conns;
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $products_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` where product_id=$products_id";
        $result_query = mysqli_query($conns, $select_query);

        if ($result_query) {
          // Check if the query executed successfully
          if (mysqli_num_rows($result_query) > 0) {
            // Fetch and display the results
            while ($row = mysqli_fetch_assoc($result_query)) {
              // Retrieve product details from the row
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_discription = $row['product_discription'];
              $product_image1 = $row['product_image1'];
              $product_image2 = $row['product_image2'];
              $product_image3 = $row['product_image3'];
              $product_price = $row['product_price'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];

              // Output the product details
              echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_discription</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                      </div>
                    </div>
                     <div class='col-md-8'>
                      <div class='row'>
                        <div class='col-md-12'>
                          <h4 class='text-center text-info mb-5'>Related Products</h4>
                        </div>
                        <div class='mol-md-6'>
                          <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'> 
                        </div>
                        <div class='mol-md-6'>
                          <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>  
                        </div>
                      </div>
                    </div>
                  </div>";
            }
          } else {
            // Handle the case when no results are found
            echo "No results found.";
          }

          mysqli_free_result($result_query);
        } else {
          // Handle the case when the query fails
          echo "Query failed: " . mysqli_error($conns);
        }
      }
    }
  }
}
// get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  


// add to cart function
function cart(){
global $conn;
if(isset($_GET['add_to_cart'])) {
  $ip_address = getIPAddress();
  $get_product_id = $_GET['add_to_cart'];
  $select_query = "SELECT * FROM `cart_details` WHERE ip_address = $ip_address and product_id = $get_product_id";
  $result_query = mysqli_query($conn, $select_query);
  $num_rows=mysqli_num_rows($result_query);
  if($num_rows>0){
      echo "<script>alert('this item is already present inside cart');</script>";
      echo "<script>window.open('index.php','_self');</script>";
  }else{
    $insert_query="INSERT INTO  cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$ip_address',0";
    $result_query = mysqli_query($conn, $insert_query);
    echo "<script>window.open('index.php','_self');</script>";
  }

}
}
?>