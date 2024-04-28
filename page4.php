<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Ensure that the script stops executing after redirection
}

// Include database connection
include_once "database.php";

// Query to retrieve eligible foster parents for adoption (based on your criteria)
$sql = "SELECT * FROM fosterparent WHERE YearsOfExperience > 3";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Eligible Foster Parents for Adoption</title>
</head>
<body>
    <div class="container">
        <h2>Eligible Foster Parents for Adoption</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Years of Experience</th>
                    <!-- Remove the 'Action' column header -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Display eligible foster parents in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['YearsOfExperience'] . "</td>";
                    // Remove the form and button for 'Express Interest'
                    // echo "<td>";
                    // echo "<form method='POST' action='express_interest.php'>";
                    // echo "<input type='hidden' name='parent_id' value='" . $row['ParentID'] . "'>";
                    // echo "<button type='submit' class='btn btn-primary'>Express Interest</button>";
                    // echo "</form>";
                    // echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Button to navigate to another page -->
        <a href="adoption.php" class="btn btn-info">Children Available for Adoption</a>

        <!-- Logout button -->
        <br>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
