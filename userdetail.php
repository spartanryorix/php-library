<?php

include 'authcheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $servername = "localhost";
    $username = "Abdul Rakeeb";
    $password = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli ($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("INSERT INTO account_info (name, email, role) VALUES (?, ?, 'customer')");
    $stmt->bind_param('sss', $name, $email);

    if ($stmt->execute()) {
        header('Location: users.php');
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
            <p class="lead"><a href="users.php"><i class="bi bi-arrow-left"></i></a></p>
            <form class="form" action="userdetail.php" method="post">
                <div class="row align-items-start">
                    <div class="col">
                      <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input id="name" type="text" name="name" class="form-control" required>
                      </div>
                      <br>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                          <label for="email" class="form-label">Email Address</label>
                          <input id="email" type="email" name="email" class="form-control" required>
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