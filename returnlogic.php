<?php
include 'authcheck.php';

if (isset($_GET['borrowed_id'])) {
    $borrowedID = $_GET['borrowed_id'];

    // Database connection
    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Update the `returned_at` column for this borrowing record
    $stmt = $conn->prepare("UPDATE borrowing SET returned_at = NOW() WHERE id = ?");
    $stmt->bind_param('i', $borrowedID);

    if ($stmt->execute()) {
        header("Location: collection.php"); // Redirect to user's collection page
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    die("Error: Missing borrow_id.");
}
?>
