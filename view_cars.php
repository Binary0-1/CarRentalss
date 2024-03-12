<?php
session_start();
include('connection.php');

// Check if user is logged in and agency_id is set in session
if (!isset($_SESSION['username']) || !isset($_SESSION['agency_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch cars data for the agency
$agency_id = $_SESSION['agency_id'];
$sql = "SELECT * FROM cars WHERE agency_id = $agency_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Cars</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
    include './component/navbar.html';
?>
  <div class="container mt-4">
    <h2 class="mb-4">View Cars</h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Vehicle Model</th>
            <th>Vehicle Number</th>
            <th>Seating Capacity</th>
            <th>Rent per Day</th>
            <th>Action</th> <!-- Added Action column -->
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["vehicle_model"] . "</td>";
                  echo "<td>" . $row["vehicle_number"] . "</td>";
                  echo "<td>" . $row["seating_capacity"] . "</td>";
                  echo "<td>" . $row["rent_per_day"] . "</td>";
                  // Add Edit button with a link to editcardetails.php
                  echo "<td><a href='editcardetails.php?car_id=" . $row["car_id"] . "' class='btn btn-primary'>Edit</a></td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>No cars available for this agency</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include './component/footer.html'; ?>
  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="./scripts/navbar.js"></script>
</body>
</html>
