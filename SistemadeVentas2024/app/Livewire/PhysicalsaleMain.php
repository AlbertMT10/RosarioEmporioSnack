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
        public $workers;
        public $selectedWorkerId;
        public $customerName;
        public $customerDNI;
        public $total; // Define la variable $total aquí

        public function mount()
        {
            $this->products = Product::all();
            $this->workers = Worker::all();
            $this->updateTotal(); // Llama al método para calcular el total al inicio
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

            $this->updateTotal();
        }


        public function removeFromCart($productId)
        {
            if (isset($this->cart[$productId])) {
                if ($this->cart[$productId]['quantity'] > 1) {
                    $this->cart[$productId]['quantity']--;
                } else {
                    unset($this->cart[$productId]);
                }

                $this->updateTotal();
            }
        }

        public function updateTotal()
    {
        $this->total = collect($this->cart)->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });
    }

        public function saveCart()
        {
            if (empty($this->selectedWorkerId)) {
                $this->dialog()->error('Por favor, seleccione un trabajador.');
                return;
            }

            if (empty($this->customerDNI)) {
                $this->dialog()->error('Por favor, ingrese el DNI del cliente.');
                return;
            }

            foreach ($this->cart as $productId => $item) {
                $physicalSale = new Physicalsale();
                $physicalSale->product_id = $productId;
                $physicalSale->quantity = $item['quantity'];
                $physicalSale->worker_id = $this->selectedWorkerId;
                $physicalSale->name = $this->customerName;
                $physicalSale->dni = $this->customerDNI;
                $physicalSale->total = $this->total;
                $physicalSale->save();
            }

            $this->cart = [];

            session()->flash('success', 'El carrito se ha guardado correctamente.');
        }
    }
