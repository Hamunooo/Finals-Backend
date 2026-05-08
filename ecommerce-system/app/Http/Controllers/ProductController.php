<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->search) {
            $products->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->category) {
            $products->where('category', $request->category);
        }

        $products = $products->latest()->get();

        return view('products.index', compact('products'));
    }
}
