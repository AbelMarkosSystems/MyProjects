<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead>
        <?php
         $get_order = "Select * from `user_orders`";
         $result = mysqli_query($conns, $get_order);
         $row=mysqli_num_rows($result);
 if($row== 0){
    echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
 }else{
    $number=0;
    echo "
    <tr>
    <th class='bg-info'>No</th>
    <th class='bg-info'>Due Amount</th>
    <th class='bg-info'>Invoice number</th>
    <th class='bg-info'>Total products</th>
    <th class='bg-info'>Order Date</th>
    <th class='bg-info'>Status</th>
    <th class='bg-info'>Delete</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row=mysqli_fetch_array($result)){
        $number++;
        $order_id=$row['order_id'];
        $amount_due=$row['amount_due'];
        $invoice_number=$row['invoice_number'];
        $total_products=$row['total_products'];
        $order_date=$row['order_date'];
        $order_status=$row['order_status'];
        echo "
        <tr>
        <td class='bg-secondary text-light'>$number</td>
        <td class='bg-secondary text-light'>$amount_due</td>
        <td class='bg-secondary text-light'>$invoice_number</td>
        <td class='bg-secondary text-light'>$total_products</td>
        <td class='bg-secondary text-light'>$order_date</td>
        <td class='bg-secondary text-light'>$order_status</td>
        <td class='bg-secondary text-light'>
        <a href='index.php?delete_order=$order_id'
        type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'>
     <i class='fa-solid fa-trash'></i>
       </a>
     </td>
       </tr>
        ";
        
    }
 }
        ?>
      
   
   
</tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
       Are you shure you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href='index.php?delete_order=<?php echo $order_id ?>'
     class='text-light text-decoration-none'>Yes</a>
                    </button>
      </div>
    </div>
  </div>
</div>