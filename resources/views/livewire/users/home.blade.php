<div>

        @if(session('success'))
            <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 justify-end">
                    <div
                        class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-amber-400 border-l-4 border-amber-700 text-white">
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
        <x-main full-width>
        <x-slot:content>
            <x-modal wire:model="showModal" title="Bus Details" persistent backdrop-blur>
                Testing trigger
            </x-modal>
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

                function getRandomCoordinates(center, radius = 0.01) {
                    const angle = Math.random() * Math.PI * 2;
                    const distance = Math.random() * radius;
                    return {
                        lat: center.lat + distance * Math.cos(angle),
                        lng: center.lng + distance * Math.sin(angle)
                    };
                }

                var randomPinIcon = L.divIcon({
                    className: 'custom-div-icon',
                    html: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF00FF" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>`,
                    iconSize: [30, 30],
                    iconAnchor: [15, 30],
                    popupAnchor: [0, -30],
                });

                function addRandomPins(center, numberOfPins = 5) {
                    const driverNames = ['Kamau Njoroge', 'Fatuma Ali', 'Omondi Otieno', 'Wanjiku Mwangi', 'Njoki Chege'];
                    const saccos = ['Umoina Sacco', 'Nairobi Sacco', 'West Madaraka Sacco', 'Eldoret Express Sacco', 'Kisumu Transporters Sacco'];
                    const routes = ['Nairobi CBD - Kiserian', 'Nairobi CBD - Juja', 'Nairobi CBD - West Madaraka', 'Nairobi CBD - Machakos', 'Nairobi CBD - UpperHill'];

                    for (let i = 0; i < numberOfPins; i++) {
                        const randomPos = getRandomCoordinates(center);

                        const driverName = driverNames[Math.floor(Math.random() * driverNames.length)];
                        const sacco = saccos[Math.floor(Math.random() * saccos.length)];
                        const route = routes[Math.floor(Math.random() * routes.length)];

                        const busDetails = {
                            numberPlate: `KCA ${1000 + i}Y`,
                            driverName: driverName,
                            sacco: sacco,
                            route: route
                        };

                        L.marker([randomPos.lat, randomPos.lng], {icon: randomPinIcon})
                            .addTo(map)
                            .bindPopup(`<strong>Number Plate:</strong> ${busDetails.numberPlate}<br><strong>Driver:</strong> ${busDetails.driverName}<br><strong>Sacco:</strong> ${busDetails.sacco}<br><strong>Route:</strong> ${busDetails.route}<br><a href="#" onclick="Livewire.emit('openModal', ${JSON.stringify(busDetails).split('"').join("&quot;")})">Additional Details</a>`);
                    }
                }

                function getLocation() {
                    loading.style.display = 'block';

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            console.log(pos);

                            if (!map) {
                                map = L.map('map').setView([pos.lat, pos.lng], 16);
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                }).addTo(map);
                            } else {
                                map.panTo([pos.lat, pos.lng]);
                            }

                            if (marker) {
                                map.removeLayer(marker);
                            }

                            marker = L.marker([pos.lat, pos.lng]).addTo(map);

                            addRandomPins(pos, 5);

                            loading.style.display = 'none';
                        }, function(error) {
                            console.error("Error: " + error.message + ". Geolocation accuracy may vary.");
                            loading.style.display = 'none';
                        }, {enableHighAccuracy: true, timeout: 5000, maximumAge: 0});
                    } else {
                        console.error("Geolocation is not supported by this browser.");
                        loading.style.display = 'none';
                    }
                }
                document.addEventListener('DOMContentLoaded', function() {
                    getLocation();
                });
            </script>
        </x-slot:content>
    </x-main>
</div>