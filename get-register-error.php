<?php
session_start();

// Holen der Session Daten
$register_error = $_SESSION['register_error'];

// Zurückgeben der session Daten als JSON String
echo json_encode($register_error);
?>