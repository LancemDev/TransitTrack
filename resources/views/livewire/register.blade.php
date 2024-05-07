<div>
    {{-- Be like water. --}}
    <x-form wire:submit="save">
        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-input label="Password" wire:model="password" />
        <x-input label="Phone Number" wire:model="phone" />
     
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Register" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>

    <x-button label="Hello" class="btn-primary" wire:click="hello" />
</div>
