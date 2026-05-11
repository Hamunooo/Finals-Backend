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

            <!-- Cart Button & Auth -->
            <div class="flex items-center space-x-4">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="/admin" class="px-4 py-2 rounded-lg bg-green-600 text-white text-sm font-semibold hover:bg-green-700 transition-colors">
                            Admin Panel
                        </a>
                    @else
                        <a href="{{ route('cart.show') }}" class="btn-glow relative inline-flex px-4 py-2 rounded-lg bg-gradient-secondary text-white font-semibold text-sm hover:shadow-lg transition-all duration-300 items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-0.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l0.03-.12 0.9-1.63h7.45c0.75 0 1.41-.41 1.75-1.03l3.58-6.49c0.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-0.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s0.89 2 1.99 2 2-0.9 2-2-0.9-2-2-2z"/>
                            </svg>
                            <span>Cart</span>
                            <span data-cart-badge class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center leading-none">0</span>
                        </a>
                    @endif

                    <div class="relative group">
                        <button class="flex items-center space-x-2 px-4 py-2 text-slate-300 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div class="absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-slate-800 border border-slate-700 hidden group-hover:block z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 first:rounded-t-lg">
                                {{ auth()->user()->email }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 last:rounded-b-lg">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login" class="px-4 py-2 rounded-lg text-slate-300 hover:text-white transition-colors text-sm font-medium">
                        Login
                    </a>
                    <a href="/register" class="btn-glow px-4 py-2 rounded-lg bg-gradient-secondary text-white font-semibold text-sm hover:shadow-lg transition-all duration-300">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>