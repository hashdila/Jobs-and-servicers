<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <br>
    Latitude: <input type="text" id="lat"><br>
    Longitude: <input type="text" id="lng"><br>
    Address: <input type="text" id="address"><br>
    <button id="save">Save Location</button>
    <script>
        var map;
        var geocoder;
        var marker;

        function initMap() {
            var myLatLng = {lat: -25.363, lng: 131.044};

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: myLatLng
            });

            geocoder = new google.maps.Geocoder;

            google.maps.event.addListener(map, 'click', function(event) {
                if(marker) marker.setMap(null);
                marker = new google.maps.Marker({position: event.latLng, map: map});
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
                geocodeLatLng(geocoder, event.latLng);
            });
        }

        function geocodeLatLng(geocoder, latlng) {
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        document.getElementById('address').value = results[0].formatted_address;
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }

        $(document).ready(function() {
            $('#save').click(function() {
                var data = {
                    lat: $('#lat').val(),
                    lng: $('#lng').val(),
                    address: $('#address').val()
                };

                console.log(data);

                $.ajax({
                    url: './x.php', // Ensure the path is correct here
                    type: 'post',
                    data: data,
                    success: function(response) {
                        alert(response);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(JSON.stringify(xhr));
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz6hD1YTyC3OSA2XoY4xnFulMVkOx2bDE&callback=initMap"></script>
</body>
</html>


<?php
if (isset($_POST['lat'], $_POST['lng'], $_POST['address'])) {
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

    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    $address = $_POST["address"];

    $sql = "INSERT INTO locations (lat, lng, address) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$lat, $lng, $address]);

    // Added debug information to help troubleshooting.
    error_log("POST: " . print_r($_POST, true));

    echo "Location saved successfully!";
}
?>

