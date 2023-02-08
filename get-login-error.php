<?php
session_start();

// Holen der Session Daten
$login_error = $_SESSION['login_error'];

// Zurückgeben der session Daten als JSON String
echo json_encode($login_error);
?>