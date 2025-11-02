<?php

include 'authcheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'], $_POST['returnDate'])) {
    $bookID = $_POST['book_id'];
    $returnDate = $_POST['returnDate'];
    $loggedInUser = $_SESSION['user_id'];

    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $stmt = $conn->prepare("INSERT INTO borrowing (book_id, member_id, return_date) VALUES (?, ?, ?)");
    $stmt->bind_param('iis', $bookID, $loggedInUser, $returnDate);

    if ($stmt->execute()) {
        header("Location: books.php");
        exit;
    }

    $stmt->close();
    $conn->close();
}

?>