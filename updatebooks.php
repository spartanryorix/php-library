<?php

include 'authcheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $releasedate = $_POST['releasedate'];
    $genre = $_POST['genre'];


    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("UPDATE books SET book_name = ?, author_name = ?, release_date = ?, genre = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $bookname, $authorname, $releasedate, $genre, $user_id);

    if ($stmt->execute()) {
        header("Location:books.php");
    }

    $stmt->close();
    $conn->close();
}
?>