<?php

namespace App\Livewire;

use App\Models\Physicalsale;
use App\Models\Product;
use App\Models\Worker;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class PhysicalsaleMain extends Component

    {
        use WithPagination;
        use Actions;

        public $search;
        public $products;
        public $cart = [];

        public function mount()
        {
            $this->products = Product::all();
        }

        public function addToCart($productId)
        {
            $product = Product::findOrFail($productId);

            if (!isset($this->cart[$productId])) {
                $this->cart[$productId] = [
                    'product' => $product,
                    'quantity' => 1,
                ];
            } else {
                $this->cart[$productId]['quantity']++;
            }
        }

        public function removeFromCart($productId)
        {
            if (isset($this->cart[$productId])) {
                if ($this->cart[$productId]['quantity'] > 1) {
                    $this->cart[$productId]['quantity']--;
                } else {
                    unset($this->cart[$productId]);
                }
            }
        }

        public function getTotalProperty()
        {
            $total = 0;

            foreach ($this->cart as $item) {
                $total += $item['product']->price * $item['quantity'];
            }

            return $total;
        }

        public function render()
        {
            $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
                                ->latest('id')
                                ->paginate(10);

            return view('livewire.physicalsale-main', [
                'total' => $this->total,
                'products' => $products
            ]);
        }

        public function saveCart()
{
    // Aquí puedes agregar la lógica para guardar el carrito en la base de datos o realizar cualquier otra acción necesaria

    // Por ejemplo, podrías guardar los elementos del carrito en la base de datos
    foreach ($this->cart as $productId => $item) {
        $physicalSale = new Physicalsale();
        $physicalSale->product_id = $productId;
        $physicalSale->quantity = $item['quantity'];
        $physicalSale->save();
    }

    // Después de guardar el carrito, puedes limpiarlo si es necesario
    $this->cart = [];

    // Puedes agregar aquí cualquier otra lógica que necesites después de guardar el carrito

    // Finalmente, puedes agregar un mensaje de sesión para indicar que el carrito se ha guardado correctamente
    session()->flash('success', 'El carrito se ha guardado correctamente.');
}


}
