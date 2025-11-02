
<?php 
session_start();
if (!isset($_SESSION['failed_login']) || $_SESSION['failed_login'] !== true) {
    // If not set, redirect user away from the error page (to login page)
    header('Location: welcome.php');
    exit;
}
unset($_SESSION['failed_login']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="card">
        <h1>Invalid username or password.</h1>
        <p class="lead"><a href="login.php">Click here to try again</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>