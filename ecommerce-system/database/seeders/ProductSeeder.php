<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Clear existing products
        Product::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Electronics
        Product::create([
            'name' => 'Wireless Headphones',
            'description' => 'Premium noise-cancelling wireless headphones with 30-hour battery life and active noise cancellation technology',
            'price' => 2999,
            'category' => 'Electronics',
            'image' => 'products/headphones.jpg',
            'stock' => 25
        ]);

        Product::create([
            'name' => 'Smart Watch',
            'description' => 'Water-resistant smartwatch with fitness tracking, heart rate monitor, and 7-day battery life',
            'price' => 4599,
            'category' => 'Electronics',
            'image' => 'products/smartwatch.jpg',
            'stock' => 18
        ]);

        Product::create([
            'name' => 'USB-C Cable',
            'description' => 'Durable fast-charging USB-C cable, 2 meters long, supports 100W power delivery',
            'price' => 299,
            'category' => 'Electronics',
            'image' => 'products/cable.jpg',
            'stock' => 100
        ]);

        Product::create([
            'name' => 'Laptop Stand',
            'description' => 'Adjustable aluminum laptop stand for better ergonomics, supports up to 15 inches',
            'price' => 1299,
            'category' => 'Electronics',
            'image' => 'products/laptop-stand.jpg',
            'stock' => 30
        ]);

        // Fashion
        Product::create([
            'name' => 'Leather Watch',
            'description' => 'Classic leather strap analog watch, water-resistant, elegant design',
            'price' => 1799,
            'category' => 'Fashion',
            'image' => 'products/watch.jpg',
            'stock' => 20
        ]);

        Product::create([
            'name' => 'Cotton T-Shirt',
            'description' => 'Comfortable 100% cotton t-shirt, available in multiple colors, premium quality',
            'price' => 599,
            'category' => 'Fashion',
            'image' => 'products/tshirt.jpg',
            'stock' => 50
        ]);

        Product::create([
            'name' => 'Denim Jacket',
            'description' => 'Classic blue denim jacket, perfect for casual wear, durable and comfortable',
            'price' => 2499,
            'category' => 'Fashion',
            'image' => 'products/jacket.jpg',
            'stock' => 15
        ]);

        Product::create([
            'name' => 'Sunglasses',
            'description' => 'UV-protection sunglasses with polarized lenses, trendy design',
            'price' => 1299,
            'category' => 'Fashion',
            'image' => 'products/sunglasses.jpg',
            'stock' => 35
        ]);

        // Home & Kitchen
        Product::create([
            'name' => 'Coffee Mug',
            'description' => 'Ceramic coffee mug with heat-resistant handle, dishwasher safe, 350ml capacity',
            'price' => 199,
            'category' => 'Home',
            'image' => 'products/mug.jpg',
            'stock' => 60
        ]);

        Product::create([
            'name' => 'Kitchen Knife Set',
            'description' => 'Professional kitchen knife set with 5 pieces, stainless steel blades, wooden handles',
            'price' => 1999,
            'category' => 'Home',
            'image' => 'products/knife-set.jpg',
            'stock' => 12
        ]);

        Product::create([
            'name' => 'Bed Pillow',
            'description' => 'Memory foam pillow, ergonomic design, hypoallergenic, ideal for side sleepers',
            'price' => 1299,
            'category' => 'Home',
            'image' => 'products/pillow.jpg',
            'stock' => 40
        ]);

        Product::create([
            'name' => 'Table Lamp',
            'description' => 'Modern LED table lamp with adjustable brightness, touch control, warm white light',
            'price' => 899,
            'category' => 'Home',
            'image' => 'products/lamp.jpg',
            'stock' => 22
        ]);

        // Sports
        Product::create([
            'name' => 'Yoga Mat',
            'description' => 'Non-slip yoga mat, 6mm thick, TPE material, includes carrying strap',
            'price' => 799,
            'category' => 'Sports',
            'image' => 'products/yoga-mat.jpg',
            'stock' => 28
        ]);

        Product::create([
            'name' => 'Dumbbells Set',
            'description' => 'Adjustable dumbbells set, 10-20kg range, rubber coated, ideal for home gym',
            'price' => 3999,
            'category' => 'Sports',
            'image' => 'products/dumbbells.jpg',
            'stock' => 10
        ]);

        Product::create([
            'name' => 'Running Shoes',
            'description' => 'Professional running shoes with cushioned soles, breathable mesh, lightweight design',
            'price' => 2499,
            'category' => 'Sports',
            'image' => 'products/shoes.jpg',
            'stock' => 32
        ]);

        Product::create([
            'name' => 'Water Bottle',
            'description' => 'Insulated stainless steel water bottle, keeps drinks hot for 12 hours or cold for 24 hours',
            'price' => 599,
            'category' => 'Sports',
            'image' => 'products/water-bottle.jpg',
            'stock' => 75
        ]);
    }
}