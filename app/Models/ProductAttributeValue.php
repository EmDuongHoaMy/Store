<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_attribute_id",
        'attribute_value_id',
    ];

    public function productAttribute(){
        return $this->belongsTo(ProductAttribute::class);
    }

    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class);
    }
}
