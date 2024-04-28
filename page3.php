<?php
session_start();

// Include database connection
include_once "database.php";

// Check if the form is submitted for logging in
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve login credentials
    $parentID = $_POST["parentID"];
    $loginEmail = $_POST["loginEmail"];

    // Perform validation and authentication here
    // You can implement your authentication logic using the provided credentials

    // Example authentication (replace this with your actual authentication logic)
    $authenticated = true; // Assuming authentication is successful

    if ($authenticated) {
        // Redirect to page4.php upon successful login
        header("Location: page4.php");
        exit();
    } else {
        // Handle authentication failure (e.g., display an error message)
        echo "Authentication failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Foster Parent Login</title>
</head>
<body>
    <div class="container">
        <h1>Foster Parent Login</h1>
        
        <!-- Existing Foster Parent Login Form -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="parentID" class="form-label">Parent ID</label>
                <input type="text" class="form-control" name="parentID" required>
            </div>
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="loginEmail" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Log In</button>
        </form>
    </div>
</body>
</html>









