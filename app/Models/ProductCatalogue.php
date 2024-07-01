<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ProductCatalogue extends Model
{
    use HasFactory,NodeTrait;
    protected $fillable = [
        'id',
        'name',
        'description',
        'canonical',
        'img',
        'parent_id',
        'user_id'
    ];
}
