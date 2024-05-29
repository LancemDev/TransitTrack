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
 
                <x-menu-item title="Dashboard" icon="o-sparkles" link="/sacco/home" />
                <x-menu-item title="Manage Vehicles" icon="o-sparkles" link="/sacco/manage-vehicles" />
                <x-menu-item title="Manage Drivers" icon="o-sparkles" link="/sacco/manage-drivers" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Log out" icon="o-power" link="/logout" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>
 
        {{-- The `$slot` goes here --}}
        <x-slot:content>

            <x-header title="X Sacco" subtitle="X Sacco description" size="text-xl" separator />
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
                    title="Completed Trips"
                    description="This month"
                    value="12"
                    icon="o-check-circle"
                    tooltip-bottom="Trips completed this month" />

                
                <x-stat
                    title="Cancelled Trips"
                    description="This month"
                    value="04"
                    icon="o-arrow-trending-down"
                    class="text-orange-500"
                    color="text-pink-500"
                    tooltip-bottom="Trips cancelled this month" />    
            </div>

            {{-- Welcome Modal --}}
            <x-modal wire:model="showWelcomeModal" persistent backdrop-blur>
                <div class="p-4">
                    <h2 class="text-2xl font-bold">Welcome to X Sacco</h2>
                    <p class="text-gray-600">We are glad to have you on board. Let's get started by adding your drivers and vehicles.</p>
                </div>
                <x-slot:actions>
                    <x-button @click="$wire.showWelcomeModal = false" label="Get Started" class="btn btn-success" spinner />
                </x-slot:actions>
            </x-modal>
        </x-slot:content>
    </x-main>
</div>
