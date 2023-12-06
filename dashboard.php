<?php
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// If the user is logged in, display the dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Welcome to the Dashboard, <?php echo $_SESSION["email"]; ?>!</h2>
                <p class="text-center"><a href="logout.php">Logout</a></p>
            </div>
        </div>
    </div>
</body>
</html>
