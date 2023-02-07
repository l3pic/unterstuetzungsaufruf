<?php
    $filename =  $_POST['filename'];
    session_start();
    session_destroy();
    header('Location: ' . $filename);
?>