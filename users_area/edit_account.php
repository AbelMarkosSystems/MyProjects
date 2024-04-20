<?php
include("../includes/connection.php");
@session_start();
?>

<?php
if(isset($_GET['edit_account'])){
    $username_fech = $_SESSION['username'];
    $select = "SELECT * FROM `user_table` WHERE username='$username_fech'";
    $result = mysqli_query($conns, $select);
     
    if($result && mysqli_num_rows($result) > 0) {
        $row_fetch = mysqli_fetch_assoc($result);
        $username = $row_fetch["username"];
        $user_id = $row_fetch['user_id'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
    } else {
        // Handle the case when the query fails or no rows are returned
        echo "<script>alert('Failed to retrieve user details')</script>";
        // You can redirect the user to an appropriate page or display an error message
        exit;
    }
}

if(isset($_POST['user_update'])){
    $update_id = $user_id;
$username = $_POST['user_username'];
$user_email = $_POST['user_email'];
$user_address = $_POST['user_address'];
$user_mobile = $_POST['user_mobile'];
$user_image = $_FILES['user_image']['name'];
$temp_image = $_FILES['user_image']['tmp_name'];
$target_directory = "./user_images/";
$target_path = $target_directory . $user_image;

if (move_uploaded_file($temp_image, $target_path)) {
    // Image move was successful
    $update_query = "UPDATE `user_table` SET username='$username', user_email='$user_email',
                     user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile'
                     WHERE user_id='$update_id'";
    // Execute the update query
    $result = mysqli_query($conns, $update_query);

    if ($result) {
        echo "<script>alert('Your profile updated successfully')</script>";
        echo "<script>window.open('logout.php', '_self')</script>";
    } else {
        $error_message = mysqli_error($conns);
        echo "<script>alert('Update failed: $error_message')</script>";
    }
} else {
    // Image move failed
    echo "Failed to move the uploaded image.";
}

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit_image {
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
        <input type="text" class="form-control w-50 m-auto" value="<?php echo isset($username) ? $username : ''; ?>" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" value="<?php echo isset($user_email) ? $user_email : ''; ?>" name="user_email">
    </div>
    <div class="form-outline mb-4">
        <input type="file" class="form-control w-50 m-auto" name="user_image">
    </div>
    <?php
    $username = $_SESSION['username'];
    $select_img = "SELECT * from `user_table` where username ='$username' ";
    $result = mysqli_query($conns, $select_img);
    $row_imge = mysqli_fetch_array($result);
    $user_image = $row_imge['user_image'];
    if (!empty($user_image) && file_exists("./user_images/" . $user_image)) {
        echo '<div class="form-outline mb-4">
                <img src="./user_images/' . $user_image . '" alt="" class="edit_image">
            </div>';
    }
    ?>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo isset($user_address) ? $user_address : ''; ?>" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo isset($user_mobile) ? $user_mobile : ''; ?>" name="user_mobile">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" value="Update" class="bg-info py-2 px-2 border-0" name="user_update">
    </div>
</form>
</body>
</html>