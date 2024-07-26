<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "current_status",
    ];

    protected $casts = [
        "current_status" => OrderStatus::class,
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
