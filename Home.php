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
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
<?php include './component/navbar.html';
 ?>
 <div class="container main-content">
  <div class="row">
    <!-- Left Section with Title and Paragraph -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="text-left">
        <h2>Easy And Fast Way To Rent Your Car</h2>
        <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec sapien quis mi convallis placerat. Integer ut dapibus ligula. Nullam viverra mi ut tincidunt molestie.</p>
        <a href="selectvehicle.php" class="btn btn-primary">Rent now</a>
      </div>
    </div>
    <!-- Right Section with Image -->
    <div class="col-md-6">
      <img src="./bmw-22428.png" class="img-fluid" alt="Image">
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