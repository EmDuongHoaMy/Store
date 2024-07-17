<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "current_status",
    ];

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->hasMany(OrderItem::class);
    }

    public function payment(){
        return $this->hasMany(OrderPayment::class);
    }
}
