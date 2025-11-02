<?php

$servername = "localhost";
$username = "Abdul Rakeeb";
$password = "Bd123Ac234A";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE borrowing SET returned_at = NOW() WHERE return_date <= NOW() AND returned_at IS NULL");
$stmt->execute();

$stmt->close();
$conn->close();
?>