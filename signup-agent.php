<?php
    session_start();
    
    ?>
    <?php
include 'connection.php'; // Include your database connection file here


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data has been submitted
    if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['agency_id'])) {
        // Retrieve form input values
        $username = $_POST['user'];
        $password = $_POST['password'];
        $id = $_POST['agency_id'];

        // Using prepared statements to prevent SQL injection
        $sql = "INSERT INTO agencies (Agency_id,username, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $id,$username, $password);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Close the prepared statement
            mysqli_stmt_close($stmt);
            // Close the database connection
            // @ts-ignore
            mysqli_close($conn);
            // Create a session variable for the user
            $_SESSION["username"] = $username;
            $_SESSION['agency_id'] = $id;
            // Redirect the user to the greeting page
            header("Location: agencydashboard.php");
            exit(); // Ensure that no other code is executed after the redirection
        } else {
            // Output specific error message if an exception occurs during database operation
            echo "Could not register user: " . mysqli_error($conn);
        }
    } else {
        // Handle case where form fields are empty
        echo "Please fill in all required fields";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Agency</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include './component/navbar.html';?>
    
    <!-- page content goes here -->
    <div class="container js-signup">
        <h2>Sign Up as a Agency</h2>
        <form id="signupForm" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="user" required>
            </div>
            <div class="form-group">
                <label for="agency_id">Agency id</label>
                <input type="agency_id" class="form-control" id="agency_id" placeholder="Enter agency id" name="agency_id" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" required oninput="validatePasswords()">
                <small id="passwordError" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    <?php
    include './component/footer.html';
    ?>
</body>
<script src="./scripts/navbar.js"></script>
<script src="./scripts/signup.js"></script>




</html>