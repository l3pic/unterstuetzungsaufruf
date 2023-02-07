<?php
session_start();
$_SESSION['register_error'] = "";

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
$email = $_POST['email'];
$password = $_POST['password'];
$filename =  $_POST['filename'];

 // Prepare and execute the SQL query to get the user's password from the database
$query = "SELECT password FROM unterstuetzer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $hashed_password = $row["password"];
    }
}
 
 // Überprüfen, ob das vom Benutzer eingegebene Passwort mit dem Passwort in der Datenbank übereinstimmt.
if ($password == $hashed_password) {
   $_SESSION['logged_in'] = true;
   $_SESSION['email'] = $email;
   $_SESSION['login_error'] = "";
   
   // Zurück zur Seite auf der sich angemeldet wurde
   header('Location: ' . $filename);
   exit;
 } else {
   $_SESSION['logged_in'] = false;
   $_SESSION['login_error'] = 'The username or password is incorrect. Please try again.';

   // Zurück zur Seite auf der sich angemeldet wurde
   header('Location: ' . $filename);
   exit;
 }
 
 // Schließen der Datenbank Verbindung

mysqli_close($conn);
?>