<div>
    <x-main full-width>
        <x-slot:content>
            
            <x-header title="Navigate" subtitle="Efficient and Convenient Public Transportation for Everyone" separator with-anchor>
                <x-slot:middle class="!justify-end">
                    <x-input icon="o-magnifying-glass" placeholder="Search..." />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-funnel" />
                    <x-button icon="o-plus" class="btn-primary" />
                </x-slot:actions>
            </x-header>
            <button onclick="searchLocation()">Search Location</button>
            <div id="loading" class="spinner"></div>
            <div id="map" style="height: 1000px;"></div>
            
            <script>
                var map;
                var marker;
                var loading = document.getElementById('loading');
                var trail = [];  // Array to store the trail points

                function getLocation() {
                    // Show the loading spinner
                    loading.style.display = 'block';

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            console.log(pos);

                            // Initialize the map if it's not already initialized
                            if (!map) {
                                map = L.map('map').setView([pos.lat, pos.lng], 13);
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                }).addTo(map);
                            } else {
                                // Update the map center without changing the zoom level
                                map.panTo([pos.lat, pos.lng]);
                            }

                            // Remove the old marker if it exists
                            if (marker) {
                                map.removeLayer(marker);
                            }

                            // Add a new marker at the current location
                            marker = L.marker([pos.lat, pos.lng]).addTo(map);

                            // Add the current location to the trail
                            trail.push([pos.lat, pos.lng]);

                            // Draw the trail on the map
                            L.polyline(trail, {color: 'red'}).addTo(map);
                        });
                    }
                }

                // Call getLocation immediately
                getLocation();

                // Then call getLocation every 5 seconds
                setInterval(getLocation, 5000);

                // Search functionality
                function searchLocation() {
                    var searchQuery = prompt("Enter location to search:");

                    // Perform the search using the searchQuery
                    // You can use a geocoding service like Nominatim to convert the searchQuery to coordinates
                    // Once you have the coordinates, you can update the map and marker accordingly
                    // Here's an example using the Nominatim API:
                    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + searchQuery)
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                            if (data.length > 0) {
                                var result = data[0];
                                var lat = result.lat;
                                var lon = result.lon;

                                // Update the map center without changing the zoom level
                                map.panTo([lat, lon]);

                                // Remove the old marker if it exists
                                if (marker) {
                                    map.removeLayer(marker);
                                }

                                // Add a new marker at the search result location
                                marker = L.marker([lat, lon]).addTo(map);
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                }
            </script>
        </x-slot:content>
    </x-main>
</div>