<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CategoryController extends Controller
{
    public function show($category)
    {
        $products = Product::where('category', $category)->latest()->get();
        
        return view('products.index', compact('products'));
    }
}
