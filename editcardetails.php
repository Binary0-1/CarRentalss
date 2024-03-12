<?php
session_start();
include('connection.php');

// Check if user is logged in and agency_id is set in session
if (!isset($_SESSION['username']) || !isset($_SESSION['agency_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if car_id is set in the URL parameters
if (!isset($_GET['car_id'])) {
    // Redirect to viewcars.php if car_id is not provided
    header("Location: view_cars.php");
    exit();
}

// Get the car_id from the URL parameters
$car_id = $_GET['car_id'];

// Fetch car details for the given car_id
$sql = "SELECT * FROM cars WHERE car_id = $car_id AND agency_id = {$_SESSION['agency_id']}";
$result = $conn->query($sql);

// Check if car exists and belongs to the logged-in agency
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    // Redirect to viewcars.php if car does not exist or does not belong to the logged-in agency
    header("Location: view_cars.php");
    exit();
}

// Handle form submission for updating car details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated car details from the form
    $vehicle_model = $_POST['vehicle_model'];
    $vehicle_number = $_POST['vehicle_number'];
    $seating_capacity = $_POST['seating_capacity'];
    $rent_per_day = $_POST['rent_per_day'];

    // Update car details in the database
    $update_sql = "UPDATE cars SET vehicle_model = '$vehicle_model', vehicle_number = '$vehicle_number', seating_capacity = '$seating_capacity', rent_per_day = '$rent_per_day' WHERE car_id = $car_id";
    if ($conn->query($update_sql) === TRUE) {
        // Redirect to viewcars.php after successful update
        header("Location: view_cars.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Car Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
    include './component/navbar.html';
?>
<div class="container mt-4">
  <h2>Edit Car Details</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?car_id=$car_id"); ?>">
    <div class="form-group">
      <label for="vehicle_model">Vehicle Model</label>
      <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" value="<?php echo $row['vehicle_model']; ?>" required>
    </div>
    <div class="form-group">
      <label for="vehicle_number">Vehicle Number</label>
      <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value="<?php echo $row['vehicle_number']; ?>" required>
    </div>
    <div class="form-group">
      <label for="seating_capacity">Seating Capacity</label>
      <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" value="<?php echo $row['seating_capacity']; ?>" required>
    </div>
    <div class="form-group">
      <label for="rent_per_day">Rent per Day</label>
      <input type="number" class="form-control" id="rent_per_day" name="rent_per_day" value="<?php echo $row['rent_per_day']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
<?php include './component/footer.html'; ?>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./scripts/navbar.js"></script>
</body>
</html>
