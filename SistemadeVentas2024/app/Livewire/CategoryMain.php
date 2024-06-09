<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class CategoryMain extends Component
{

    use WithPagination;
    use Actions;
    public $isOpen=false;
    public $position_id;
    public ?Category $category;
    public CategoryForm $form;
    public $search;

    public function render(){
        $categorias=Category::where('name','LIKE','%'.$this->search.'%')->latest('id')->paginate(10);
        $productos=Product::all();
        return view('livewire.category-main',compact('categorias','productos'));
    }

    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->reset(['category']);
        $this->resetValidation();
        //$this->form->mount($this->supplier_id);
    }

    public function edit(Category $category){
        //dd($vehicle);
        $this->category=$category;
        $this->form->fill($category);
        $this->isOpen=true;
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        if(!isset($this->category->id)){
            Category::create($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro creado'
            );
        }else{
            $this->category->update($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro actualizado'
            );
        }
        $this->reset(['isOpen']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

}
