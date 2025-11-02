
<?php include 'authcheck.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/library/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style4.css">
</head>
<body>

    <div class="container mt-5">
        <div class="card">
            <p class="lead"><a href="books.php"><i class="bi bi-arrow-left"></i></a></p>
            <?php include 'editbookslogic.php'; ?>
            <form action="updatebooks.php" method="POST">
                <div class="row align-items-start">
                    <div class="col">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                        <div class="mb-3">
                            <label for="bookname" class="form-label">Book Name</label>
                            <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo htmlspecialchars($bookname); ?>" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="authorname" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="authorname" name="authorname" value="<?php echo htmlspecialchars($authorname); ?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Release Date</label>
                            <input type="date" class="form-control" id="releasedate" name="releasedate" value="<?php echo htmlspecialchars($releasedate); ?>" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo htmlspecialchars($genre); ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Book</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
