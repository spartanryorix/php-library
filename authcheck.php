<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started yet
}

// Your authentication check logic here
if (!isset($_SESSION['username'])) {
    header('Location: welcome.php');
    exit;
}

$role = $_SESSION['role'];
?>
