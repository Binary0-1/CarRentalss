<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enter Car Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
    include './component/navbar.html';
?>

<div class="container">
  <div class="row mt-4">
    <div class="col">
      <h2>Enter Car Details</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
          <label for="vehicle_model">Vehicle Model</label>
          <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" required>
        </div>
        <div class="form-group">
          <label for="vehicle_number">Vehicle Number</label>
          <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
        </div>
        <div class="form-group">
          <label for="seating_capacity">Seating Capacity</label>
          <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" required>
        </div>
        <div class="form-group">
          <label for="rent_per_day">Rent per Day</label>
          <input type="number" class="form-control" id="rent_per_day" name="rent_per_day" required>
        </div>
        <!-- Hidden input field to include agency ID -->
        <?php
          
          if(isset($_SESSION['agency_id'])) {
            echo "<input type='hidden' name='agency_id' value='" . $_SESSION['agency_id'] . "'>";
          } else {
            // Handle if agency ID is not set in session
            echo "<p>Error: Agency ID not found</p>";
          }
        ?>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
</div>

<?php include './component/footer.html'; ?>

<!-- Bootstrap JS and other scripts can be included here if needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./scripts/navbar.js"></script>

</body>
</html>

<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    
    // Escape user inputs for security
    $vehicle_model = mysqli_real_escape_string($conn, $_POST['vehicle_model']);
    $vehicle_number = mysqli_real_escape_string($conn, $_POST['vehicle_number']);
    $seating_capacity = mysqli_real_escape_string($conn, $_POST['seating_capacity']);
    $rent_per_day = mysqli_real_escape_string($conn, $_POST['rent_per_day']);
    $agency_id = mysqli_real_escape_string($conn, $_POST['agency_id']);
    
    // Insert query
    $sql = "INSERT INTO cars (vehicle_model, vehicle_number, seating_capacity, rent_per_day, Agency_id) VALUES ('$vehicle_model', '$vehicle_number', '$seating_capacity', '$rent_per_day', '$agency_id')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Car details inserted successfully";
    } else {    
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
