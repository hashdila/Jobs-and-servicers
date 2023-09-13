<!DOCTYPE html>
<html>
<head>
    <title>Display Locations on Google Maps</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<?php
$host = 'localhost';  
$db   = 'jas';  
$user = 'root';  
$pass = '';  
$charset = 'utf8mb4'; 

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "SELECT * FROM cus_posts";
$stmt = $pdo->query($sql);
$locations = $stmt->fetchAll();
?>

<div class="boder shadow-lg p-3 border">
    
    <div id="map" ></div>
    </div>

<script>
    var locations = <?php echo json_encode($locations); ?>;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: new google.maps.LatLng(locations[0]['lat'], locations[0]['lng']),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        for (var i = 0; i < locations.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                map: map
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
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz6hD1YTyC3OSA2XoY4xnFulMVkOx2bDE&callback=initMap">
</script>
</body>
</html>
