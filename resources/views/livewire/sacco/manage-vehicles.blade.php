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
 
                <x-menu-item title="Dashboard" icon="o-home" link="/sacco/home" />
                <x-menu-item title="Manage Vehicles" icon="o-truck" link="/sacco/manage-vehicles" />
                <x-menu-item title="Manage Drivers" icon="o-user" link="/sacco/manage-drivers" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Log out" icon="o-power" link="/logout" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>
 
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            @php
                $users = \App\Models\Vehicle::all();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'number_plate', 'label' => 'Number PLate'],
                    ['key' => 'type', 'label' => 'Type'],
                    ['key' => 'color', 'label' => 'Color'],
                    ['key' => 'actions', 'label' => 'Actions'],
                ];
            @endphp

            <x-header title="Vehicles" with-anchor separator />
            <x-button label="Add Vehicle" @click="$wire.showAddVehicleModal = true" class="btn btn-primary" />
            <x-table :headers="$headers" :rows="$users" striped @row-click="alert($event.detail.name)">
                @foreach($users as $user)
                    @scope('actions', $user)
                        <div class="flex">
                            <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
                            <x-button icon="o-pencil" wire:click="edit({{ $user->id }})" spinner class="btn-sm" />
                        </div>
                    @endscope
                @endforeach
            </x-table>

            {{-- Add vehicle modal --}}
            <x-modal wire:model="showAddVehicleModal" persistent backdrop-blur>
                <x-form wire:submit.save="addVehicle">
                    <x-input wire:model="number_plate" label="Plate" omit-error />
                    @php
                        $options = [
                            [
                                'id' => 'bus',
                                'name' => 'Bus'
                            ],
                            [
                                'id' => 'matatu',
                                'name' => 'Matatu'
                            ],
                            [
                                'id' => 'taxi',
                                'name' => 'Taxi'
                            ],
                            [
                                'id' => 'lorry',
                                'name' => 'Lorry'
                            ],
                            [
                                'id' => 'motorcycle',
                                'name' => 'Motorcycle'
                            ],
                            [
                                'id' => 'bicycle',
                                'name' => 'Bicycle'
                            ],
                        ]; 
                    @endphp
                    <x-select label="Type" :options="$options" wire:model="type" />
                    <x-input wire:model="color" label="Color" omit-error />

                    <x-slot:actions>
                        <x-button type="submit" label="Save" class="btn btn-success" spinner />
                        <x-button @click="$wire.showAddVehicleModal = false" label="Cancel" spinner />
                    </x-slot:actions>
                </x-form>
            </x-modal>

            {{-- Edit vehicle modal --}}
            <x-modal wire:model="editVehicleModal" persistent backdrop-blur>
                <x-form wire:submit="updateVehicle">
                    <x-input wire:model="number_plate" label="Plate" omit-error />
                    @php
                        $options = [
                            [
                                'id' => 'bus',
                                'name' => 'Bus'
                            ],
                            [
                                'id' => 'matatu',
                                'name' => 'Matatu'
                            ],
                            [
                                'id' => 'taxi',
                                'name' => 'Taxi'
                            ],
                            [
                                'id' => 'lorry',
                                'name' => 'Lorry'
                            ],
                            [
                                'id' => 'motorcycle',
                                'name' => 'Motorcycle'
                            ],
                            [
                                'id' => 'bicycle',
                                'name' => 'Bicycle'
                            ],
                        ]; 
                    @endphp
                    <x-select label="Type" :options="$options" wire:model="type" />
                    <x-input wire:model="color" label="Color" omit-error />

                    <x-slot:actions>
                        <x-button type="submit" label="Save" class="btn btn-success" spinner />
                        <x-button @click="$wire.editVehicleModal = false" label="Cancel" spinner />
                    </x-slot:actions>
                </x-form>
            </x-modal>
        </x-slot:content>
    </x-main>
</div>