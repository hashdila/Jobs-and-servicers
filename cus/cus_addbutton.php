<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Add Button</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @media (max-width: 768px) {
            .button-container {
                flex-direction: row !important;
            }

            .button-container a {
                margin: 0 10px !important; /* Adjust the margin to space the buttons appropriately */
            }
        }

        .animated-btn {
            transition: transform 0.3s ease;
        }

        .animated-btn:hover {
            transform: scale(1.1); /* The button will enlarge to 110% of its original size when hovered */
        }
    </style>
</head>

<body>

<div class="button-container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 20vh;">
    <!-- First Button -->
    <a href="cus_addpost.php" class="animated-btn" style="margin-bottom: 20px; display: block; text-align: center; background-image: url('../application/add1.png'); width: 100px; height: 100px; background-size: contain; background-repeat: no-repeat; background-position: center; border: none; font-size: 50px; padding: 20px 40px; border-radius: 10px; text-decoration: none;">
    </a>

    <!-- Second Button -->
    <a href="../chat/users.php" class="animated-btn" style="display: block; text-align: center; background-image: url('../application/chat1.png'); width: 90px; height: 90px; background-size: contain; background-repeat: no-repeat; background-position: center; border: none; font-size: 50px; padding: 20px 40px; border-radius: 10px; text-decoration: none;">
    </a>
</div>

</body>

</html>
