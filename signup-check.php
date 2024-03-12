
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      .main-content{
        height: 100vh;
      }
    </style>
    <title>Document</title>
</head>
<body>
<?php include './component/navbar.html';
 ?>
 <div class="container" style="height: 100vh;">
 <div class="row my-4">
    <!-- Left Section with Title and Paragraph -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="text-left my-3">
        <h2>Welcome to Car rental </h2>
        <p class="mt-4">let's get you started</p>
      </div>
    </div>
    <!-- Right Section with Image -->
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center  ">
      <div>
        <a href="signup-user.php" class="btn btn-primary my-3 mx-3">Sign up as a user</a>
      </div>
      <div>
        <a href="signup-agent.php" class="btn btn-primary my-3 mx-3">Sign up as a agency</a>
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