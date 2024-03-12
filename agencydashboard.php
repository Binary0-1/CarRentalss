<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        .content{
            height: 100vh;
        }
    </style>
</head>
<body>
<?php include './component/navbar.html';?>
<div class="container content">
    <div class="row mt-4">
      <div class="col">
        <h2 class="text-center my-5">Agency Dashboard</h2>
        <div class="d-flex justify-content-center">
            <a href="view_cars.php" class="btn btn-primary mx-3">View Your Cars</a>
            <a href="Addnewcars.php" class="btn btn-primary mx-3">Add New Cars</a>
            <a href="view_booked_cars.php" class="btn btn-primary mx-3">View Booked Cars</a>
        </div>
      </div>
    </div>
  </div>
  <?php include './component/footer.html'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./scripts/navbar.js"></script>
</html>
