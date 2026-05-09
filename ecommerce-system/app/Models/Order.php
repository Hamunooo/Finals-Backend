<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'email', 'subtotal', 'tax', 'shipping', 'total', 'status', 'items'];
    protected $casts = ['items' => 'array'];
}
