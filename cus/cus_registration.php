<?php
session_start();


include '../database_con.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
   
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Set the status (you can change the value according to your requirements)
    $status = "Active now";

    $profile_image = isset($_FILES["profile_image"]["name"]) ? $_FILES["profile_image"]["name"] : '';
    $target_dir = "../profile images/";
    if (!empty($profile_image)) {
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_dir . $profile_image);
    }

    // Generate a random ID for the user
    $ran_id = rand(time(), 100000000);

    // Update your SQL statement to include the unique_id and status fields
    $sql = "INSERT INTO users(unique_id, username, name, email, address, password, profile_image, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Update the execute() array to include the random ID and status
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$ran_id, $username, $name, $email, $address, $password, $target_dir . $profile_image, $status]);

    
    


    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['registration_success'] = true;

    echo "User registered successfully!";
    header('Location: cus_registration.php');




    exit;
}
?>


<!-- I will not be repeating the entire HTML part since it is largely unchanged. Just provide the changes below. -->

<form action="cus_registration.php" method="post" enctype="multipart/form-data">
    
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



    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                User registered successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="redirectToLogin()">OK</button>
            </div>
            </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function redirectToLogin() {
            location.href = 'cus_login.php';
        }

        document.addEventListener("DOMContentLoaded", function() {
            // If registration was successful, show the modal and unset the session variable
            <?php if(isset($_SESSION['registration_success']) && $_SESSION['registration_success']): ?>
            var myModal = new bootstrap.Modal(document.getElementById('successModal'), {});
            myModal.show();
            <?php unset($_SESSION['registration_success']); ?>
            <?php endif; ?>
        });
    </script>
</body>

</html>
