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
                $sacco_id = auth()->user()->sacco_id;
                $users = \App\Models\Driver::with('activities')->where('sacco_id', $sacco_id)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'name', 'label' => 'Name'],
                    ['key' => 'email', 'label' => 'E-Mail Address'],
                    ['key' => 'phone', 'label' => 'Phone'],
                    ['key' => 'latest_activity_status', 'label' => 'Status'], // Add status header
                    ['key' => 'actions', 'label' => 'Actions'],
                ];

                $row_decoration = [
                    'bg-green-500/25' => fn($user) => $user->latest_activity_status === 'currently in a trip',
                    'bg-gray-500/25' => fn($user) => $user->latest_activity_status === 'yet to start working',
                    'bg-blue-500/25' => fn($user) => $user->latest_activity_status === 'clocked out',
                ];
            @endphp

            <x-header title="Drivers" with-anchor separator />
            <x-button label="Add Driver" icon="o-plus" wire:click="addDriverModal" class="btn btn-primary" />
            <x-table :headers="$headers" :rows="$users" :row-decoration="$row_decoration" >
                @foreach($users as $user)
                    @scope('actions', $user)
                        <div class="flex">
                            <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
                            <x-button icon="o-pencil" wire:click="edit({{ $user->id }})" spinner class="btn-sm" />
                        </div>
                    @endscope
                @endforeach
            </x-table>

            {{-- Add driver modal --}}
            <x-modal wire:model="showAddDriverModal" title="Add Driver" persistent backdrop-blur>
                <x-form wire:submit.save="addDriver">
                    <x-file wire:model="avatar" label="Profile Photo" omit-error accept="image/*" crop-after-change >
                        @if($avatar)
                            <img src="{{ $avatar->temporaryUrl() }}" class="h-40 rounded-lg" />
                        @else
                            <img src="{{ asset('empty_user.jpeg') }}" class="h-40 rounded-lg" />
                        @endif
                    </x-file>
                    <x-input wire:model="name" label="Name" omit-error />
                    <x-input wire:model="email" label="Email" omit-error />
                    <x-input wire:model="phone" label="Phone" omit-error />
                    <x-input wire:model="password" label="Password" type="password" omit-error />
                    <x-input wire:model="password_confirmation" label="Confirm Password" type="password" omit-error />
                    <x-slot:actions>
                        <x-button type="submit" label="Save" class="btn btn-success" spinner />
                        <x-button @click="$wire.showAddDriverModal = false" label="Cancel" spinner />
                    </x-slot:actions>
                </x-form>
            </x-modal>

            {{-- Edit driver modal --}}
            <x-modal wire:model="editDriverModal" title="Update Driver" persistent backdrop-blur>
                <x-form wire:submit="updateDriver">
                    <x-file wire:model="avatar" label="Profile Photo" omit-error accept="image/*" crop-after-change >
                        @if($avatar)
                            <img src="{{ $avatar->temporaryUrl() }}" class="h-40 rounded-lg" />
                        @else
                            <img src="{{ asset('storage/' . $this->avatar) }}" class="h-40 rounded-lg" />
                        @endif
                    </x-file>
                    <x-input wire:model="sacco_name" label="Sacco Name" omit-error readonly />
                    <x-input wire:model="name" label="Name" omit-error />
                    <x-input wire:model="email" label="Email" omit-error />
                    <x-input wire:model="phone" label="Phone" omit-error />

                    <x-slot:actions>
                        <x-button type="submit" label="Save" class="btn btn-success" spinner />
                        <x-button @click="$wire.editDriverModal = false" label="Cancel" spinner />
                    </x-slot:actions>
                </x-form>
            </x-modal>
        </x-slot:content>
    </x-main>
</div>