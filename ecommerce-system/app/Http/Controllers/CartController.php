<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $sessionId = session()->getId();
        $quantity = $request->quantity ?? 1;

        $cartItem = Cart::where('product_id', $product->id)
            ->where('session_id', $sessionId)
            ->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            Cart::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'session_id' => $sessionId
            ]);
        }

        $cartCount = Cart::where('session_id', $sessionId)->count();

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cartCount' => $cartCount
        ]);
    }

    public function show()
    {
        $sessionId = session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)
            ->with('product')
            ->get();

        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $tax = $subtotal * 0.12;
        $shipping = $subtotal > 0 ? 100 : 0;
        $total = $subtotal + $tax + $shipping;

        return view('cart.index', compact('cartItems', 'subtotal', 'tax', 'shipping', 'total'));
    }

    public function update(Request $request, $cartId)
    {
        $cartItem = Cart::find($cartId);
        
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found'], 404);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json(['success' => true, 'message' => 'Cart updated']);
    }

    public function remove($cartId)
    {
        $cartItem = Cart::find($cartId);
        
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found'], 404);
        }

        $cartItem->delete();
        $cartCount = Cart::where('session_id', session()->getId())->count();

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'cartCount' => $cartCount
        ]);
    }

    public function count()
    {
        $sessionId = session()->getId();
        $count = Cart::where('session_id', $sessionId)->sum('quantity');
        
        return response()->json(['count' => $count]);
    }
}
