<?php
session_start();
include('connection.php');
// Check if user is logged in and agency_id is set in session
if (!isset($_SESSION['username']) || !isset($_SESSION['agency_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Query to retrieve booked cars information for the specific agency
$sql = "SELECT * FROM bookings WHERE agency_id = " . $_SESSION['agency_id'];
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
  <h2>Booked Cars Information</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Car ID</th>
          <th>User ID</th>
          <th>Start Date</th>
          <th>Number of Days</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["car_id"] . "</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["number_of_days"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No booked cars found</td></tr>";
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
