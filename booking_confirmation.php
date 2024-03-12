<?php
session_start();
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
<?php include './component/navbar.html';?>
<div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-body'>
                        <h4 class='card-title'>Booking Confirmation</h4>
                        <p class='card-text'>Your booking has been created successfully.</p>
                        <a href='view_bookings.php' class='btn btn-primary'>View Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include './component/footer.html'; ?>
<!-- Bootstrap JS and other scripts can be included here if needed -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./scripts/navbar.js"></script>
</html>
