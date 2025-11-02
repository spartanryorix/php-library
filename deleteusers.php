<?php

include 'authcheck.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("DELETE FROM members WHERE id = ?");
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        header("Location: users.php"); 
    } 
    
    $stmt->close();
    $conn->close();
}
?>
