<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit(); // Ensure that the script stops executing after redirection
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
    <title>Foster a child</title>
</head>
<body>
    <div class="container">

         <div>
            <h2>Pick an age group:</h2>
            <a href="childg1.php" class="btn btn-primary">0-5</a>
            <a href="childg2.php" class="btn btn-success">6-12</a>
            <a href="childg3.php" class="btn btn-info">13-18</a>
        </div>
        
        <!-- Logout button -->
        <br>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>
