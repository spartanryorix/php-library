<?php

include 'authcheck.php';

if (isset($_GET['id'])) {
    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $user_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT name, email, phone FROM members WHERE id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $email, $phone);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
}
?>