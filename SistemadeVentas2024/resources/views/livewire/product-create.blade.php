<x-modal.card title="Registro de Productos" blur wire:model.defer="isOpen">
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.name" label="Nombre del producto"/>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.description" label="Descripción del producto" type="textarea"/>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.price" label="Precio del producto" type="number" step="0.01"/>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.stock" label="Stock" type="number" step="0.01"/>
    </div>

    <div class="grid sm:grid-cols-8 gap-2">
        <x-native-select label="Seleccione la Categoria" wire:model.live="form.category_id">
            <option>Seleccione opción</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->name}}</option>
            @endforeach
        </x-native-select>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-2">
            <x-button flat label="Cancelar" x-on:click="close()" />
            <x-button primary label="Registrar" wire:click="store()" />
        </div>
    </x-slot>
</x-modal.card>
