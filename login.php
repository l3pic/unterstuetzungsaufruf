<?php
session_start();
$_SESSION['register_error'] = "";

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
$email = $_POST['email'];
$password = $_POST['password'];
$filename =  $_POST['filename'];

// SQL Query ausführen
$query = "SELECT * FROM unterstuetzer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  // Ausgabe der Daten aus jeder Reihe
  while($row = mysqli_fetch_assoc($result)) {
    $hashed_password = $row["password"];
    $name = $row["name"];
    $vorname = $row["vorname"];
  }
}
 
// Überprüfen, ob das vom Benutzer eingegebene Passwort mit dem Passwort in der Datenbank übereinstimmt.
if ($password == $hashed_password) {
  $_SESSION['logged_in'] = true;
  $_SESSION['email'] = $email;
  $_SESSION['name'] = $name;
  $_SESSION['vorname'] = $vorname;
  $_SESSION['login_error'] = "";
   
  // Zurück zur Seite auf der sich angemeldet wurde
  header('Location: ' . $filename);
  exit;
} else {
  $_SESSION['logged_in'] = false;
  $_SESSION['login_error'] = 'Der Benutzername oder das Passwort sind falsch. Bitte erneut versuchen.';

  // Zurück zur Seite auf der sich angemeldet wurde
  header('Location: ' . $filename);
  exit;
}
 
// Datenbankverbindung schließen
mysqli_close($conn);
?>