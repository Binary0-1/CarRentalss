
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        background-image: url(./back.jpg);
      }
      
    
      .logincheck-text{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
      }
      .logincheck-text{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
    </style>
    <title>Document</title>
</head>
<body>
<?php include './component/navbar.html';
 ?>
 <div class="container main-content">
  <div class="row my-4 logincheck-main ">
    <div class="col-md-6 logincheck-text my-5">
        <h1>Welcome to Car Rentals</h1>
        <p class="mt-4">Let's get you started</p>
        <h6>Choose Your Role</h6>
    </div>
 
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
      <div class="text-center">
          <a href="login-user.php" class="btn btn-lg btn-secondary my-3 mx-3">Login as a User</a>
          <a href="login-agent.php" class="btn btn-lg btn-primary my-3 mx-3">Login as an Agency</a>
      </div>
    </div>
  </div>
</div>

<?php include './component/footer.html'; ?>
    
</body>

<script src="./scripts/navbar.js"></script>
</html>