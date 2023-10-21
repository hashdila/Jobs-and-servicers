<!DOCTYPE html>
<html>
<head>
    <title>Display Locations on Google Maps</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        #currentLocationIcon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            height: 24px;
            width: 24px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
include '../database_con.php';

$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "SELECT * FROM tec_posts";
$stmt = $pdo->query($sql);
$locations = $stmt->fetchAll();
?>

<div class="container">
    <h1 class="mt-5">Display Locations of Technicians</h1>
    <div id="map"></div>
    <div id="currentLocationIcon"></div>
    <label for="radiusSlider">Radius (in meters):</label>
    <input type="range" id="radiusSlider" min="1000" max="10000" step="1000" value="10000">
    <span id="radiusValue">10000</span>
</div>

<script>
    var locations = <?php echo json_encode($locations); ?>;
    var map, infowindow, circle;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: new google.maps.LatLng(locations[0]['lat'], locations[0]['lng']),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        infowindow = new google.maps.InfoWindow();

        for (var i = 0; i < locations.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(
                        'Name: ' + locations[i]['name'] + '<br>' +
                        'Age: ' + locations[i]['age'] + '<br>' +
                        'Address: ' + locations[i]['physical_address'] + '<br>' +
                        'Work Description: ' + locations[i]['work_description'] + '<br>' +
                        'Location: ' + locations[i]['location'] + '<br>' +
                        'Phone Number: ' + locations[i]['phone_number']
                    );
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var currentLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var currentLocationMarker = new google.maps.Marker({
                    position: currentLocation,
                    label: {
                        text: '🚶‍♂️',
                        fontSize: '24px',
                        fontWeight: 'bold'
                    },
                    animation: google.maps.Animation.BOUNCE,
                    map: map
                });

                google.maps.event.addListener(currentLocationMarker, 'click', function () {
                    infowindow.setContent('You are here!');
                    infowindow.open(map, currentLocationMarker);
                });

                circle = new google.maps.Circle({
                    map: map,
                    radius: 20000, // Default radius in meters
                    fillColor: '#0099FF',
                    fillOpacity: 0.3,
                    strokeColor: '#0099FF',
                    strokeOpacity: 0.5,
                    center: currentLocation
                });
            }, function () {
                console.log('Error obtaining current location');
            });
        } else {
            console.log('Your browser does not support geolocation');
        }

        document.getElementById('radiusSlider').addEventListener('input', function (e) {
            var newRadius = parseInt(e.target.value, 10);
            document.getElementById('radiusValue').textContent = newRadius;
            if (circle) {
                circle.setRadius(newRadius);
            }
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz6hD1YTyC3OSA2XoY4xnFulMVkOx2bDE&callback=initMap">
</script>
</body>
</html>
