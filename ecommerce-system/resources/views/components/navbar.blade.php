<nav class="sticky top-0 z-50 backdrop-blur-md bg-slate-900/80 border-b border-slate-700/50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('products.index') }}" class="flex items-center space-x-2 group">
                <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-0.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l0.03-.12 0.9-1.63h7.45c0.75 0 1.41-.41 1.75-1.03l3.58-6.49c0.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-0.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s0.89 2 1.99 2 2-0.9 2-2-0.9-2-2-2z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Cartify</span>
            </a>

            <!-- Navigation Items -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('products.index') }}" class="text-slate-300 hover:text-white transition-colors duration-200 text-sm font-medium">
                    Products
                </a>
                <a href="{{ route('products.index') }}?category=All" class="text-slate-300 hover:text-white transition-colors duration-200 text-sm font-medium">
                    Categories
                </a>
                <a href="{{ route('about') }}" class="text-slate-300 hover:text-white transition-colors duration-200 text-sm font-medium">
                    About
                </a>
            </div>

            <!-- Cart Button -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart.show') }}" class="btn-glow relative inline-flex px-4 py-2 rounded-lg bg-gradient-secondary text-white font-semibold text-sm hover:shadow-lg transition-all duration-300 items-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-0.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l0.03-.12 0.9-1.63h7.45c0.75 0 1.41-.41 1.75-1.03l3.58-6.49c0.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-0.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s0.89 2 1.99 2 2-0.9 2-2-0.9-2-2-2z"/>
                    </svg>
                    <span>Cart</span>
                    <span data-cart-badge class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center leading-none">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>