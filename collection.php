<?php include 'authcheck.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
    <style>
        /* Apply a fully black background to the offcanvas */
    .offcanvas-start {
        background-color: #000000 !important; /* Black background */
        color: #ffffff !important; /* White text */
    }

    /* Ensure text within offcanvas is white */
    .offcanvas-start .nav-link,
    .offcanvas-start .dropdown-item {
        color: #ffffff !important;
    }

    /* Ensure dropdown background is black and text is white */
    .dropdown-menu-dark {
        background-color: #000000 !important;
        color: #ffffff !important;
    }

    /* Ensure dropdown items are white */
    .dropdown-menu-dark .dropdown-item {
        color: #ffffff !important;
    }
    .card {
    margin-top: 70px; /* Adjust this value to ensure enough space */
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php if($role == 'admin') { ?>
          <span class="ps-4 me-auto navbar-text">Admin mode</span>
          <?php } ?>
          <span class="navbar-text">Welcome, <?php echo $_SESSION['username']; ?>!</span>
          <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Explore the Library</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column">
              <ul class="navbar-nav flex-grow-1 pe-3">
              <li class="nav-item">
                    <a class="nav-link" href="collection.php">Collection</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="books.php">Books</a>
                </li>
                <?php if ($role ==='admin') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Members</a>
                </li>
                <?php } ?>
              </ul>
              <?php if ($role === 'admin') { ?>
              <div class="mt-auto">
                <p><a href="signupadmin.php" class="lead">Create an account</a></p>
              </div>
              <?php } ?>
              <div class="mt-auto">
                <a href="logout.php" class="btn btn-danger w-100">Log Out</a>
              </div>
            </div>
          </div>
        </div>
    </nav>

    <div class="card">
      <h1>Your Collection</h1>
      <br>
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Book Name</th>
            <th>Author(s) Name</th>
            <th>Release Date</th>
            <th>Genre</th>
            <th>Return Date</th>
            <th>Return</th>
          </tr>
        </thead>
        <tbody>
          <?php include 'fetchcollection.php'; ?>
        </tbody>
      </table>
    </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>