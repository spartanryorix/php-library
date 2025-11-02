
<?php include 'authlog.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style6.css">
</head>
<body>
    <div class="card">
        <h1>Welcome to the Library!</h1>
        <p class="lead">Organize and manage your personal library with ease. Keep track of your favourite books and authors all in one place.</p><br>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 25rem;">
                    <img src="books2.jpg" class="card-img-top" alt="book being opened">
                    <div class="card-body">
                      <p class="card-text">Already have an account? Log In to access your collection!</p>
                      <a href="login.php">
                        <div class="d-grid gap-2">
                          <button class="btn btn-primary" type="button">Sign in</button>
                        </div>   
                      </a> 
                    </div>
                </div>
            </div>
            <div class="col">
              <div class="card" style="width: 25rem;">
                <img src="books1.jpg" class="card-img-top" alt="book being opened">
                  <div class="card-body">
                    <p class="card-text">Don't have an account? Sign up to start building your collection!</p>
                    <a href="signup.php">
                      <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button">Sign up</button>
                      </div>   
                    </a> 
                  </div>
              </div>
            </div>
        </div>
    </div>
</body>
</html>