
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
            <p class="lead"><a href="users.php"><i class="bi bi-arrow-left"></i></a></p>
            <?php include 'edituserslogic.php'; ?>
            <form action="updateusers.php" method="POST">
                <div class="row align-items-start">
                    <div class="col">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($first_name); ?>" required>
                        </div>
                        <br>
                    </div>
                    <div class="col">
                        <br>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
                            <span id="phonetext" class="form-text">Please include your country code.</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                        <br>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update User</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
