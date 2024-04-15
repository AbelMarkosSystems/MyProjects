<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit_image{
width: 100px;
height: 100px;
object-fit: contain;
        }
    </style>
</head>
<body>
 <h3 class="text-center text-success">Edit Account Profile</h3>   
 <form action="" method="post" enctype="multipart/form-data" class="text-center">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex">
        <input type="file" class="form-control w-50 m-auto" name="user_image">
        <img src="./user_images/<?php echo $imge?>" alt="" class="edit_image">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_mobile">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" value="Update"class="bg-info py-2 px-2 border-0" name="user_update">
    </div>
 </form>
</body>
</html>