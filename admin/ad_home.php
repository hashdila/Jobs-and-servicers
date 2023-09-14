<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class= "container">
        <h1 class="heading">Admin</h1>
    <div class="container-fluid">
        <div class="row">
            <!-- Left Side Navigation -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-content1="content1">Content 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-content="content2">Content 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-content="content3">Content 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-content="content4">Content 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-content="content5">Content 2</a>
                        </li>
                        <!-- Add more navigation items as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Right Side Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div id="content1">
                    sdfsdfsdfsdfsdf
                    
                </div>
                <!-- <div id="content1">
                    12121121
                </div> -->
            </main>
        </div>
    </div>
</div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

    <script>
        // Example JavaScript to load content based on nav clicks
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll("#sidebar .nav-link");
            
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Load content for this link
                    let contentName = this.getAttribute('data-content');
                    document.querySelector("#content").innerText = contentName;

                    // Activate the current link
                    links.forEach(lnk => lnk.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>
