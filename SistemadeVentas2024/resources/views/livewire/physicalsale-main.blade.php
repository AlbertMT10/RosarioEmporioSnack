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

                        {{-- inicio --}}
                        <!-- source: https://github.com/mfg888/Responsive-Tailwind-CSS-Grid/blob/main/index.html -->

<div class="text-center p-10">
    <h1 class="font-bold text-4xl mb-4">Productos</h1>
    <h1 class="text-3xl">Avicola Rosario</h1>


</div>

<!-- ✅ Grid Section - Starts Here 👇 -->
<section id="Projects"
    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

    @foreach($products as $product)
    <!--   ✅ Product card 1 - Starts Here 👇 -->
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                <div class="flex items-center">
                    <p class="text-lg font-semibold text-black cursor-auto my-3">{{number_format($product->price, 2) }}</p>
                    <del>
                        <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                    </del>
                    <div class="ml-auto cursor-pointer" wire:click="addToCart({{ $product->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                    </div>
                </div>

            </div>
        </a>
    </div>
    <!--   🛑 Product card 1 - Ends Here  -->

    @endforeach
</section>

<!-- 🛑 Grid Section - Ends Here -->


<!-- credit -->
<div class="text-center py-10 px-10">
    <h2 class="font-bold text-2xl md:text-4xl mb-4">Mas Productos Mas Informacion</h2>
</div>


<!-- Support Me 🙏🥰 -->
<script src="https://storage.ko-fi.com/cdn/scripts/overlay-widget.js"></script>
<script>
    kofiWidgetOverlay.draw('mohamedghulam', {
            'type': 'floating-chat',
            'floating-chat.donateButton.text': 'Support me',
            'floating-chat.donateButton.background-color': '#323842',
            'floating-chat.donateButton.text-color': '#fff'
        });
</script>
                        {{-- fin --}}

                    </div>



                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="mb-4">
                            <x-native-select label="Seleccione al Trabajador" wire:model="selectedWorkerId">
                                <option value="">Seleccione un trabajador</option>
                                @foreach ($workers as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->first_name }}</option>
                                @endforeach
                            </x-native-select>
                        </div>
                        <div class="mb-4">
                            <x-input wire:model="customerName" label="Nombre del Cliente" />
                        </div>
                        <div class="mb-4">
                            <x-input wire:model="customerDNI" label="DNI del Cliente" />
                        </div>
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Carrito</h3>
                                <span class="text-base font-normal text-gray-500">Agregar Productos</span>
                            </div>
                            <div class="flex-shrink-0">
                                <wireui.button.primary wire:click="saveCart" class="mr-2">Guardar</wireui.button.primary>
                                <wireui.button.secondary>Imprimir</wireui.button.secondary>
                            </div>
                        </div>

                        <ul>


                            @foreach ($cart as $item)

                            <li class="flex justify-between items-center border-b border-gray-200 py-2">
                                <span>{{ $item['product']->name }}</span>
                                <span>${{ number_format($item['product']->price * $item['quantity'], 2) }}</span>
                                <div>
                                    <button class="btn-secondary mr-2" wire:click="removeFromCart({{ $item['product']->id }})">-</button>
                                    <span>{{ $item['quantity'] }}</span>
                                    <button class="btn-secondary ml-2" wire:click="addToCart({{ $item['product']->id }})">+</button>
                                </div>
                            </li>
                            @endforeach

                        </ul>

                        <div class="mt-8">
                            <h3 class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</h3>
                        </div>
                    </div>






            </div>
         </main>
</div>
