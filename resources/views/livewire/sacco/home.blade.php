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
            <x-header title="{{ $sacco_name ?? 'Default Sacco Name' }}" subtitle="{{ $sacco_description ?? 'Default description' }}" size="text-xl" separator />
            <div class="flex">
                <x-stat title="Total Drivers" value="22" icon="o-users" tooltip-bottom="Total registered drivers" />
                <x-stat title="Active Trips" description="Today h" value="22" icon="o-arrow-trending-up" tooltip-bottom="Trips currently in progress" />
                <x-stat title="Completed Trips" description="This month" value="12" icon="o-check-circle" tooltip-bottom="Trips completed this month" />
                <x-stat title="Cancelled Trips" description="This month" value="04" icon="o-arrow-trending-down" class="text-orange-500" color="text-pink-500" tooltip-bottom="Trips cancelled this month" />
            </div>

            <livewire:chart.sacco-admin.line />
            
        </x-slot:content>
    </x-main>
</div>
