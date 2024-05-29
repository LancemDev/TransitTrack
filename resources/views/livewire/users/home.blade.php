<div>
    {{-- Welcome Modal --}}
    {{-- <x-modal wire:model="welcomeModal" title="Welcome to the User Dashboard">
        <p>
            Welcome to the user dashboard. This is the default homepage for passengers. You can navigate to other pages using the sidebar.
            <div class="text-sm text-gray-500 mt-2">
                Note that we are going to be using your location to provide you with the best services.
            </div>
        </p>

        <x-slot:actions>
            <x-button wire:click="closeModal" class="btn-primary">Got it!</x-button>
        </x-slot:actions>
    </x-modal> --}}

    {{-- A dashboard that can be minized and should be minimized by default --}}

    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
 
            {{-- BRAND --}}
            <div class="ml-5 pt-5">App</div>
 
            {{-- MENU --}}
            <x-menu activate-by-route>
 
                {{-- User --}}
                @if($user = auth()->user())
                    <x-menu-separator />
 
                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>
 
                    <x-menu-separator />
                @endif
 
                <x-menu-item title="Hello" icon="o-sparkles" link="/" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>
 
        {{-- The `$slot` goes here --}}
        <x-slot:content>
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
            </script>
        </x-slot:content>
    </x-main>

    <x-spotlight />

    
</div>
