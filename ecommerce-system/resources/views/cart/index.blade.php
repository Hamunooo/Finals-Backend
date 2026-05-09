@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Header -->
    <div class="mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
            <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Shopping Cart</span>
        </h1>
        <p class="text-slate-400 text-lg">Review and manage your cart items</p>
    </div>

    @if($cartItems->isEmpty())
        <!-- Empty Cart -->
        <div class="card-glass rounded-2xl p-12 text-center">
            <div class="mb-6">
                <div class="inline-block p-4 bg-slate-700/50 rounded-full">
                    <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-white mb-2">Your cart is empty</h2>
            <p class="text-slate-400 mb-6">Looks like you haven't added any items yet</p>
            <a href="{{ route('products.index') }}" class="inline-block btn-glow px-8 py-3 rounded-lg bg-gradient-secondary text-white font-bold hover:shadow-lg transition-all duration-300">
                Continue Shopping
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="card-glass rounded-2xl overflow-hidden">
                    <div class="divide-y divide-slate-700">
                        @foreach($cartItems as $item)
                            <div class="p-6 hover:bg-slate-800/30 transition-colors duration-200" data-cart-id="{{ $item->id }}">
                                <div class="flex gap-4">
                                    <!-- Product Image -->
                                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden bg-slate-700">
                                        @if($item->product->image)
                                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-purple-600 to-pink-600">
                                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Product Details -->
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-2">
                                            <div>
                                                <h3 class="text-white font-bold text-lg">{{ $item->product->name }}</h3>
                                                <p class="text-slate-400 text-sm">{{ $item->product->category }}</p>
                                            </div>
                                            <button class="cart-remove text-slate-400 hover:text-red-400 transition-colors" data-cart-id="{{ $item->id }}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <div class="text-lg font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                                ₱{{ number_format($item->product->price, 2) }}
                                            </div>

                                            <!-- Quantity Control -->
                                            <div class="flex items-center gap-3 bg-slate-800 rounded-lg px-3 py-2">
                                                <button class="qty-decrease text-slate-400 hover:text-white transition-colors" data-cart-id="{{ $item->id }}">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                                <span class="w-8 text-center text-white font-bold qty-value">{{ $item->quantity }}</span>
                                                <button class="qty-increase text-slate-400 hover:text-white transition-colors" data-cart-id="{{ $item->id }}">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Subtotal for item -->
                                        <div class="text-right mt-2 text-slate-300 text-sm">
                                            Subtotal: <span class="text-white font-semibold">₱{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="card-glass rounded-2xl p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-white mb-6">Order Summary</h3>

                    <div class="space-y-3 mb-6 pb-6 border-b border-slate-700">
                        <div class="flex justify-between text-slate-300">
                            <span>Subtotal</span>
                            <span id="subtotal">₱{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-slate-300">
                            <span>Tax (12%)</span>
                            <span id="tax">₱{{ number_format($tax, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-slate-300">
                            <span>Shipping</span>
                            <span id="shipping">₱{{ number_format($shipping, 2) }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between text-white text-lg font-bold mb-6">
                        <span>Total</span>
                        <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent" id="total">₱{{ number_format($total, 2) }}</span>
                    </div>

                    <button class="btn-glow w-full px-4 py-3 rounded-lg bg-gradient-secondary text-white font-bold hover:shadow-lg transition-all duration-300 mb-3 checkout-btn" data-checkout-modal>
                        Proceed to Checkout
                    </button>

                    <a href="{{ route('products.index') }}" class="block w-full px-4 py-3 rounded-lg bg-slate-800 text-slate-200 font-bold hover:bg-slate-700 transition-all duration-300 text-center">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity increase
    document.querySelectorAll('.qty-increase').forEach(btn => {
        btn.addEventListener('click', function() {
            const cartId = this.dataset.cartId;
            const qtyValue = this.parentElement.querySelector('.qty-value');
            const currentQty = parseInt(qtyValue.textContent);
            updateQuantity(cartId, currentQty + 1);
        });
    });

    // Quantity decrease
    document.querySelectorAll('.qty-decrease').forEach(btn => {
        btn.addEventListener('click', function() {
            const cartId = this.dataset.cartId;
            const qtyValue = this.parentElement.querySelector('.qty-value');
            const currentQty = parseInt(qtyValue.textContent);
            if (currentQty > 1) {
                updateQuantity(cartId, currentQty - 1);
            }
        });
    });

    // Remove item
    document.querySelectorAll('.cart-remove').forEach(btn => {
        btn.addEventListener('click', function() {
            const cartId = this.dataset.cartId;
            removeItem(cartId);
        });
    });

    // Checkout modal
    const checkoutBtn = document.querySelector('[data-checkout-modal]');
    const checkoutModal = document.getElementById('checkoutModal');
    const closeModal = document.getElementById('closeModal');
    const checkoutForm = document.getElementById('checkoutForm');

    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            checkoutModal.classList.remove('hidden');
        });
    }

    if (closeModal) {
        closeModal.addEventListener('click', function() {
            checkoutModal.classList.add('hidden');
        });
    }

    if (checkoutModal) {
        checkoutModal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    }

    function updateQuantity(cartId, quantity) {
        fetch(`/cart/update/${cartId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }

    function removeItem(cartId) {
        fetch(`/cart/remove/${cartId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
});
</script>

<!-- Checkout Modal -->
<div id="checkoutModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-slate-900 rounded-2xl p-8 max-w-md w-full card-glass">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Checkout</h2>
            <button id="closeModal" class="text-slate-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form id="checkoutForm" method="POST" action="{{ route('checkout.process') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-slate-300 font-semibold mb-2">Full Name</label>
                <input
                    type="text"
                    name="name"
                    required
                    class="w-full px-4 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="John Doe"
                >
            </div>

            <div>
                <label class="block text-slate-300 font-semibold mb-2">Email Address</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full px-4 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="you@example.com"
                >
            </div>

            <div class="pt-4 border-t border-slate-700">
                <div class="flex justify-between text-white mb-4">
                    <span>Total Amount:</span>
                    <span class="font-bold text-lg bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">₱{{ number_format($total, 2) }}</span>
                </div>

                <button type="submit" class="btn-glow w-full px-4 py-3 rounded-lg bg-gradient-secondary text-white font-bold hover:shadow-lg transition-all duration-300">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
