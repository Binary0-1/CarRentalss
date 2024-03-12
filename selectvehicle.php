<?php
session_start();

// Include connection file
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    // Get data from the form
    $car_id = $_POST['car_id'];
    $user_id = $_SESSION['user_id'];
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $number_of_days = $_POST['number_of_days'];
    $Agency_id = $_POST['Agency_id'];
    
    // Insert booking information into the bookings table
    $sql = "INSERT INTO bookings (car_id, user_id, start_date, number_of_days, Agency_id) 
            VALUES ('$car_id', '$user_id', '$start_date', '$number_of_days', '$Agency_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Booking successfully submitted!";
        header("Location: booking_confirmation.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Cars for Rent</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Additional styling can be added here */
  </style>
</head>
<body>
    <?php 
    include './component/navbar.html';
?>

<div class="container">
  <div class="row mt-4">
    <div class="col">
      <h2>Available Cars for Rent</h2>
      <div id="carsList" class="mt-3">
        <!-- Car list will be populated dynamically from PHP -->
        <?php
          include 'connection.php';
          $sql = "SELECT car_id, vehicle_model, vehicle_number, seating_capacity, rent_per_day, Agency_id FROM cars";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table'><thead><tr><th>Vehicle Model</th><th>Vehicle Number</th><th>Seating Capacity</th><th>Rent per Day</th><th>Start Date</th></tr></thead><tbody>";
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["vehicle_model"] . "</td>";
              echo "<td>" . $row["vehicle_number"] . "</td>";
              echo "<td>" . $row["seating_capacity"] . "</td>";
              echo "<td>" . $row["rent_per_day"] . "</td>";
              
              // Show start date dropdown and Book Now button only if user is logged in
              if(isset($_SESSION['username'])) {

                echo "<td>";
                echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>";
                echo "<input type='date' class='form-control start-date' name='start_date' min='" . date('Y-m-d') . "'>";
                echo "<input type='hidden' name='car_id' value='" . $row['car_id'] . "'>";
                echo "<input type='hidden' name='Agency_id' value='" . $row['Agency_id'] . "'>";
                echo "<select class='form-control days-dropdown' name='number_of_days'>";
                echo "<option>Select Number of Days</option>";
                echo "<option value='1'>1 Day</option>";
                echo "<option value='2'>2 Days</option>";
                echo "<option value='3'>3 Days</option>";
                // Add more options as needed
                echo "</select>";
                echo "<button type='submit' class='btn btn-primary'>Book Now</button>";
                echo "</form>";
                echo "</td>";
              } else {
                // If user is not logged in, show login button
                echo "<td colspan='2'>";
                echo "<a class='btn btn-primary' href='login-user.php'>Login to Book</a>"; 
                echo "</td>";
              }
              
              echo "</tr>";
            }
            echo "</tbody></table>";
          } else {
            echo "0 results";
          }

          // Close connection
          $conn->close();
        ?>
      </div>
    </div>
  </div>
</div>
<?php include './component/footer.html'; ?>

<!-- Bootstrap JS and other scripts can be included here if needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./scripts/navbar.js"></script>

<script>
  $(document).ready(function() {
    // Check if the user is logged in
    var isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;
    
    // Enable/disable the dropdowns based on the user's login status
    if (isLoggedIn) {
      $('.start-date').prop('disabled', false);
      $('.days-dropdown').prop('disabled', false);
    } else {
      $('.start-date').prop('disabled', true);
      $('.days-dropdown').prop('disabled', true);
    }
  });
</script>

</body>
</html>
