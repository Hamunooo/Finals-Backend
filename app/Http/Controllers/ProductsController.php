<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // Admin sees ALL products, Seller sees only THEIR OWN
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $products = Products::with('seller')->get();
        } else {
            $products = Products::where('user_id', Auth::id())->get();
        }
        return view('products.index', compact('products'));
    }

    // Show Add Product form
    public function create()
    {
        return view('products.create');
    }

    // Save new product to database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                                    ->store('products', 'public');
        }

        $validated['user_id'] = Auth::id();
        Products::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully!');
    }

    // Show Edit Product form
    public function edit($id)
    {
        $product = Products::findOrFail($id);

        if (Auth::user()->role === 'seller' && $product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('products.edit', compact('product'));
    }

    // Save updated product
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        if (Auth::user()->role === 'seller' && $product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')
                                    ->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        if (Auth::user()->role === 'seller' && $product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}