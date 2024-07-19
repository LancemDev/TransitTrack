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
    <x-main>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            <div>
                {{-- @if(empty($this->driverAvatarPath))
                    <x-form wire:submit.prevent="uploadPhoto">
                        <x-file wire:model="photo" accept="image/png" crop-after-change>
                            <img src="/empty_user.jpeg" class="h-40 rounded-lg" />
                        </x-file>
                        <x-slot:actions>
                            <x-button label="Update Profile Photo" class="btn btn-success" type="submit" />
                        </x-slot:actions>
                    </x-form>
                @else --}}
                @if($this->driverAvatarPath)
                    <img src="{{ asset('storage/' . $this->driverAvatarPath) }}" class="h-40 rounded-lg" />
                @endif
                {{-- @endif --}}
            </div>
            <x-stat
                    title="Driver Name"
                    value="{{ $driverName }}"
                    icon="o-user"
                    tooltip-bottom="Trips currently in progress" />

            <x-stat
                title="Sacco Name"
                value="{{ $saccoName }}"
                icon="o-user-group"
                tooltip-bottom="Trips completed this month" />

            <x-stat
                title="Vehicle Number Plate"
                value="{{ $vehicleNumberPlate }}"
                icon="o-truck"
                tooltip-bottom="Trips cancelled this month" />

            <x-button wire:click="clockOut" label="Clock Out" class="btn btn-primary" /> 

        </x-slot:sidebar>
        
        {{--Content goes here--}}
        <x-slot:content>
            <x-modal wire:model="showTripSummary" persistent class="backdrop-blur">
                <x-form wire:submit="saveTripsSummary">
                    <x-input label="Number of Trips" icon="o-truck" wire:model="number_of_trips" />
                    <x-input label="Off Peak Revenue" icon="o-banknotes" wire:model="off_peak_revenue" prefix="KSh" money inline/>
                    <x-input label="Peak Revenue" icon="o-banknotes" wire:model="on_peak_revenue" prefix="KSh" money inline />

                    <x-slot:actions>
                        <x-button label="Clock Out Now" type="submit" class="btn btn-success" />
                        <x-button label="Cancel" @click="$wire.showTripSummary = false" />
                    </x-slot:actions>
                </x-form>
            </x-modal>
            <x-modal wire:model="selectVehicleModal" persistent class="backdrop-blur">
                <x-form wire:submit.prevent="saveVehicle">
                    <div>Processing ...</div>
                    @php
                        $sacco_id = auth()->user()->sacco_id;
                        $vehicles = App\Models\Vehicle::where('sacco_id', $sacco_id)->get()->map(function ($vehicle) {
                            return ['id' => $vehicle->id, 'name' => $vehicle->number_plate];
                        });

                        $routes = App\Models\Route::all()->map(function ($route) {
                            return ['id' => $route->id, 'name' => $route->name];
                        });
                    @endphp
                    <x-select label="Selected Vehicle" icon="o-user" :options="$vehicles" wire:model="selectedVehicleId" placeholder="Select Vehicle"  inline hint="Select the vehicle you are currently driving" />
                    <x-select label="Selected Route" icon="o-map" :options="$routes" wire:model="selectedRouteId" inline placeholder="Select Route" hint="Select the route you are currently on" />
                    <x-slot:actions>
                        <x-button label="Save" class="btn btn-success" type="submit" />
                        <x-button label="Cancel" @click="$wire.selectVehicleModal = false" />
                    </x-slot:actions>
                </x-form>
            </x-modal>
    
            <div class="flex flex-col items-center  h-screen">
                <x-form wire:submit.save="add">
                    @php
                        $options = [
                            ['id' => "empty", 'name' => 'Full'],
                            ['id' => "Full", 'name' => 'Empty'],
                        ]
                    @endphp
                    
                    <x-radio label="Select one" :options="$options" wire:model="selectedOption" />

                    <x-slot:actions>
                        <x-button type="button" label="Save" class="btn btn-success" wire:click="add" />
                    </x-slot:actions>
                    
                </x-form>
            </div>
        </x-slot:content>
        <script>
            getLocation();
        </script>
    </x-main>
</div>
