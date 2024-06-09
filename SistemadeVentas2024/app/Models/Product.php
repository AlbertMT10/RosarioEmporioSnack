<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];
    use HasFactory;

    // Define la relación con el modelo Author
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
