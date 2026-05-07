<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'quantity',
    ];
}
