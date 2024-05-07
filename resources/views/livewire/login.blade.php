<div>
    {{-- Be like water. --}}
    <x-form wire:submit="login">
        <x-input label="Email" wire:model="email" />
        <x-input label="Password" wire:model="password" type="password" />
     
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Login" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
