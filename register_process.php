<?php
session_start();

include("db_connection.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];

    $check_username = "SELECT * FROM users WHERE email = '$email'";
    $result_username = $conn->query($check_username);

    if ($result_username->num_rows > 0) {
        echo "Username is already taken. Please choose another.";
    } else {
       
        $insert_user = "INSERT INTO users (name, email, address, contact,  password) VALUES ('$name', '$email', '$address', '$contact',  '$password')";
        $result_insert = $conn->query($insert_user);

        if ($result_insert) {
            $_SESSION["email"] = $email;
            header("Location: dashboard.php"); 
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}

$conn->close();
?>
