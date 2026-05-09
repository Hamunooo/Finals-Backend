@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Success Message -->
    <div class="max-w-2xl mx-auto">
        <div class="card-glass rounded-2xl p-8 md:p-12 text-center mb-8">
            <!-- Checkmark Icon -->
            <div class="mb-6">
                <div class="inline-block p-4 bg-green-600/20 rounded-full">
                    <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Order Confirmed!
            </h1>
            <p class="text-xl text-slate-300 mb-8">
                Thank you for your purchase. A confirmation email has been sent to <strong>{{ $order->email }}</strong>
            </p>

            <!-- Order Details Card -->
            <div class="bg-slate-800/50 rounded-xl p-6 mb-8 text-left">
                <h3 class="text-xl font-bold text-white mb-4">Order Details</h3>
                
                <div class="space-y-3 mb-6 pb-6 border-b border-slate-700">
                    <div class="flex justify-between">
                        <span class="text-slate-400">Order Number:</span>
                        <span class="text-white font-semibold">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Order Date:</span>
                        <span class="text-white font-semibold">{{ $order->created_at->format('M d, Y @ H:i A') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Status:</span>
                        <span class="text-green-400 font-semibold">{{ ucfirst($order->status) }}</span>
                    </div>
                </div>

                <!-- Items -->
                <div class="mb-6">
                    <h4 class="text-lg font-bold text-white mb-4">Items Ordered</h4>
                    <div class="space-y-2">
                        @foreach($order->items as $item)
                            <div class="flex justify-between text-slate-300">
                                <span>{{ $item['product_name'] }} (x{{ $item['quantity'] }})</span>
                                <span>₱{{ number_format($item['subtotal'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Totals -->
                <div class="border-t border-slate-700 pt-4 space-y-2">
                    <div class="flex justify-between text-slate-300">
                        <span>Subtotal:</span>
                        <span>₱{{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>Tax (12%):</span>
                        <span>₱{{ number_format($order->tax, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>Shipping:</span>
                        <span>₱{{ number_format($order->shipping, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-white text-lg font-bold pt-3 border-t border-slate-700 mt-3">
                        <span>Total Amount:</span>
                        <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">₱{{ number_format($order->total, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-slate-800/30 rounded-xl p-6 mb-8 text-left">
                <h3 class="text-xl font-bold text-white mb-4">What's Next?</h3>
                <ul class="space-y-3 text-slate-300">
                    <li class="flex items-center">
                        <span class="w-6 h-6 bg-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold mr-3">1</span>
                        Your order is being prepared for shipment
                    </li>
                    <li class="flex items-center">
                        <span class="w-6 h-6 bg-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold mr-3">2</span>
                        You'll receive a tracking number once shipped
                    </li>
                    <li class="flex items-center">
                        <span class="w-6 h-6 bg-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold mr-3">3</span>
                        Expected delivery: 3-5 business days
                    </li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="btn-glow px-8 py-3 rounded-lg bg-gradient-secondary text-white font-bold hover:shadow-lg transition-all duration-300 text-center">
                    Continue Shopping
                </a>
                <a href="{{ route('products.index') }}" class="px-8 py-3 rounded-lg bg-slate-800 text-slate-200 font-bold hover:bg-slate-700 transition-all duration-300 text-center">
                    Back to Home
                </a>
            </div>
        </div>

        <!-- Support Section -->
        <div class="card-glass rounded-2xl p-8 text-center">
            <p class="text-slate-300 mb-4">Need help? Check your email for your order confirmation or contact our support team.</p>
            <a href="mailto:support@cartify.com" class="text-purple-400 hover:text-purple-300 font-semibold">
                Contact Support
            </a>
        </div>
    </div>
</div>
@endsection
