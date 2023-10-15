<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Background with Buttons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="position-relative vh-100">
    <!-- Video Background -->
    <video autoplay muted loop class="position-absolute w-100 h-100" style="object-fit: cover;">
        <source src="../application/admin.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay Content -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div style="width: 90%;">
            <a href="account_manage.php" class="btn btn-primary btn-lg btn-block mb-2" style="font-size: 1.5rem; transition: transform 0.5s; transform: translateY(2rem); opacity: 0; border-radius: 25px;">
                <i class="fas fa-user"></i> User Account Manage
            </a>
            <a href="cus_post_manage.php" class="btn btn-primary btn-lg btn-block mb-2" style="font-size: 1.5rem; transition: transform 0.6s; transform: translateY(2rem); opacity: 0; border-radius: 25px;">
                <i class="fas fa-users"></i> Customer Post Manage
            </a>
            <a href="tec_post_manage.php" class="btn btn-primary btn-lg btn-block" style="font-size: 1.5rem; transition: transform 0.7s; transform: translateY(2rem); opacity: 0; border-radius: 25px;">
                <i class="fas fa-wrench"></i> Technician Post Manage
            </a>
        </div>
    </div>


    <!-- Logout Mark on Right -->
    <div class="position-absolute top-0 end-0 m-3">
        <a href="javascript:void(0)" class="btn btn-danger logout-button" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
    </div>

</div>
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach((btn, index) => {
            setTimeout(() => {
                btn.style.transform = 'translateY(0)';
                btn.style.opacity = '1';
            }, 200 * index);
        });
    });
</script>


</body>

</html>


