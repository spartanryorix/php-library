<?php

include 'authcheck.php';

if (isset($_GET['id'])) {
    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $user_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT book_name, author_name, release_date, genre FROM books WHERE id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($bookname, $authorname, $releasedate, $genre);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
}
?>