<?php

include 'authcheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("UPDATE customers SET first_name = ?, last_name = ?, email = ?, date_of_birth = ?, phone = ?, address = ? WHERE id = ?");
    $stmt->bind_param('ssssssi', $firstname, $lastname, $email, $dob, $phone, $address, $user_id);

    if ($stmt->execute()) {
        header("Location:users.php");
    }

    $stmt->close();
    $conn->close();
}
?>