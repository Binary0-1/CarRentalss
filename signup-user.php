<?php
    session_start();
    include './component/navbar.html';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    
    <!-- page content goes here -->
    <div class="container js-signup">
        <h2>Sign Up as a user</h2>
        <form id="signupForm" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="user" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
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
<?php
include 'connection.php'; // Include your database connection file here
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data has been submitted
    if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        // Retrieve form input values
        $username = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Using prepared statements to prevent SQL injection
        $sql = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $email);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Close the prepared statement
            mysqli_stmt_close($stmt);
            // Close the database connection
            // @ts-ignore
            mysqli_close($conn);
            // Create a session variable for the user
            $_SESSION["username"] = $username;
            // Redirect the user to the greeting page
            header("Location: greeting.php");
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



</html>