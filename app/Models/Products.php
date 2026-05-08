<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'quantity',
        'image',
    ];

    // Links each product to the seller who created it
    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}