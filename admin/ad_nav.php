<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bootstrap 5 Navigation Bar</title>
  <!-- Include Bootstrap 5 CSS from CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>

  <!-- Navigation Bar -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="ad_home.php"><i class="fas fa-home"></i> Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="account_manage.php"><i class="fas fa-user-cog"></i> Account manage</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tec_post_manage.php"><i class="fas fa-wrench"></i> Technician post manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cus_post_manage.php"><i class="fas fa-users"></i> Customer post manage</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto"> 
                <li class="nav-item">
                    <div class="text-center mt-4">
                    <a href="javascript:void(0)" class="btn btn-danger logout-button" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="../logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    $(".logout-button").click(function(){
        $("#logoutModal").modal();
    });
});
</script>

  <!-- Include Bootstrap 5 JS from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
