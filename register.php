<?php
session_start();
$_SESSION['login_error'] = "";

$server = "localhost";
$username = "nevsub";
$password = "i6SG7-i6SG7";
$database = "nevsub";

// Verbindung zur Datenbank
$conn = mysqli_connect($server, $username, $password, $database);

// Verbindung überprüfen
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// POST Variablen abrufen
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$password = $_POST['password'];
$filename =  $_POST['filename'];

// SQL Query ausführen
$query = "SELECT * FROM unterstuetzer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  // überprüfen ob die E-Mail bereits existiert
  $_SESSION['register_error'] = "Die Email Adresse '$email' ist bereits vergeben.";
  header('Location: ' . $filename);
  exit;
} else {
  // Falls nicht neuen unterstuetzer erstellen
  $query = "INSERT INTO unterstuetzer (name, vorname, email, password) VALUES ('$nachname', '$vorname', '$email', '$password')";
  mysqli_query($conn, $query);
  $_SESSION['logged_in'] = true;
  $_SESSION['email'] = $email;
  $_SESSION['register_error'] = "";
  header('Location: ' . $filename);
  exit;
}

// Datenbankverbindung schließen
mysqli_close($conn);
?>