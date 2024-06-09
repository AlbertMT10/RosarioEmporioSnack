<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    #[Rule('required')]
    public $name,$description;

}
