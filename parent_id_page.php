<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Parent ID Page</title>
</head>
<body>
    <div class="container">
        <h1>Your Foster Parent ID</h1>
        <?php
        // Check if ParentID is set in the URL parameter
        if (isset($_GET['parentID'])) {
            $parentID = $_GET['parentID'];
            echo "<p>Your Foster Parent ID: <strong>$parentID</strong></p>";
        } else {
            echo "<p>ParentID not found.</p>";
        }
        ?>
        <a href="index.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
