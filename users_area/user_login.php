<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>
        <!-- bootstrap  css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
              <form action="" method="post" enctype="multipart/form-data">
                <!-- user name -->
              <div class="form-outline mb-4">
                    <label for="user_username" class="form-label mt-5">Username</label>
                    <input type="text" class="form-control" id="user_username" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username">
                </div>
                
                 <!-- user password -->
                 <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_email" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                 <div class="mb-4">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 mt-2" name="user_login">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger">  Register</a></p>
                </div>
              </form>
            </div>
        </div>
    </div>
</body>
</html>