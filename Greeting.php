<?php
    session_start();
    include './component/navbar.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Hello <?php echo "{$_SESSION['username']}";?>! you have succesfully created an account an are logged in  </h1>
    </div>
    
<?php include './component/footer.html'; ?>
</body>
<script src="./scripts/navbar.js"></script>


</html>