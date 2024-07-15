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
        @php
            $sacco_id = auth()->user()->sacco->id;
            $routes = \App\Models\Route::all()->map(function ($route) {
                // Check if 'waypoints' is a JSON string and decode it
                $decodedWaypoints = json_decode($route->waypoints, true);
                if (is_array($decodedWaypoints)) {
                    // It's a JSON-encoded array, so we convert it to a comma-separated string
                    $route->waypoints = implode(', ', $decodedWaypoints);
                }
                // If it's not a JSON-encoded array, we assume it's already in the correct format
                return $route;
            });

            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'name', 'label' => 'Name of Route'],
                ['key' => 'start_point', 'label' => 'Start Point'],
                ['key' => 'end_point', 'label' => 'End Point'],
                ['key' => 'waypoints', 'label' => 'Way Points'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
        @endphp

        <x-header title="Routes" with-anchor separator />
        <x-button label="Add Route" icon="o-plus" wire:click="addRoutes" class="btn btn-primary" spinner />
        <x-table :headers="$headers" :rows="$routes" striped>
            @foreach($routes as $route)
                @scope('actions', $route)
                    <div class="flex">
                        <x-button icon="o-trash" wire:click="delete({{ $route->id }})" spinner class="btn-sm" />
                        <x-button icon="o-pencil" wire:click="edit({{ $route->id }})" spinner class="btn-sm" />
                    </div>
                @endscope
            @endforeach
        </x-table>

        <x-modal wire:model="addRouteModal" title="Add Routes">
            <x-form wire:submit="addRoute">
                <x-input wire:model="name" label="Name of Route" omit-error />
                <x-input wire:model="start_point" label="Start Point" omit-error />
                <x-input wire:model="end_point" label="End Point" omit-error />
                <x-tags wire:model="waypoints" label="Way Points" hint="Click Enter to add new waypoint" />
                
                <x-slot:actions>
                    <x-button label="Save Route" type="submit" class="btn btn-primary" spinner />
                </x-slot:actions>
            </x-form>
        </x-modal>
            
        </x-slot:content>
    </x-main>
</div>
