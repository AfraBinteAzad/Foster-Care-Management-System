<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Include database connection file
include_once "database.php";


$sql = "SELECT ChildID, Name, Amount FROM children WHERE Category = 'Academic'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Needing Assistance with Academic Fees</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Children Needing Assistance with Academic Fees</h2>
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Amount Needed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['ChildID']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td>$<?php echo $row['Amount']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No children need assistance with academic fees at the moment.</p>
        <?php endif; ?>
    </div>
</body>
<body>
    <div class="container">
        <div>
        <p>Thank you for considering donating to foster kids.</p>
        <p>Please contact us including the ChildID at <strong>fostercareaccount@gmail.com</strong> to further proceed with the donation </p>
        </div>
        <!-- Back to Donation Options and Logout buttons -->
        <br>
        <a href="pag1.php" class="btn btn-primary">Back to Donation Options</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
