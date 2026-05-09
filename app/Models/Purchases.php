<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model {
    protected $fillable = [
        'user_id', 'product_id', 'quantity',
    ];

    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}