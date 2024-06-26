<div>

        @if(session('success'))
            <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 justify-end">
                    <div
                        class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-yellow-400 border-l-4 border-yellow-700 text-white">
                        <div class="p-2">
                            <div class="flex items-start">
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm leading-5 font-medium">
                                    {{ session('success') }}
                                    </p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button class="inline-flex text-white transition ease-in-out duration-150"
                                    onclick="return this.parentNode.parentNode.parentNode.parentNode.remove()"
                                    >
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    {{-- <x-modal wire:model="welcomeModal">
        <x-slot:title>Welcome</x-slot>
        
        <p>Welcome to the Navigate app, {{ auth()->user()->name }}! This app helps you find the best public transportation routes in your area. To get started, click the "Find Routes" button below.</p>
        
        <x-slot:actions>
            <x-button wire:click="closeModal" class="btn-primary">Find Routes</x-button>
        </x-slot:actions>
    </x-modal> --}}
    <x-main full-width>
        <x-slot:content>
            <x-header title="Navigate" subtitle="Efficient and Convenient Public Transportation for Everyone" separator with-anchor>
                <x-slot:middle class="!justify-end">
                    <x-form wire:submit.prevent="searchLocation">
                        <x-input wire:model="search" icon="o-magnifying-glass" placeholder="Search..." />
                    </x-form>
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-funnel" />
                    <x-button icon="o-plus" class="btn-primary" />
                </x-slot:actions>

                <x-menu>
                    @if($user = auth()->user())
                        <x-menu-separator />
    
                        <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                            <x-slot:actions>
                                <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                            </x-slot:actions>
                        </x-list-item>
    
                        <x-menu-separator />
                    @endif
                </x-menu>
            </x-header>
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

                // Listen for the searchResults event from Livewire
                document.addEventListener('livewire:load', function () {
                    window.livewire.on('searchResults', function (results) {
                        // Clear the map
                        if (marker) {
                            map.removeLayer(marker);
                        }

                        // Add a marker for each result
                        results.forEach(function (result) {
                            var lat = result.lat; // Replace with the actual latitude property
                            var lon = result.lon; // Replace with the actual longitude property

                            // Update the map center without changing the zoom level
                            map.panTo([lat, lon]);

                            // Add a new marker at the search result location
                            marker = L.marker([lat, lon]).addTo(map);
                        });
                    });
                });
            </script>
        </x-slot:content>
    </x-main>
</div>