<?php

include 'authcheck.php';

$servername = "localhost";
$username = "Abdul Rakeeb";
$password = "Bd123Ac234A";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

$loggedInUser = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT borrowing.id, borrowing.return_date, books.book_name, books.author_name, books.release_date, books.genre 
                        FROM borrowing
                        LEFT JOIN books
                        ON borrowing.book_id = books.id
                        WHERE borrowing.member_id = ? AND borrowing.returned_at IS NULL");

$stmt->bind_param('i', $loggedInUser);

$stmt->execute();

$stmt->bind_result($borrowedID, $returnDate, $bookname, $authorname, $releasedate, $genre);

while ($stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $bookname . "</td>";
    echo "<td>" . $authorname . "</td>";
    echo "<td>" . $releasedate . "</td>";
    echo "<td>" . $genre . "</td>";
    echo "<td>" .  date('Y-m-d H:i', strtotime($returnDate)) . "</td>";
    echo "<td><a href='returnlogic.php?borrowed_id=$borrowedID' class='btn btn-danger'>Return</a></td>";
    echo "</tr>";
}

$stmt->close();
$conn->close();
?>
