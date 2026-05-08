<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Wireless Headphones',
            'description' => 'Noise cancelling headphones',
            'price' => 2999,
            'category' => 'Electronics',
            'image' => 'products/headphones.jpg'
        ]);

        Product::create([
            'name' => 'Coffee Mug',
            'description' => 'Ceramic coffee mug',
            'price' => 199,
            'category' => 'Home',
            'image' => 'products/mug.jpg'
        ]);
    }
}