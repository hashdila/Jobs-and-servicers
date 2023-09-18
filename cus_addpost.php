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



    header("Location: cus_home.php");
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Job Post Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <style>
        .image-preview img {
            max-width: 200px;
            display: none;
        }

        .photo-mark {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }
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
        <h3 class="hed text-center display-4"><strong>Post a Job</strong></h3>
        <hr w-25>

            <form action="" method="post" enctype="multipart/form-data">
                <!-- Your form fields here... -->
                <div class="form-group">
                    <label for="name"><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="address"><strong>Address</strong></label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="work_description"><strong>Work Description</strong></label>
                    <textarea name="work_description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="location"><strong>Area</strong></label>
                    <select name="location" class="form-control">
                        <option value="nun"><strong>Select</strong></option>
                        <option value="Kandy"><strong>Kandy</strong></option>
                        <option value="Peradeniya"><strong>Peradeniya</strong></option>
                        <option value="Theldeniya"><strong>Theldeniya</strong></option>
                        <option value="Negambo "><strong>Negambo</strong></option>
                        <option value="Colombo 1"><strong>Colombo 1</strong></option>
                        <option value="Colombo 2"><strong>Colombo 2</strong></option>
                        <option value="Colombo 3"><strong>Colombo 3</strong></option>
                        <!-- Add more location options as needed -->
                    </select>
                </div>

                <div id="map-section">
                    <h4><strong>Location on map</strong></h4>
                    <div id="map"></div>
                    <br>
                    <!-- Latitude, Longitude, and Address fields hidden by default -->
                    <div class="form-group" style="display: none;">
                        <label for="lat"><strong>Latitude</strong></label>
                        <input type="text" id="lat" name="lat" class="form-control">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="lng"><strong>Longitude</strong></label>
                        <input type="text" id="lng" name="lng" class="form-control">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="map_address"><strong>Address</strong></label>
                        <input type="text" id="map_address" name="map_address" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="image"><strong>Image</strong></label>
                    <div class="d-flex">
                        <div class="image-upload-container" style="flex: 1;">
                            <input type="file" name="image1" class="form-control" style="display: none;" onchange="previewImage(this, 'previewImage1')">
                            <label for="image1" class="photo-mark" onclick="document.getElementsByName('image1')[0].click()"><strong>Upload Image</strong></label>
                            <img id="previewImage1" src="placeholder.png" alt="Image 1 Preview" class="img-thumbnail" style="max-width: 200px; display: none;">
                        </div>
                        <div class="image-upload-container" style="flex: 1;">
                            <input type="file" name="image2" class="form-control" style="display: none;" onchange="previewImage(this, 'previewImage2')">
                            <label for="image2" class="photo-mark" onclick="document.getElementsByName('image2')[0].click()"><strong>Upload Image</strong></label>
                            <img id="previewImage2" src="placeholder.png" alt="Image 2 Preview" class="img-thumbnail" style="max-width: 200px; display: none;">
                        </div>
                        <div class="image-upload-container" style="flex: 1;">
                            <input type="file" name="image3" class="form-control" style="display: none;" onchange="previewImage(this, 'previewImage3')">
                            <label for="image3" class="photo-mark" onclick="document.getElementsByName('image3')[0].click()"><strong>Upload Image</strong></label>
                            <img id="previewImage3" src="placeholder.png" alt="Image 3 Preview" class="img-thumbnail" style="max-width: 200px; display: none;">
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="phone_number"><strong>Phone Number</strong></label>
                    <input type="text" name="phone_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="need_t"><strong>Technician You Need</strong></label>
                    <select name="need_t" class="form-control">
                        <option value="nun"><strong>Any</strong></option>
                        <option value="Electrician"><strong>Electrician</strong></option>
                        <option value="Plumber"><strong>Plumber</strong></option>
                        <option value="Carpenter"><strong>Carpenter</strong></option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

               

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg rounded-pill"><strong>Post Job</strong></button>
                </div>


            </form>
        </div>
    </div>
</div>

    <script>
    var map;
    var geocoder;
    var marker;

    function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        window.alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    marker.setPosition(latlng);
    map.setCenter(latlng);
    geocodeLatLng(geocoder, latlng);
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            window.alert("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            window.alert("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            window.alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            window.alert("An unknown error occurred.");
            break;
    }
}







    function initMap() {
        var myLatLng = {lat: 7.2844, lng: 80.6332};

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: myLatLng
        });

        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function () {
            geocodeLatLng(geocoder, marker.getPosition());
        });

        geocoder = new google.maps.Geocoder;

        getCurrentLocation();
    }

    function geocodeLatLng(geocoder, latlng) {
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    $('#lat').val(marker.getPosition().lat());
                    $('#lng').val(marker.getPosition().lng());
                    $('#map_address').val(results[0].formatted_address);
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }

    // Note: The save button and AJAX request is removed since the form is now being submitted directly to the server
</script>
<script>
    function previewImage(input, imageId) {
        const preview = document.getElementById(imageId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = 'placeholder.png';
            preview.style.display = 'none';
        }
    }
</script>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz6hD1YTyC3OSA2XoY4xnFulMVkOx2bDE&callback=initMap"></script>
</body>
</html>
