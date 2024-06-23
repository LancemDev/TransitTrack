<div>
<x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
 
 
            {{-- MENU --}}
            <x-menu activate-by-route>
 
                {{-- User --}}
                @if($user = auth()->user())
                    <x-menu-separator />
 
                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        
                    </x-list-item>
 
                    <x-menu-separator />
                @endif
 
                <x-menu-item title="View Passengers" icon="o-eye" link="/admin/view-users" />
                <x-menu-item title="Add Passenger" icon="o-user-plus" link="/admin/add-user" />
                <x-menu-item title="View Saccos" icon="o-user-group" link="/admin/view-saccos" />
                <x-menu-item title="Add Sacco" icon="o-plus" link="/admin/add-sacco" />
                <x-menu-item title="View Drivers" icon="o-eye" link="/admin/view-drivers" />
                <x-menu-item title="Add Driver" icon="o-user-plus" link="/admin/add-driver" />
                <x-menu-item title="View Vehicles" icon="o-truck" link="/admin/view-vehicles" />
                <x-menu-item title="Add Vehicle" icon="o-plus" link="/admin/add-vehicle" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Log out" icon="o-power" link="/logout" />
                    <x-menu-item title="Change Theme" icon="o-moon">
                        <x-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                    </x-menu-item>
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>
 
        {{-- The `$slot` goes here --}}
        <x-slot:content>
        @php
            $vehicles = \App\Models\Vehicle::all();

            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'number_plate', 'label' => 'Number Plate'],
                ['key' => 'type', 'label' => 'Type'],
                ['key' => 'color', 'label' => 'Color'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
        @endphp

        <x-header title="Vehicles" with-anchor separator />
        <x-table :headers="$headers" :rows="$vehicles" striped >
            @foreach($vehicles as $vehicle)
                @scope('actions', $vehicle)
                <div class="flex">
                    <x-button icon="o-trash" wire:click="delete({{ $vehicle->id }})" spinner class="btn-sm" />
                    <x-button icon="o-pencil" wire:click="edit({{ $vehicle->id }})" spinner class="btn-sm" />
                </div>
                @endscope
            @endforeach
        </x-table>

        <x-modal title="Edit Vehicle" wire:model="showEditModal">
            <x-form wire:submit="update">
                <x-input wire:model="number_plate" label="Number Plate" />
                @php
                    $types =  [
                                    [
                                        'id' => 'bus',
                                        'name' => 'bus'
                                    ],
                                    [
                                        'id' => 'matatu',
                                        'name' => 'matatu'
                                    ],
                                    [
                                        'id' => 'taxi',
                                        'name' => 'taxi'
                                    ],
                                    [
                                        'id' => 'lorry',
                                        'name' => 'lorry'
                                    ],
                                    [
                                        'id' => 'motorcycle',
                                        'name' => 'motorcycle'
                                    ],
                                    [
                                        'id' => 'bicycle',
                                        'name' => 'bicycle'
                                    ],
                                ];
                @endphp
                <x-select label="Type" :options="$types" wire:model="type" />
                <x-input wire:model="color" label="Color" />

                <x-slot:actions>    
                    <x-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                    <x-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
            </x-form>
        </x-modal>
        </x-slot:content>
    </x-main>
</div>
