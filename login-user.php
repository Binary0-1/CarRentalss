<?php
// Check if form is submitted
session_start();
include('connection.php'); 
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $username = stripcslashes($username);  
    $password = stripcslashes($password); 
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "select *from user where Username = '$username' and Password = '$password'"; 
    $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        if($count == 1){  
            $_SESSION['username'] = $username;  
            $_SESSION['user_id'] = $row['UserID'];
            // echo "{$_SESSION['user_id']}";
            header("Location: selectvehicle.php");
            exit();

        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }  
   
}

?>

<?php include './component/navbar.html';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
  
</head>
<body>
<div class="container mt-5">
    <?php if(isset($_SESSION['username'])): ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Welcome back, <?php echo $_SESSION["username"] ?>!
                </div>
                <div class="card-body">
                    <p><a href='logout.php' class="btn btn-primary">Logout</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="heading ">Welcome to UserLogin </h1>
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php include './component/footer.html'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./scripts/navbar.js"></script>

</body>
</html>
