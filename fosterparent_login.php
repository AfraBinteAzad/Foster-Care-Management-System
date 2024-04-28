<?php
session_start();

// Include database connection
include_once "database.php";

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve form data
    $parentID = $_POST["parentID"];
    $loginEmail = $_POST["loginEmail"];

    // Query to check if the provided ParentID and Email match a record in the database
    $sql = "SELECT * FROM fosterparent WHERE ParentID = '$parentID' AND Email = '$loginEmail'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Valid credentials, redirect to the dashboard or profile page
        $_SESSION["user"] = "fosterparent"; // Set a session variable to identify the user type
        header("Location: fosterkid.php");
        exit();
    } else {
        // Invalid credentials, show error message
        echo "<div class='container'>";
        echo "<h2>Invalid Parent ID or Email. Please try again.</h2>";
        echo "<a href='page2.php' class='btn btn-primary'>Back</a>";
        echo "</div>";
    }

    mysqli_close($conn);
}
?>
