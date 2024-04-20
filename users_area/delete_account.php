<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" value="Delete Acount" class="form-control w-50 m-auto" name="delete">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Don't Delete Acount" class="form-control w-50 m-auto" name="dont_delete">
        </div>
    </form>
</body>
</html>

<?php
  $username=$_SESSION['username'];
  if (isset($_POST['delete'])) {
    $delete ="DELETE from `user_table` where username='$username'";
    $result = mysqli_query($conns, $delete);
    if($result){
        session_destroy();
        echo "<script>alert('account deleted successfulty')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
  }
  if (isset($_POST['dont_delete'])) {
        echo "<script>window.open('profile.php','_self')</script>";
  }
?>