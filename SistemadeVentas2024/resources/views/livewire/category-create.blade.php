<x-modal.card title="Registro de Autores" blur wire:model.defer="isOpen">
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <div class="col-span-3">
            <x-input wire:model="form.name" label="Nombre de la categoria"/>
        </div>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.description" label="Descripcion"/>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-2">
            <x-button flat label="Cancelar" x-on:click="close()" />
            <x-button primary label="Registrar" wire:click="store()" />
        </div>
    </x-slot>
</x-modal.card>


