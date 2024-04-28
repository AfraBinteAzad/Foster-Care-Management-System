<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Make a donation</title>
</head>
<body>
    <div class="container">
     
    <div>
            <h2>Select a category:</h2>
            <a href="clothes.php" class="btn btn-primary">Clothes</a>
            <a href="medical_fees.php" class="btn btn-success">Medical Fees</a>
            <a href="academic_fees.php" class="btn btn-info">Academic Fees</a>
            <a href="central_location.php" class="btn btn-warning">Send Gifts to the foster kids</a>

        </div>
        
        <!-- Logout button -->
        <br>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>
