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
 
                <x-menu-item title="Admin Dashboard" icon="o-home" link="/admin/home" />
                <x-menu-item title="Manage Passengers" icon="o-eye" link="/admin/view-users" />
                <x-menu-item title="Manage Saccos" icon="o-user-group" link="/admin/view-saccos" />
                <x-menu-item title="Manage Drivers" icon="o-eye" link="/admin/view-drivers" />
                <x-menu-item title="Manage Vehicles" icon="o-truck" link="/admin/view-vehicles" />
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
            $drivers = \App\Models\Driver::all();

            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'name', 'label' => 'Name'],
                ['key' => 'email', 'label' => 'E-mail Address'],
                ['key' => 'phone', 'label' => 'Phone'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
        @endphp

        <x-header title="Drivers" with-anchor separator />
        <x-button wire:click="create" icon="o-plus" class="btn btn-primary" label="Add Driver" spinner />
        <x-table :headers="$headers" :rows="$drivers" striped>
            @foreach($drivers as $driver)
                @scope('actions', $driver)
                <div class="flex">
                    <x-button icon="o-trash" wire:click="delete({{ $driver->id }})" spinner class="btn-sm" />
                    <x-button icon="o-pencil" wire:click="edit({{ $driver->id }})" spinner class="btn-sm" />
                </div>
                @endscope
            @endforeach
        </x-table>

        <x-modal title="Edit Driver" wire:model="showEditModal">
            <x-form wire:submit="update">
                <x-input wire:model="name" label="Name" />
                <x-input wire:model="email" label="E-mail Address" />
                <x-input wire:model="phone" label="Phone" />

                <x-slot:actions>    
                    <x-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                    <x-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
            </x-form>
        </x-modal>

        <x-modal title="Add Driver" wire:model="showCreateModal">
            <x-form wire:submit="store">
                <x-input wire:model="name" label="Name" />
                <x-input wire:model="email" label="E-mail Address" />
                <x-input wire:model="phone" label="Phone" />
                <x-input wire:model="password" label="Password" type="password" />

                @php
                    $saccos = \App\Models\Sacco::all();
                @endphp

                <x-select wire:model="sacco_id" icon="o-users" :options="$saccos" label="Sacco" placeholder="Select a Sacco" hint="Select only one" />

                <x-slot:actions>    
                    <x-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                    <x-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
            </x-form>
        </x-modal>
        </x-slot:content>
    </x-main>
</div>
