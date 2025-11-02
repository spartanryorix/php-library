<?php

$error = "";

include 'authlog.php';

if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $dbusername = "Abdul Rakeeb";
    $dbpassword = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, 
        $dbusername, $dbpassword, $dbname);

    $stmt = $conn->prepare("SELECT * FROM account_info WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: books.php");
            exit;
        } else {
            $error = "Incorrect username or password.";
        }
    } else {
        $error = "Incorrect username or password.";
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
        h6 a {
            color: white;
            text-decoration: none;
        }
        h6 a:hover {
            color: lightblue;
            text-decoration: underline;
        }   
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
        <p class="lead"><a href="welcome.php"><i class="bi bi-arrow-left"></i></a></p>
        <h2 class="h2 text-center mb-1">Sign in</h2>
        <form class="form" action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" name="username" class="form-control" required>
                <span id="usernametext" class="form-text">Enter your username.</span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" required>
                <span id="passwordtext" class="form-text">Enter your password.</span>
            </div>
            <button type="submit" name="submit_login" class="btn btn-primary w-100">Sign in</button>
        </form>
        <p class="lead text-center mt-2" style="font-size:large;"><a href="signup.php">Don't have an account? Create one!</a></p>
        <?php if (!empty($error)): ?>
            <div class="p-3 text-center" style="color:red;">
                <b><?php echo $error; ?></b>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
