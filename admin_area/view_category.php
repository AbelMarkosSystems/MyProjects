<h3 class="text-center text-success">All Categories</h3>
        <table class="table table-bordered mt-5">
        <thead>
           <tr>
            <th class="bg-info">No</th>
            <th class="bg-info">Category Title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
           </tr>
        </thead>
        <tbody class="text-center">
            <?php
             $get_category="SELECT * from `categories`";
             $result = mysqli_query($conns,$get_category);
             $number=0;
             while($row = mysqli_fetch_assoc($result)){
                $category_id = $row["category_id"];
                $category_title = $row["category_title"];
                $number++;
                echo "<tr>
                  <td class='bg-secondary text-light'>$number</td>
                  <td class='bg-secondary text-light'>$category_title</td>
                  <td class='bg-secondary text-light'>
                    <a href='index.php?edit_category=$category_id' class='text-light'>
                      <i class='fa fa-pencil-square-o'></i>
                    </a>
                 </td>
                <td class='bg-secondary text-light'>
                <a href='index.php?delete_category=$category_id'
                type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'>
             <i class='fa-solid fa-trash'></i>
               </a>
          </td>
              </tr>";
             }
            ?>
       
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
       Are you shure you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_category" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary">
            <a href='index.php?delete_category=<?php echo $category_id ?>'
     class='text-light text-decoration-none'>Yes</a>
                    </button>
      </div>
    </div>
  </div>
</div>
