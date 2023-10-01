<?php
session_start(); // Added session_start to use session variables.

// Database connection

include '../database_con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $profile_image = isset($_FILES["profile_image"]["name"]) ? $_FILES["profile_image"]["name"] : '';
    $target_dir = "../profile images/";
    if (!empty($profile_image)) {
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_dir . $profile_image);
    }

    // Generate a random unique ID for the user
    $unique_id = rand(time(), 100000000);

    // Set the status (you can change the value according to your requirements)
    $status = "Active now";

    // Updated SQL query to include unique_id and status
    $sql = "INSERT INTO users (unique_id, name, email, nic, address, username, password, profile_image, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Updated bind_param to include unique_id and status
    $stmt->execute([ $unique_id, $name, $email, $nic, $address, $username, $password, $profile_image, $status]);

    echo "User registered successfully!";

    // Log the user in
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    // Redirect to tec_login.php
    header('Location: cus_login.php');
    exit;
}
?>


<!-- I will not be repeating the entire HTML part since it is largely unchanged. Just provide the changes below. -->

<form action="cus_registration.php" method="post" enctype="multipart/form-data">
    <!-- ... your form fields and design ... -->
</form>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
    <style>
        body, html {
            height: 100%;
        }

        #splitScreenContainer {
            display: flex;
            height: 100vh;
        }

        #bgVideo {
            width: 40%;
            height: 100%;
            object-fit: cover;
            border-right: 5px solid #1a1a1a;
        }

        #registrationPart {
            width: 60%;
            height: 100%;
            overflow-y: auto;
            padding: 5% 10%;
            background: linear-gradient(120deg, #2c3e50 0%, #34495e 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            /* align-items: center; */
        }

        .profile-image-container {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: 15px auto;
            overflow: hidden;
            background-color: #000;
        }

        .camera-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            padding: 5px;
            font-size: 20px;
            cursor: pointer;
            display: block;
        }

        @media (max-width: 767px) {
            #splitScreenContainer {
                flex-direction: column-reverse;
                align-items: center;
                justify-content: center;
            }

            #bgVideo {
                width: 100%;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                z-index: -1;
            }

            #registrationPart {
                width: 90%;
                height: 100vh;
                padding: 5% 10%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                background: rgba(44, 62, 80, 0.8);
            }
        }
    </style>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("profile-image-preview");
                preview.src = src;
                let cameraIcon = document.querySelector(".camera-icon");
                cameraIcon.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <div id="splitScreenContainer">

    <div class="position-absolute top-0 start-0 p-3">
        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
    </div>
    
        <div class="container" id="registrationPart">
            <h5 class="modal-title text-white mb-4 display-2">Customer Registration</h5>
            <form action="cus_registration.php" method="post"  enctype="multipart/form-data">
            <div class="mb-1  text-center">
                    <div class="profile-image-container position-relative">
                        <img id="profile-image-preview" src="#" class="w-100 h-100" />
                        <div class="camera-icon position-absolute top-50 start-50 translate-middle text-white" onclick="document.getElementById('profile-image-input').click();">📷</div>
                    </div>
                    <input type="file" name="profile_image" id="profile-image-input" class="d-none" onchange="showPreview(event)">
                </div>
                <!-- ... All your form fields ... -->
                <div class="mb-3">
                    <label for="name" class="form-label text-white fs-3">Name</label>
                    <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-white fs-3">Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="nic" class="form-label text-white fs-3">NIC</label>
                    <input type="text" class="form-control form-control-lg" id="nic" name="nic" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label text-white fs-3">Address</label>
                    <input type="text" class="form-control form-control-lg" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label text-white fs-3">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white fs-3">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>
                <div class="mt-4">
                    <p class="text-white fs-4">Already have an account? <a href="cus_login.php" class="text-warning">Login</a></p>
                </div>
            </form>
        </div>

        <video autoplay muted loop id="bgVideo">
            <source src="../application/logvideo.mp4" type="video/mp4">
        </video>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
