<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Mail\OrderConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
        ]);

        $sessionId = session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty');
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        $tax = $subtotal * 0.12;
        $shipping = 100;
        $total = $subtotal + $tax + $shipping;

        // Create order
        $order = Order::create([
            'order_number' => 'ORD-' . date('YmdHis') . '-' . rand(1000, 9999),
            'email' => $request->email,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
            'status' => 'completed',
            'items' => $cartItems->map(function($item) {
                return [
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->product->price * $item->quantity,
                ];
            })->toArray(),
        ]);

        try {
            // Send confirmation email via Mailtrap
            Mail::to($request->email)->send(new OrderConfirmationMail($order));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            // Continue anyway - order is created, email can be sent later
        }

        // Clear cart
        Cart::where('session_id', $sessionId)->delete();

        return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully! Check your email for confirmation.');
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
