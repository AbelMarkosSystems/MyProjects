<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead>
        <?php
         $get_user = "Select * from `user_table`";
         $result = mysqli_query($conns, $get_user);
         $row=mysqli_num_rows($result);
 if($row== 0){
    echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
 }else{
    $number=0;
    echo "
    <tr>
    <th class='bg-info'>No</th>
    <th class='bg-info'>User Id</th>
    <th class='bg-info'>Username</th>
    <th class='bg-info'>User Email</th>
    <th class='bg-info'>User Image</th>
    <th class='bg-info'>User Address</th>
    <th class='bg-info'>User Mobile</th>
    <th class='bg-info'>Delete</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row=mysqli_fetch_array($result)){
        $number++;
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_address=$row['user_address'];
        $user_mobile=$row['user_mobile'];
        echo "
        <tr>
        <td class='bg-secondary text-light'>$number</td>
        <td class='bg-secondary text-light'>$user_id</td>
        <td class='bg-secondary text-light'>$username</td>
        <td class='bg-secondary text-light'>$user_email</td>
        <td class='bg-secondary text-light'>$user_image</td>
        <td class='bg-secondary text-light'>$user_address</td>
        <td class='bg-secondary text-light'>
        <img src='../users_area/user_images/$user_image' class='user_img'></td>
        <td class='bg-secondary text-light'>
        <a href='index.php?delete_user=$user_id'
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href='index.php?delete_user=<?php echo $user_id ?>'
     class='text-light text-decoration-none'>Yes</a>
                    </button>
      </div>
    </div>
  </div>
</div>