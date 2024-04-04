<?php

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['insert_info'])) {
  // Retrieve form data
  $id =  $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $location_from = $_POST['from'];
  $location_to =  $_POST['to'];
  $departure_day =  $_POST['departure-date'];
  $return_day =  $_POST['return-date'];
  $trip_type = $_POST['trip-type'];

  // Insert data into the database
  if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address) ||
  empty($location_from) || empty($location_to) || empty($departure_day) ||
  empty($return_day) || empty($trip_type)) {
  echo "<script>alert('Please fill out the form correctly.');</script>";
} else {
  // Prepare and execute the SQL statement
  $stmt = $connection->prepare("INSERT INTO `book_form` (id, name, email, Phone, address, location_from, location_to, departure_day, return_day, trip_type) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    // Display an error message if the prepare() function fails
    die("Error: " . $connection->error);
}

$stmt->bind_param("isssssssss", $id, $name, $email, $phone, $address, $location_from, $location_to, $departure_day, $return_day, $trip_type);
$result_query = $stmt->execute();
  if($result_query)
  {
    echo "<script>alert('Information has been inserted successfully.');</script>";
    // Redirect to the booking page after successful submission
   // header('Location: book.php');
    exit(); // Exit to prevent further execution of the script
  } else {
    // Display a more informative error message if the query fails
    $error_message = "Error: " . mysqli_error($connection);
    echo "<script>alert('$error_message');</script>";
  }
} 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style.css">
      <!-- awesome link-->   
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
      <form action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="id" class="form-label">Id:</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Enter Id">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required="required">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
          </div>
          <div class="mb-3">
            <label for="trip-type" class="form-label">Trip Type:</label>
            <select class="form-select" id="trip-type" name="trip-type">
              <option value="one-way">One Way</option>
              <option value="round-trip">Round Trip</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="from" class="form-label">From:</label>
            <div class="input-group">
              <!-- <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span> -->
              <input type="text" class="form-control" id="from" name="from" placeholder="Enter departure location">
            </div>
          </div>
          <div class="mb-3">
            <label for="to" class="form-label">To:</label>
            <div class="input-group">
              <!-- <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span> -->
              <input type="text" class="form-control" id="to" name="to" placeholder="Enter destination location">
            </div>
          </div>
          <div class="mb-3">
            <label for="departure-date" class="form-label">Departure Day:</label>
            <input type="date"class="form-control" id="departure-date" name="departure-date">
          </div>
          <div class="mb-3">
            <label for="return-date" class="form-label">Return Day:</label>
            <input type="date" class="form-control" id="return-date" name="return-date">
          </div>
          <div>
            <input type="submit" name="insert_info" class="btn btn-primary"></input>
          </div>  
        </form>
    </div>
  </div>
   <!-- bootstrap js link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>