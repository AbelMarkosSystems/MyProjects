<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead>
        <?php
         $get_payment = "Select * from `user_payment`";
         $result = mysqli_query($conns, $get_payment);
         $row=mysqli_num_rows($result);
 if($row== 0){
    echo "<h2 class='text-danger text-center mt-5'>No Payments Yet</h2>";
 }else{
    $number=0;
    echo "
    <tr>
    <th class='bg-info'>No</th>
    <th class='bg-info'>Invoice number</th>
    <th class='bg-info'>Amount</th>
    <th class='bg-info'>Payment Mode</th>
    <th class='bg-info'>Order Date</th>
    <th class='bg-info'>Delete</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row=mysqli_fetch_array($result)){
        $number++;
        $order_id=$row['order_id'];
        $payment_id=$row['payment_id'];
        $invoice_number=$row['invoice_number'];
        $amount=$row['amount'];
        $payment_mode=$row['payment_mode'];
        $date=$row['date'];
        echo "
        <tr>
        <td class='bg-secondary text-light'>$number</td>
        <td class='bg-secondary text-light'>$invoice_number</td>
        <td class='bg-secondary text-light'>$amount</td>
        <td class='bg-secondary text-light'>$payment_mode</td>
        <td class='bg-secondary text-light'>$date</td>
        <td class='bg-secondary text-light'>
        <a href='index.php?delete_payment=$payment_id'
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payments" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href='index.php?delete_payment=<?php echo $payment_id ?>'
     class='text-light text-decoration-none'>Yes</a>
                    </button>
      </div>
    </div>
  </div>
</div>