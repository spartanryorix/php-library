<?php

include 'authcheck.php';

$servername = "localhost";
$username = "Abdul Rakeeb";
$password = "Bd123Ac234A";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("SELECT id, username, email FROM account_info WHERE role = 'customer' ");

$stmt->execute();

$stmt->bind_result($user_id, $name, $email);

while ($stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $email . "</td>";
    if ($role === 'admin') {
    echo "<td><a href='deleteusers.php?id=$user_id' class='btn btn-danger'>Delete</a></td>";
    echo "<td><a href='editusers.php?id=$user_id' class='btn btn-warning'>Edit</a></td>";
    }
    echo "</tr>";
}

$stmt->close();
$conn->close();
?>
