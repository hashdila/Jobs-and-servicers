<?php
session_start();

$host = "localhost";
$db = "jas";
$user = "root";
$pass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $job_category = $_POST["job_category"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Set the status (you can change the value according to your requirements)
    $status = "Active now";

    $profile_image = $_FILES["profile_image"]["name"];
    $target_dir = "profile images/";
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_dir . $profile_image);

    // Generate a random ID for the user
    $ran_id = rand(time(), 100000000);

    // Update your SQL statement to include the unique_id and status fields
    $sql = "INSERT INTO users(unique_id, username, name, email, address, job_category, password, profile_image, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Update the execute() array to include the random ID and status
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$ran_id, $username, $name, $email, $address, $job_category, $password, $target_dir . $profile_image, $status]);

    echo "User registered successfully!";

    // Log the user in
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    // Redirect to tec_login.php
    header('Location: tec_login.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

    <style>
        body, html {
            height: 100%;
        }

        /* Desktop View */
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
            overflow-y: auto; /* allows scrolling */
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
                border-right: none;
            }

            #registrationPart {
                width: 90%;
                height: 100vh; 
                padding: 5% 10%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start; /* align content to the start */
                align-items: center;
                background: rgba(44, 62, 80, 0.8); /* Slightly transparent to see the video behind */
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
    <div  id="splitScreenContainer">
        <!-- Background Video -->

        <!-- Registration Part -->
        <div class="container" id="registrationPart">
                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <h5 class="modal-title text-white mb-4 display-2">Registration</h5>
                </div>

            <form  action="tec_registration.php" method="post" enctype="multipart/form-data">
                <div class="mb-1  text-center">
                    <div class="profile-image-container position-relative">
                        <img id="profile-image-preview" src="#" class="w-100 h-100" />
                        <div class="camera-icon position-absolute top-50 start-50 translate-middle text-white" onclick="document.getElementById('profile-image-input').click();">📷</div>
                    </div>
                    <input type="file" name="profile_image" id="profile-image-input" class="d-none" onchange="showPreview(event)">
                </div>

                

                <div class="mb-3">
                    <label for="name" class="form-label text-white fs-3">Full Name</label>
                    <input type="text" name="name" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-white fs-3">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label text-white fs-3">Address</label>
                    <input type="text" name="address" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="job_category" class="form-label text-white fs-3">Job Category</label>
                    <select name="job_category" class="form-control form-control-lg">
                        <option value="Select">Select</option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Mason">Mason</option>
                        <option value="Plumber">Plumber</option>
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label text-white fs-3">Username</label>
                    <input type="text" name="username" class="form-control form-control-lg">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-white fs-3">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>

                <div class="mt-4">
                    <p class="text-white fs-4">Already have an account? <a href="tec_login.php" class="text-warning">Login</a></p>
                </div>
            </form>
            <!-- ... Rest of your form and components ... -->
        </div>

        <video autoplay muted loop id="bgVideo">
            <source src="application/logvideo.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Bootstrap 5 JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
