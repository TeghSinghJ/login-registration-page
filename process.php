<?php
session_start();

include("db_connection.php"); 

$redirect_url = "login.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $check_user = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result_user = $conn->query($check_user);

    if ($result_user->num_rows > 0) {
        $_SESSION["email"] = $email;
        $redirect_url = "dashboard.php"; // Redirect to the dashboard or home page
    } else {
        $redirect_url .= "?error=Invalid email or password";
    }
}

$conn->close();
header("Location: " . $redirect_url);
exit();
?>
