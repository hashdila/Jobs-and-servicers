
<!DOCTYPE html>
<html>
<head>
    <title>Display Locations on Google Maps</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        #map {
            position: relative;  
            z-index: 1;          
            height: 90vh;
            width: 100%;
            display: none;
            }
            .background {
            background-image: url('application/location.jpg'); /* Path to the background image */
            background-repeat: no-repeat; /* Ensures the image doesn't repeat */
            background-size: cover; /* Ensures the image covers the entire viewport */
            background-attachment: fixed; /* Keeps the image fixed during scrolling */
            background-position: center center; /* Ensures the image remains centered */
        }

        

    </style>
</head>
<body >




<?php

include 'database_con.php';

$pdo = new PDO($dsn, $user, $pass, $opt);

$sql1 = "SELECT * FROM tec_posts";
$stmt1 = $pdo->query($sql1);
$locations1 = $stmt1->fetchAll();

$sql2 = "SELECT * FROM cus_posts";
$stmt2 = $pdo->query($sql2);
$locations2 = $stmt2->fetchAll();
?>


<div class="background">
<div class="container  ">
    <div class="row">
        <!-- Left side for text -->

        
        <div class="col-md-6 d-flex justify-content-center align-items-center" style="text-shadow: 2px 2px 0 white, -2px -2px 0 white, 2px -2px 0 white, -2px 2px 0 white;">
            <h1>Customers & Technicians Post Location View</h1>
        </div>

        <!-- Right side for the map -->
        <div class="col-md-6">
            <div class="boder shadow-lg p-3 border" >
            <div id="map" class="border"></div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    var tecLocations = <?php echo json_encode($locations1); ?>;
    var cusLocations = <?php echo json_encode($locations2); ?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: new google.maps.LatLng(tecLocations[0]['lat'], tecLocations[0]['lng']),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        // Function to create markers
        function createMarkers(locations, iconURL) {
            console.log(iconURL); // This line will help debug the path
                for (var i = 0; i < locations.length; i++) {
                    var icon = {
                        url: iconURL, // URL
                        scaledSize: new google.maps.Size(30, 30), // scaled size
                        origin: new google.maps.Point(0, 0), // origin
                        anchor: new google.maps.Point(20, 20) // anchor (the tip of the marker)
                    };
                    
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                        map: map,
                        icon: icon
                    });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
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
        }


        createMarkers(tecLocations, 'application/tec.png');
        createMarkers(cusLocations, 'application/post.png');


        // Display user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var currentLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var currentLocationMarker = new google.maps.Marker({
                    position: currentLocation,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
                    animation: google.maps.Animation.BOUNCE // Add this line for a bounce animation
                    
                });

                map.setCenter(currentLocation);

                google.maps.event.addListener(currentLocationMarker, 'click', function() {
                    infowindow.setContent('This is your current location.');
                    infowindow.open(map, currentLocationMarker);
                });
            }, function() {
                alert('Error: The Geolocation service failed.');
            });
        } else {
            alert('Error: Your browser doesn\'t support geolocation.');
        }
    }
</script>
<script>setTimeout(function(){ currentLocationMarker.setAnimation(null); }, 2000);  // Stops the bounce after 2 seconds
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz6hD1YTyC3OSA2XoY4xnFulMVkOx2bDE&callback=initMap">
</script>
<script>
    $(document).ready(function() {
    var mapShown = false; // flag to ensure the animation only runs once

    $(window).scroll(function() {
        var top_of_element = $("#map").offset().top;
        var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        
        if (bottom_of_screen > top_of_element && !mapShown) {
            // The element is in view, start the animation
            mapShown = true; // set the flag to true
            $("#map").fadeIn(1000); // using a fade-in effect, but you can use any other animation
        }
    });
});


</script>
</body>
</html>


