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
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>
 
                    <x-menu-separator />
                @endif
 
                <x-menu-item title="View Users" icon="o-sparkles" link="/admin/view-users" />
                <x-menu-item title="Add User" icon="o-sparkles" link="/admin/add-user" />
                <x-menu-item title="View Saccos" icon="o-sparkles" link="/admin/view-saccos" />
                <x-menu-item title="Add Sacco" icon="o-sparkles" link="/admin/add-sacco" />
                <x-menu-item title="View Drivers" icon="o-sparkles" link="/admin/view-drivers" />
                <x-menu-item title="Add Driver" icon="o-sparkles" link="/admin/add-driver" />
                <x-menu-item title="View Vehicles" icon="o-sparkles" link="/admin/view-vehicles" />
                <x-menu-item title="Add Vehicle" icon="o-sparkles" link="/admin/add-vehicle" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>
 
        {{-- The `$slot` goes here --}}
        <x-slot:content>
        @php
            $users = \App\Models\User::all();

            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'email', 'label' => 'E-mail Address'],
                ['key' => 'name', 'label' => 'Name'],
                ['key' => 'phone', 'label' => 'Phone'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
        @endphp

        <x-header title="Users" with-anchor separator />
        <x-table :headers="$headers" :rows="$users" striped @row-click="alert($event.detail.name)">
            @foreach($users as $user)
                @scope('actions', $user)
                    <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
                    <x-button icon="o-pencil" wire:click="edit({{ $user->id }})" spinner class="btn-sm" />
                @endscope
            @endforeach
        </x-table>

        <x-modal title="Edit User" wire:model="showEditModal">
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
        </x-slot:content>
    </x-main>
</div>
