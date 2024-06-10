<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-600 leading-tight">
            Plantel
        </h2>
    </x-slot>


         <main>
            <div class="pt-6 px-4">
               <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                     <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center justify-between dark:text-gray-400 gap-4 mb-2">
                            <x-input icon="search" placeholder="Buscar registro" wire:model.live="search"/>
                            <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo"/>
                                @if($isOpen)
                                    @include('livewire.product-create')
                                @endif
                    </div>
                     </div>
                     <!-- inspired by tailwindcss.com -->
<ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
    @foreach($productos as $item)
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">

        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold">
                <span class="mb-1 block text-sm leading-6 text-indigo-500">{{ $item->category->name }}</span>{{ $item->name }}
            </h3>
            <div class="prose prose-slate prose-sm text-slate-600">
                <p>{{ $item->description }}</p>
            </div>
            <div class="prose prose-slate prose-sm text-slate-600">
                <p>Precio: S/.{{ $item->price }}</p>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Opciones</dt>
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
        <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">

    </li>
    @endforeach
</ul>


                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="mb-4 flex items-center justify-between">
                        <div>
                           <h3 class="text-xl font-bold text-gray-900 mb-2">Stock de Productos</h3>
                           <span class="text-base font-normal text-gray-500">Actualizar el estock de los productos</span>
                        </div>
                        <div class="flex-shrink-0">
                           <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">Imprimir</a>
                        </div>

                     </div>
                     <x-input icon="search" placeholder="Buscar registro" wire:model.live="search"/>

                     <div class="flex flex-col mt-8">
                        <div class="overflow-x-auto rounded-lg">
                           <div class="align-middle inline-block min-w-full">
                              <div class="shadow overflow-hidden sm:rounded-lg">
                                 <table class="min-w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-50">
                                       <tr>
                                          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Producto
                                          </th>
                                          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Stock Actual
                                          </th>
                                          <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Opciones
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach($productos as $item)
                                        <tr>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                {{ $item->name }}
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                {{ $item->stock }}
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                <form wire:submit.prevent="increaseStock({{ $item->id }}, $event.target.querySelector('input[type=number]').value)">
                                                    <div class="flex items-center">
                                                        <input type="number" class="mr-2 px-2 py-1 w-16 border border-gray-300 rounded">
                                                        <button type="submit" class="p-2 bg-green-500 text-white rounded-full hover:bg-green-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm8-7a7 7 0 00-7 7 1 1 0 001 1h12a1 1 0 001-1 7 7 0 00-7-7z" clip-rule="evenodd" />
                                                                <path d="M9 4a1 1 0 00-1 1v4H4a1 1 0 100 2h4v4a1 1 0 102 0V11h4a1 1 0 100-2H11V5a1 1 0 00-1-1z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>


            </div>
         </main>
</div>
