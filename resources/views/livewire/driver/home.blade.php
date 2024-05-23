<div>
    <x-modal wire:model="selectVehicleModal" persistent class="backdrop-blur">
        <x-form wire:submit.prevent="saveVehicle">
            <div>Processing ...</div>
            @php
                $vehicles = App\Models\Vehicle::take(5)->get()->map(function ($vehicle) {
                    return ['id' => $vehicle->id, 'name' => $vehicle->number_plate];
                });
            @endphp
            <x-select label="Selected Vehicle" icon="o-user" :options="$vehicles" wire:model="selectedVehicleId" inline /><x-slot:actions>
                <x-button label="Save" class="btn btn-success" type="submit" />
                <x-button label="Cancel" @click="$wire.selectVehicleModal = false" />
            </x-slot:actions>
        </x-form>
    </x-modal>
     
    <div class="flex">
        <x-stat title="Total Drivers" value="22" icon="o-users" tooltip-bottom="Total registered drivers" />
        {{-- <x-stat title="Total Drivers" value="{{ $totalDrivers }}" icon="o-users" tooltip-bottom="Total registered drivers" /> --}}
        
        <x-stat
            title="Active Trips"
            description="Today"
            value="22"
            icon="o-arrow-trending-up"
            tooltip-bottom="Trips currently in progress" />

        <x-stat
            title="Selected Vehicle"
            description="Today"
            value="{{ $selectedVehicleId }}"
            icon="o-arrow-trending-up"
            tooltip-bottom="Trips currently in progress" />
        
        <x-stat
            title="Completed Trips"
            description="This month"
            value="12"
            icon="o-check-circle"
            tooltip-bottom="Trips completed this month" />

        {{-- <x-stat
            title="Completed Trips"
            description="This month"
            value="{{ $completedTrips }}"
            icon="o-check-circle"
            tooltip-bottom="Trips completed this month" /> --}}
        
        <x-stat
            title="Cancelled Trips"
            description="This month"
            value="04"
            icon="o-arrow-trending-down"
            class="text-orange-500"
            color="text-pink-500"
            tooltip-bottom="Trips cancelled this month" />    

        {{-- <x-stat
            title="Cancelled Trips"
            description="This month"
            value="{{ $cancelledTrips }}"
            icon="o-times-circle"
            class="text-orange-500"
            color="text-pink-500"
            tooltip-bottom="Trips cancelled this month" />    --}}
    </div>
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
</div>
