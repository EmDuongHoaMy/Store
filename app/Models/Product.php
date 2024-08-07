<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'images',
        'products_catalogue_id'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function productCatalogue(){
        return $this->belongsTo(ProductCatalogue::class);
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }

    public function item(){
        return $this->hasMany(OrderItem::class);
    }
}
