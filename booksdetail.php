<?php
include 'authcheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $releasedate = $_POST['releasedate'];
    $genre = $_POST['genre'];
    $loggedInUser = $_SESSION['user_id'];

    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("INSERT INTO books (book_name, author_name, release_date, genre, added_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssi', $bookname, $authorname, $releasedate, $genre, $loggedInUser);

    if ($stmt->execute()) {
        header('Location: books.php');
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <p class="lead"><a href="books.php"><i class="bi bi-arrow-left"></i></a></p>
            <form class="form" action="booksdetail.php" method="post">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="mb-3">
                            <label for="bookname" class="form-label">Book Name</label>
                            <input id="bookname" type="text" name="bookname" class="form-control" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="authorname" class="form-label">Author Name</label>
                            <input id="authorname" type="text" name="authorname" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="releasedate" class="form-label">Release Date</label>
                            <input id="releasedate" type="date" name="releasedate" class="form-control" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input id="genre" type="text" name="genre" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
