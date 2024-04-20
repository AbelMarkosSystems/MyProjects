<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add the FontAwesome library CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>

  </head>

<body>
<h3 class="text-center text-success">All products</h3>
        <table class="table table-bordered mt-5">
        <thead>
           <tr>
            <th class="bg-info">Product Id</th>
            <th class="bg-info">Product Title</th>
            <th class="bg-info">Product Image</th>
            <th class="bg-info">Product price</th>
            <th class="bg-info">Total Sold</th>
            <th class="bg-info">Status</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
           </tr>
        </thead>
        <tbody class="text-center">
            <?php
             $get_product="SELECT * from `products`";
             $result = mysqli_query($conns,$get_product);
             $number=0;
             while($row = mysqli_fetch_assoc($result)){
                $product_id = $row["product_id"];
                $product_title = $row["product_title"];
                $product_image1 = $row["product_image1"];
                $product_price = $row["product_price"];
                $product_status = $row["status"];
                $number++;
                echo "<tr>
                  <td class='bg-secondary text-light'>$number</td>
                  <td class='bg-secondary text-light'>$product_title</td>
                  <td class='bg-secondary text-light'><img src='./product_images/$product_image1' class='product_img'></td>
                  <td class='bg-secondary text-light'>$product_price</td>
                  <td class='bg-secondary text-light'>";
                  
                  $get_count="SELECT * from `orders_pending` where product_id=$product_id";
                  $result_count=mysqli_query($conns,$get_count);
                  $row_count=mysqli_num_rows($result_count);
                  echo $row_count;

                  echo "</td>
                  <td class='bg-secondary text-light'>$product_status</td>
                  <td class='bg-secondary text-light'>
                    <a href='index.php?edit_products=$product_id' class='text-light'>
                      <i class='fa fa-pencil-square-o'></i>
                    </a>
                 </td>
                 <td class='bg-secondary text-light'>
                 <a href='index.php?delete_product=$product_id'
                 type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'>
              <i class='fa-solid fa-trash'></i>
                </a>
              </td>
              </tr>";
             }
            ?>
       
        </tbody>
    </table>

</body>
</html>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
       Are you shure you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <a href="index.php?view_products=<?php echo $product_id ?>" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href='index.php?delete_product=<?php echo $product_id ?>'
     class='text-light text-decoration-none'>Yes</a>
                    </button>
      </div>
    </div>
  </div>
</div>