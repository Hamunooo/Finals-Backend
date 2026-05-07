<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{


    function index()
    {
        $products = Products::all();
        return response()->json($products);
    }











    //THESE 3 FUNCTIONS ARE ONLY ACCESSIBLE TO THE SELLER
    function add(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $products = Products::create($validated);

        return response()->json($products, 201);
    }
    //THESE 3 FUNCTIONS ARE ONLY ACCESSIBLE TO THE SELLER
    function update(Request $request)
    {
        $find = Products::findOrFail($request->id);
        $validated = $request->validate([
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        $find->update($validated);
        return redirect('/edit_product');
    }

    //THESE 3 FUNCTIONS ARE ONLY ACCESSIBLE TO THE SELLER
    function delete(int $id)
    {
        $find = Products::findOrFail($id);
        $find->delete();
        return redirect('/products-dashboard');
    }
}
