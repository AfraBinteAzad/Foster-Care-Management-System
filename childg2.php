<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit(); // Ensure that the script stops executing after redirection
}

// Include database connection
include_once "database.php";


$sql = "SELECT * FROM children WHERE Age >= 6 AND Age <= 12 AND status = 'Available for Foster Care'";
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
    <title>Children Available for Foster Care (6-12)</title>
</head>
<body>
    <div class="container">
        <h2>Children Available for Foster Care (6-12)</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Child ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Action</th> <!-- New column for action buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Display children in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ChildID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Age'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='express_interest.php'>";
                    echo "<input type='hidden' name='child_id' value='" . $row['ChildID'] . "'>";
                    echo "<button type='submit' class='btn btn-primary'>Express Interest</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

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
