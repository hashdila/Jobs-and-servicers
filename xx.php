<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: cus_login.php");
    exit;
}

$host = "localhost";
$db   = "jas";
$user = "root";
$pass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $work_description = $_POST["work_description"];
    $location = $_POST["location"];
    $phone_number = $_POST["phone_number"];
    $cus_id = $_SESSION["id"];
    $need_t = $_POST["need_t"];

    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    $mapAddress = $_POST["map_address"];

    $image1 = $_FILES["image1"]["name"];
    $image2 = $_FILES["image2"]["name"];
    $image3 = $_FILES["image3"]["name"];

    $target_dir = "images/";

    move_uploaded_file($_FILES["image1"]["tmp_name"], $target_dir . $image1);
    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_dir . $image2);
    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_dir . $image3);

    // $sql = "INSERT INTO locations (lat, lng, address) VALUES (?, ?, ?)";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$lat, $lng, $mapAddress]);

    // $sql = "INSERT INTO tec_posts (name, age, address, work_description, image1, image2, image3, location, phone_number, tec_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$name, $age, $address, $work_description, $target_dir . $image1, $target_dir . $image2, $target_dir . $image3, $location, $phone_number, $tec_id]);

    $sql = "INSERT INTO cus_posts (name, age, address, work_description, image1, image2, image3, location, phone_number, cus_id, need_t, lat, lng, map_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $age, $address, $work_description, $target_dir . $image1, $target_dir . $image2, $target_dir . $image3, $location, $phone_number, $cus_id, $need_t, $lat, $lng, $mapAddress]);



    header("Location: cus_dashbord.php");
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Job Post Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

        /* Apply custom styling to the map section */
        #map-section {
            background-color: #f8f9fa; /* Light gray background */
            padding: 20px;
            border-radius: 10px;
        }

        /* Apply custom fonts */
        body {
            font-family: Arial, sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php include 'cus_dashbord.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Post a Job</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Your form fields here... -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="work_description">Work Description</label>
                    <textarea name="work_description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image1">Image 1</label>
                    <input type="file" name="image1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image2">Image 2</label>
                    <input type="file" name="image2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image3">Image 3</label>
                    <input type="file" name="image3" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="location" class="form-control">
                        
                        <option value="nun">selet</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Peradeniya">Peradeniya</option>
                        <option value="Theldeniya">Theldeniya</option>
                        <option value="Negambo ">Negambo</option>
                        <option value="Colombo 1">Colombo 1</option>
                        <option value="Colombo 2">Colombo 2</option>
                        <option value="Colombo 3">Colombo 3</option>
                        <!-- Add more location options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control">
                </div>
                <div class="form-group">
                <label for="need_t">Tecnition You need</label>
                <select name="need_t" class="form-control">
                    <option value="nun">Any</option>
                    <option value="Electrician">Electrician</option>
                    <option value="Plumber">Plumber</option>
                    <option value="Carpenter">Carpenter</option>
                    <!-- Add more options as needed -->
                </select>
                </div>

                <!-- Map Section -->
                <div id="map-section">
                    <h4>Location</h4>
                    <div id="map"></div>
                    <br>
                    <!-- Latitude, Longitude, and Address fields hidden by default -->
                    <div class="form-group" style="display: none;">
                        <label for="lat">Latitude</label>
                        <input type="text" id="lat" name="lat" class="form-control">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="lng">Longitude</label>
                        <input type="text" id="lng" name="lng" class="form-control">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="map_address">Address</label>
                        <input type="text" id="map_address" name="map_address" class="form-control">
                    </div>
                </div>
                <!-- End of Map Section -->

                <button type="submit" class="btn btn-primary">Post Job</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Your map JavaScript code here...
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
