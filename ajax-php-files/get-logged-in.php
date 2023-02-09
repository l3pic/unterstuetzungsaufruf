<?php
session_start();

// Holen der Session Daten
$logged_in = $_SESSION['logged_in'];

// Zurückgeben der session Daten als JSON String
echo json_encode($logged_in);
?>