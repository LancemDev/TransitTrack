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
 
    {{-- MAIN --}}
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
                <x-menu-item title="View Passengers" icon="o-eye" link="/admin/view-users" />
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
            <div>
                <x-header title="Registered System Users" separator />
                <livewire:chart.admin.bar />

                <x-header title="Vehicles" separator />
                <livewire:chart.admin.pie />
            </div>
        </x-slot:content>
    </x-main>
</div>
