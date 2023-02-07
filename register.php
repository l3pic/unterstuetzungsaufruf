<?php
session_start();
$_SESSION['login_error'] = "";

$server = "localhost";
$username = "nevsub";
$password = "i6SG7";
$database = "nevsub";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 // Get the username and password entered by the user
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$password = $_POST['password'];
$filename =  $_POST['filename'];

// Prepare and execute the SQL query to check if the email already exists in the database
$query = "SELECT * FROM unterstuetzer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // If the email already exists, show an error message
    $_SESSION['register_error'] = "Die Email Adresse '$email' ist bereits vergeben.";
    header('Location: ' . $filename);
    exit;
} else {
    // If the email does not exist, insert it into the database
    $query = "INSERT INTO unterstuetzer (name, vorname, email, password) VALUES ('$nachname', '$vorname', '$email', '$password')";
    mysqli_query($conn, $query);
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['register_error'] = "";
    header('Location: ' . $filename);
    exit;
}

// Close the database connection
mysqli_close($conn);
?>