<?php

include 'authcheck.php';
include 'updatereturncol.php';

$servername = "localhost";
$username = "Abdul Rakeeb";
$password = "Bd123Ac234A";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

$loggedInUser = $_SESSION['user_id']; 

$stmt = $conn->prepare("SELECT id, book_name, author_name, release_date, genre FROM books");

$stmt->execute();

$stmt->bind_result($bookID, $bookname, $authorname, $releasedate, $genre);
$result = $stmt->get_result(); // Fetch all rows at once
$stmt->close(); 

while ($row = $result->fetch_assoc()) {
    $borrowedBy = null;
    $bookID = $row['id'];
    $bookname = $row['book_name'];
    $authorname = $row['author_name'];
    $releasedate = $row['release_date'];
    $genre = $row['genre'];

    // Check if the book is already in the collection
    $check_stmt = $conn->prepare("SELECT member_id, return_date FROM borrowing WHERE book_id = ? AND returned_at IS NULL");
    $check_stmt->bind_param('i', $bookID);
    $check_stmt->execute();
    $check_stmt->bind_result($borrowedBy, $returnDate);
    $check_stmt->fetch();
    $check_stmt->close();
    
    echo "<tr>";
    echo "<td>" . $bookname . "</td>";
    echo "<td>" . $authorname . "</td>";
    echo "<td>" . $releasedate . "</td>";
    echo "<td>" . $genre . "</td>";
    if ($borrowedBy === $loggedInUser) {
        echo '<td><button class="btn btn-secondary" disabled>Borrowed by You</button></td>';
    } elseif ($borrowedBy) {
        echo '<td><button class="btn btn-secondary" disabled>Borrowed</button></td>';
    } else {
        echo   '<td>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Borrow
                        </button>
                        <form class="dropdown-menu dropdown-menu-dark p-4" method="post" action="borrowlogic.php">
                            <div class="mb-3">
                            <label for="returndate" class="form-label">Return date</label>
                            <input type="date" class="form-control" id="returndate" name="returnDate" required><br>
                            <input type="hidden" name="book_id" value="' . $bookID . '">
                            </div>
                            <button type="submit" class="btn btn-success">Borrow</button>
                        </form>
                    </div>
                </td>';
    }
    if ($borrowedBy) {
        echo "<td>" .  date('Y-m-d H:i', strtotime($returnDate)) . "</td>";
    } else {
        echo "<td>Not borrowed</td>";
    }
    if ($role === 'admin') {
        echo "<td><a href='deletebooks.php?id=$bookID' class='btn btn-danger'>Delete</a></td>";
        echo "<td><a href='editbooks.php?id=$bookID' class='btn btn-warning'>Edit</a></td>";
        echo "</tr>";
    }
}

$conn->close();
?>
