<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bootstrap 5 Navigation Bar</title>
  <!-- Include Bootstrap 5 CSS from CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navigation Bar -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <!-- Updated data attributes for Bootstrap 5 -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="account_manage.php">Account manage</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="tec_post_manage.php">Technician post manage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cus_post_manage.php">Customer post manage</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto"> <!-- Push this to the right -->
        <li class="nav-item">
                <div class="text-center mt-4">
                    <a href="../logout.php" class="btn btn-danger">Logout</a>
                </div>
        </li>
      </ul>
    </div>
    </div>
  </nav>

  <!-- Include Bootstrap 5 JS from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
