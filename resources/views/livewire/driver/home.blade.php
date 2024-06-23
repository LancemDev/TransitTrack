<div>
    <x-main>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            <div>
            @if(empty($this->driverAvatarPath))
                    <x-form wire:submit.prevent="uploadPhoto">
                        <x-file wire:model="photo" accept="image/png" crop-after-change>
                            <img src="/empty_user.jpeg" class="h-40 rounded-lg" />
                        </x-file>
                        <x-slot:actions>
                            <x-button label="Update Profile Photo" class="btn btn-success" type="submit" />
                        </x-slot:actions>
                    </x-form>
                @else
                    <img src="{{ asset('storage/' . $this->driverAvatarPath) }}" class="h-40 rounded-lg" />
                @endif
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
        </x-slot:sidebar>
        
        {{--Content goes here--}}
        <x-slot:content>
            <x-modal wire:model="selectVehicleModal" persistent class="backdrop-blur">
                <x-form wire:submit.prevent="saveVehicle">
                    <div>Processing ...</div>
                    @php
                        $vehicles = App\Models\Vehicle::take(5)->get()->map(function ($vehicle) {
                            return ['id' => $vehicle->id, 'name' => $vehicle->number_plate];
                        });
                    @endphp
                    <x-select label="Selected Vehicle" icon="o-user" :options="$vehicles" wire:model="selectedVehicleId" inline />
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
                        <x-button type="submit" label="Save" class="btn btn-sucess" />
                    </x-slot:actions>
                </x-form>
            </div>
        </x-slot:content>
    </x-main>
</div>
