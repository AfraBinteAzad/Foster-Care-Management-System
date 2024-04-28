<?php
session_start();

// Include database connection
include_once "database.php";

// Check if the form is submitted for signing up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Retrieve form data
    $name = $_POST["name"];
    $partnerName = $_POST["partnerName"];
    $status = $_POST["status"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];

    // Query to get the maximum ParentID from the database
    $maxIDQuery = "SELECT MAX(ParentID) AS maxID FROM fosterparent";
    $result = mysqli_query($conn, $maxIDQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $nextParentID = $row['maxID'] + 1; // Increment the last ID to assign the next ID
    } else {
        $nextParentID = 1001; // Default starting ID if table is empty
    }

    // Insert into fosterparent table with the next available ParentID
    $sql = "INSERT INTO fosterparent (ParentID, Name, PartnerName, Status, Address, Email, PhoneNumber) 
            VALUES ('$nextParentID', '$name', '$partnerName', '$status', '$address', '$email', '$phoneNumber')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to a new page with the assigned ParentID
        header("Location: parent_id_page.php?parentID=$nextParentID");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Foster Parent Sign Up</title>
</head>
<body>
    <div class="container">
        <h1>Sign Up to be a Foster Parent</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Form fields based on fosterparent table structure -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="partnerName" class="form-label">Partner's Name</label>
                <input type="text" class="form-control" name="partnerName" placeholder="N/A">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phoneNumber" required>
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>

        <hr>

        <!-- Existing Foster Parent Login Form -->
        <h2>Already Signed Up? Log In</h2>
        <form method="POST" action="fosterparent_login.php">
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
