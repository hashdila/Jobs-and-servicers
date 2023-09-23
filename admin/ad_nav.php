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
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link" href="#customer">Customer post manage</a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Include Bootstrap 5 JS from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
