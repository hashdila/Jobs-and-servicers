<?php

    session_start();





    include '../database_con.php';

    $userDetails = [];

    if (isset($_SESSION["id"])) {
        $tec_id = $_SESSION["id"];
        $sql = "SELECT name, address FROM users WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$tec_id]);
    
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $job_category = $_POST["job_category"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $work_description = $_POST["work_description"];
    $location = $_POST["location"];
    $phone_number = $_POST["phone_number"];
    $tec_id = $_SESSION["id"];

    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    $mapAddress = $_POST["map_address"];

    $image1 = $_FILES["image1"]["name"];
    $image2 = $_FILES["image2"]["name"];
    $image3 = $_FILES["image3"]["name"];

    $target_dir = "../images/";

    move_uploaded_file($_FILES["image1"]["tmp_name"], $target_dir . $image1);
    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_dir . $image2);
    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_dir . $image3);


    $sql = "INSERT INTO tec_posts (name, job_category, age, physical_address, work_description, image1, image2, image3, location, phone_number, tec_id, lat, lng, map_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $job_category,$age, $address, $work_description, $target_dir . $image1, $target_dir . $image2, $target_dir . $image3, $location, $phone_number, $tec_id, $lat, $lng, $mapAddress]);



    header("Location: tec_home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Post Form</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

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
            background-image: url('../application/tecaddhome.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php include 'tec_dashbord.php'; ?>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center display-4"><strong>Post a advertisment</strong></h3>
            <hr class="mx-auto" style="width: 25%;">

            <form action="tec_addpost.php" method="post" enctype="multipart/form-data">
                <!-- Your form fields here... -->
                <div class="form-group">
                    <label for="name"><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($userDetails['name']) ? $userDetails['name'] : ''; ?>">

                </div>
                
                <div class="form-group">
                    <label for="address"><strong>Address</strong></label>
                    <input type="text" name="address" class="form-control" value="<?php echo isset($userDetails['address']) ? $userDetails['address'] : ''; ?>">

                </div>
                <div class="form-group">
                    <label for="work_description"><strong>Description</strong></label>
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
                    <label for="age"><strong>Age</strong></label>
                    <input type="number" name="age" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="job_category"><strong>Job Category</strong></label>
                    <select name="job_category" class="form-control">
                        <option value="nun"><strong>Any</strong></option>
                        <option value="Electrician"><strong>Electrician</strong></option>
                        <option value="Plumber"><strong>Plumber</strong></option>
                        <option value="Carpenter"><strong>Carpenter</strong></option>
                        <option value="Electrician"><strong>Electrician</strong></option>
                        <option value="Cleaner"><strong>Cleaner</strong></option>
                        <option value="Driver"><strong>Driver</strong></option>
                        <option value="Mason"><strong>Mason</strong></option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div id="map-section">
                    <h4><strong>pin the corect location</strong></h4>
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
                

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary btn-lg ">Post Job</button>
                </div>
                <br>

            </form>
        </div>
    </div>
</div>










<script>
    var map;
    var geocoder;
    var marker;

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

<script>
    function previewImage(input, target) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById(target).setAttribute('src', e.target.result);
            document.getElementById(target).style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz6hD1YTyC3OSA2XoY4xnFulMVkOx2bDE&callback=initMap"></script>
</body>
</html>
