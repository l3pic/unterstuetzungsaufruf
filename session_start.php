<?php
    session_start();
    if(!isset($_SESSION['logged_in'])){
        $_SESSION['logged_in'] = false;
        $_SESSION['email'] = '';
        $_SESSION['login_error'] = '';
        $_SESSION['register_error'] = '';
        $_SESSION['name'] = '';
        $_SESSION['vorname'] = '';
    }
?>