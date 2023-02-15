<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'isVisible',
        'isDiscount',
        'reference',
        'category_id',
    ];
    
    // la méthode size retourne toutes les tailles liées à l'instance de la classe produit
    public function sizes(){
        return $this->belongsToMany(Size::class, 'pivot_product_size', 'product_id', 'size_id');
    }


}
