<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

include_once "database.php";

// Query to retrieve social workers available for consultation
$sql = "SELECT WorkerID, Name, Email FROM socialworker WHERE AvailableForConsultation = 'Yes'";
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
    <title>Express Interest</title>
</head>
<body>
    <div class="container">
        <h2>Express Interest</h2>

        <!-- Display list of available social workers for consultation -->
        <h3>Available Social Workers:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>WorkerID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['WorkerID'] . "</td>"; 
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Instructions for expressing interest -->
        <div>
            <p>Thank you for considering reaching out. Please email any available Social Worker displayed above. Don't forget to mention your purpose (Adoption/Fostering), ParentID, and preferred ChildID in the email to proceed further. Your preferred Social Worker will reach out to you as soon as possible with updates.</p>
        </div>

        <!-- Navigation and logout buttons -->
        <br>
        <a href="index.php" class="btn btn-primary">Back to Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
