<!DOCTYPE html>
<html>
  <head>
    <title>Simple Google Maps API Test</title>
    <style>
      #map {
        height: 400px; /* Adjust height as needed */
        width: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script async defer

      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&callback=initMap">
    </script>
    <script>
      function initMap() {
        // Replace with your desired location coordinates
        const center = { lat: 40.7128, lng: -74.0059 }; // New York City coordinates

        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 8,
          center: center,
        });
      }
    </script>
  </body>
</html>
