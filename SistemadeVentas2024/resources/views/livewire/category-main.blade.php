<div class="grid grid-cols-1 2x2:grid-cols-2 xl:gap-4 my-4">
    <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full flex justify-center items-center">
        <div class="w-full max-w-3x3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900">CATEGORIAS</h3>
                <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2" wire:click.prevent="create()">
                    <span class="material-icons">NUEVO</span>
                </a>

                @if($isOpen)
                    @include('livewire.category-create')
                @endif
            </div>
            @foreach($categorias as $item)
            <div class="flow-root">

                <ul role="list" class="divide-y divide-gray-300">
                    <li class="relative flex items-center gap-4 p-4 border border-gray-400 rounded shadow-md">
                        <div class="absolute flex justify-center items-center w-10 h-10 text-xl font-bold text-center text-green-500 bg-gray-800 rounded-full -top-4 -left-4">
                            <span class="text-sm text-red-500">{{ $item->id }}</span>

                        </div>
                        <a class="w-full overflow-hidden rounded" style="max-width: 120px;" href="#">
                            <img class="object-cover rounded w-32 h-32" src="https://lh3.googleusercontent.com/a/ACg8ocIexhmmTS8LcwWo1fPGY5Fl3KXpd-JuBE_Gj56P3rUR2g=s96-c" alt="Samuel Abera">
                        </a>
                        <div class="flex flex-col justify-between flex-grow gap-3 px-2">
                            <div class="w-full">
                                <a href="#" class="font-semibold text-xl text-gray-900 dark:text-white">
                                    {{ $item->name }}
                                </a>
                                <p class="pt-1 text-sm text-gray-600 dark:text-gray-400 two-lines">
                                    {{ $item->description }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between gap-1">
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    Fecha de Creacion: {{ $item->created_at }}
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    Ultima de Modificacion: {{ $item->updated_at }}
                                </div>
                                <div title="Total points this month" class="flex items-center gap-1 px-2 py-1 text-xs text-gray-600 dark:text-gray-400 rounded cursor-pointer bg-gray-200 dark:bg-gray-600">
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <div class="flex justify-end space-x-2">
                                            <x-button.circle wire:click="edit({{$item}})" primary icon="pencil" />
                                            <x-button.circle negative icon="x" x-on:confirm="{
                                                title: 'Seguro que deseas eliminar?',
                                                icon: 'error',
                                                method: 'destroy',
                                                params: {{$item}}
                                            }"
                                            />
                                        </div>
                                    </dd>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
            @endforeach

        </div>
    </div>


 </div>
</div>

