<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo pour {{ $weatherData['name'] }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #e0f7fa, #b2ebf2);
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
        }
        .card {
            border-radius: 10px;
        }
        .card-header {
            border-radius: 10px 10px 0 0;
        }
        #map {
            height: 400px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 20px;
        }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4QCIb8e5x_hLFqSr7jouVFkxXxG-UO4U&libraries=places&loading=async"></script>
    <script>
        function initMap() {
            var latLng = { lat: {{ $weatherData['coord']['lat'] }}, lng: {{ $weatherData['coord']['lon'] }} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: latLng
            });
            var marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
        }
    </script>
</head>
<body onload="initMap()">
    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
