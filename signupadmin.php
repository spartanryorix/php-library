<?php
include 'authcheck.php';

$accountexists = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $servername = "localhost";
    $dbusername = "Abdul Rakeeb";
    $dbpassword = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, 
        $dbusername, $dbpassword, $dbname);

    $stmt = $conn->prepare("SELECT * FROM account_info WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $accountexists = 'Account already exists';
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO account_info (username, email, password, role) VALUES (?, ?, ?, 'admin')");
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute()) {
            $_SESSION['account_created'] = true; 
            header("Location: books.php");
            exit;        
        } 
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
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <style>
        a {
        color: white;
        text-decoration: none;
        }
        a:hover {
        color: lightblue;
        text-decoration: underline;
        }
    </style>

    <div class="card">
        <p class="lead"><a href="books.php"><i class="bi bi-arrow-left"></i></a></p>
        <h2 class="h2 text-center mb-2">Create an account</h2>
        <form class="form" action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" name="username" class="form-control" required>
                <span id="usernametext" class="form-text">Enter your username.</span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control" required>
                <span id="emailtext" class="form-text">Enter your email.</span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" required>
                <span id="passwordtext" class="form-text">Enter your password.</span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
        </form>
        <?php if (!empty($accountexists)): ?>
            <div class="p-3 text-center" style="color:red;">
                <b><?php echo $accountexists; ?></b>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
